<?php
	class Address_model extends CI_Model {
		/**
		所有变量定义
		**/
		//$username;//用户名
		//$address;//地址
		//$adnum;//编号

		function __contrust(){
        	parent::__construct();
        	$this->load->database(); 
        }

        /**
        新建地址-yc 2015-2-6
        **/
		function insert_address($username,$address,$conname,$contact) {
			$this->db->select('*')
			->from('useraddress')
			->where('username',$username);
			$res=$this->db->get();	
			$numrow=$res->num_rows()+1;
			$adflag=0;
			$data = array(
				'username'=>$username,
				'conname'=>$conname,
				'contact'=>$contact,
				'address'=>$address,
				'adnum'=>$numrow,
				'adflag'=>$adflag
				);
			$this->db->insert('useraddress',$data);
			if($this->db->affected_rows()>0){
				return 1;//插入成功
			}
			else{
				return 0;//插入失败
			}
		}

		/**
		设置默认地址-yc 2015-2-6
		**/
		function default_address($username,$adid){
			$data = array(
				'adflag' => 0
				);	
			$this->db->where('username', $username)
					 ->where('adflag', 1);
			$this->db->update('useraddress',$data);//更新原本的默认地址

			
			$data = array(
				'adflag' => 1
			);
			$this->db->where('username',$username)
					 ->where('adid', $adid);
			$this->db->update('useraddress',$data);//新设置默认地址
			return 1;
		}	
		/**
		删除地址-yc 2015-2-6
		**/
		function delete_address($username,$adnum){
			$this->db->where('username', $username)
					 ->where('adnum', $adnum);
			$this->db->delete('useraddress');
		}

		/**
		删除地址-yc 2015-2-6
		**/
		function delete_address_by_adid($adid,$username){
			$this->db->where('username', $username)
					 ->where('adid', $adid);
			$this->db->delete('useraddress');
			return 1;
		}

		/**
		按照用户名列出地址-yc 2015-2-7
		**/
		function queryaddbyuser($username){
			$this->db->select('*')
			->from('useraddress')
			->where('username',$username);
			$res=$this->db->get();
			//var_dump($res->result_array());//临时显示结果以后可以删除
			return $res;		
		}
		/**
		按照地址编号查询地址
		*/
		function queryaddbyadid($adid){
			$this->db->select('*')
			->from('useraddress')
			->where('adid',$adid);
			$res=$this->db->get();
			//var_dump($res->result_array());//临时显示结果以后可以删除
			return $res;		
		}
	}
?>