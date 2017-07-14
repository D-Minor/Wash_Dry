<?php
	class Bill_model extends CI_Model {
		/**
		所有变量定义
		**/
		//$bill_id;//订单号
		//$bill_userid;//用户名
		//$bill_address;//订单地址
		//$bill_contact;//联系方式	
		//$bill_rflag;//接单标志位
		//$bill_cflag;//完成标志位
		//$bill_ctime;//创建订单时间
		//$bill_rtime;//接收订单时间
		//$bill_etime;//完成订单时间
		
		

		function __contrust(){
        	parent::__construct();
        	$this->load->database(); 

        }

        /**
        新建订单-yc 2015-1-8
        **/
		function insert_bill($bill_userid,$username,$address,$contact,$totalprice,$payment) {
			date_default_timezone_set('PRC');
			$bill_id=strtotime(date('Y-m-d H:i:s'))+$bill_userid;
			$bill_ctime=date('Y-m-d H:i:s');
			$bill_rflag=0;
			$bill_cflag=0;
			$data = array(
				'billid'=>$bill_id,
				'userid'=>$bill_userid,
				'username'=>$username,
				'address'=>$address,
				'contact'=>$contact,
				'rflag'=>$bill_rflag,
				'cflag'=>$bill_cflag,
				'billctime'=>$bill_ctime,
				'totalprice'=>$totalprice,
				'payment'=>$payment
				);
			$this->db->insert('bill',$data);
			return $bill_id;
		}

		/**
		订单完成-yc 2015-1-8
		**/
		function complete_bill($bill_id){
			$bill_cflag=1;
			$bill_etime=date('Y-m-d H:i:s');
			$data = array(
				'cflag' => $bill_cflag,
				'billetime'=>$bill_etime
				);	
			$this->db->where('billid', $bill_id);
			$this->db->update('bill',$data);
		}	
		/**
		订单接收-yc 2015-1-8
		**/
		function receive_bill($bill_id){
			$bill_rflag=1;
			$bill_rtime=date('Y-m-d H:i:s');
			$data = array(
				'rflag' => $bill_rflag,
				'billrtime'=>$bill_rtime
				);
			$this->db->where('billid', $bill_id);
			$this->db->update('bill',$data);
		}

		/**
		By订单号：订单详细查询-yc 2015-2-4
		**/
		function querybillbyid($bill_id){
			$this->db->select('a.*,b.*,c.*')
			->from('bill AS a')
			->join('billdetail AS b','a.billid = b.billid')
			->join('service AS c','b.serviceid = c.serviceid')
			->where('a.billid',$bill_id);
			$res=$this->db->get();	
			return $res;	
		}	

				/**
		By用户名：订单查询-yc 2015-2-4
		**/
		function querybillbyuser($username){
			$this->db->select('a.*,b.*,c.*')
			->from('bill AS a')
			->join('billdetail AS b','a.billid = b.billid')
			->join('service AS c','b.serviceid = c.serviceid')
			->where('a.userid',$username);
			$res=$this->db->get();	
			return $res;
			//var_dump($res->result_array());
		}

		/**
		查询所有订单-yc
		**/
		function queryallbill(){
			$this->db->select('*')
			->from('bill');
			$this->db->order_by('billctime', 'desc'); 
			$res=$this->db->get();
			return $res;	
		}

		/**
		By用户名：订单(概要)查询-yc add 2015-4-14
		**/
		function qbillbyuser($username){
			$this->db->select('*')
			->from('bill')
			->where('userid',$username);
			$res=$this->db->get();	
			return $res;
			//var_dump($res->result_array());
		}

		/**
		By订单号：订单(概要)查询-yc add 2015-4-14
		**/
		function qbdbyuser($billid){
			$this->db->select('a.*,b.*')
			->from('billdetail AS a')
			->join('service AS b','a.serviceid = b.serviceid')
			->where('billid',$billid);
			$res=$this->db->get();	
			return $res->result_array();
			//var_dump($res->result_array());
		}

		/**
		取消订单-yjt 2015-5-12
		**/
		function cancel_bill($bill_id){
			$bill_rflag=-1;
			$bill_rtime=date('Y-m-d H:i:s');
			$data = array(
				'rflag' => $bill_rflag,
				'billrtime'=>$bill_rtime
				);	
			$this->db->where('billid', $bill_id);
			$this->db->update('bill',$data);
		}

		/**
		支付订单-yc 2015-6-24
		**/
		function pay_bill($bill_id){
			$bill_pflag=1;
			$bill_ptime=date('Y-m-d H:i:s');
			$data = array(
				'pflag' => $bill_pflag,
				'billptime'=>$bill_ptime
				);	
			$this->db->where('billid', $bill_id);
			$this->db->update('bill',$data);
		}

		/**
		By订单号查询 总金额-yc 2015-6-24
		**/
		function findpricebybillid($billid){
			$this->db->where('billid',$billid);
			$res = $this->db->get('bill');
			$message = $res->result_array();
			return $message[0]["totalprice"];
		}


		/**
		By订单号 删除订单-yc 2015-6-24
		**/
		function delete_bill($billid){
			$this->db->where('billid', $billid);
			$this->db->delete('bill');
			if($this->db->affected_rows()>0){
				return 1;//删除订单成功
			}
			else{
				return 0;//删除订单失败
			}
		}


	}
?>