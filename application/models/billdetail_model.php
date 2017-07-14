<?php
	class BillDetail_model extends CI_Model {
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
        新建订单详细-yc 2015-2-3
        **/
		function insert_billdetail($bill_id,$serviceid,$sercount) {
			$data = array(
				'billid'=>$bill_id,
				'serviceid'=>$serviceid,
				'sercount'=>$sercount
				);
			$this->db->insert('billdetail',$data);
			if($this->db->affected_rows()>0){
				return 1;//新建订单成功
			}
			else{
				return 0;//新建订单失败
			}
		}

		/**
		删除订单详细-yc 2015-6-24
		**/
		function delete_billdetail($bill_id){
			$this->db->where('billid', $billid);
			$this->db->delete('billdetail');
			if($this->db->affected_rows()>0){
				return 1;//删除订单成功
			}
			else{
				return 0;//删除订单失败
			}
		}

		
	}
?>