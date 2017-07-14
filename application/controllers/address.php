<?php
/**
送货地址相关信息管理控制器
*/
	class Address extends CI_Controller {
		function __construct(){
        	//parent::CI_Controller();
        	//构造时，加载模型
        	parent::__construct();
        	$this->load->model('Address_model','',TRUE);
    	}

		/**
		跳转至地址管理页面
		*/
		public function manage_address(){
			//by airsky45 20150413
			session_start();
			//获取用户名
			$user_name = $_SESSION["user_id"];
			//查询用户地址信息
			$address = $this->Address_model->queryaddbyuser($user_name);
			//将地址信息关联数组存入$data用于传递给界面
			$data["address"] = $address->result_array();
			$this->load->view("manage_address",$data);
		}
		/**
		跳转至地址管理页面
		测试用 备份
		*/
		public function manage_address2(){
			//by airsky45 20150413
			session_start();
			//获取用户名
			$user_name = $_SESSION["user_id"];
			//查询用户地址信息
			$address = $this->Address_model->queryaddbyuser($user_name);
			//将地址信息关联数组存入$data用于传递给界面
			$data["address"] = $address->result_array();
			$this->load->view("manage_address2",$data);
		}

		/**
		修改地址相关信息
		依据传入的参数不同决定是修改地址
		还是增加新的收货地址
		*/
		public function modify_address(){
			session_start();
			$action = $this->input->get("action");
			if ($action=="add") {//添加收货地址
				$data["action"]="add";
			}
			elseif ($action=="modify") {//更新收货地址
				$data["action"]="modify";
				$adid = $this->input->get("adid");
				$address = $this->Address_model->queryaddbyadid($adid);
				$rows = $address->result_array();
				$data["address"] = $rows[0];
			}
			elseif ($action=="delete"){
				$adid = $this->input->get("adid");
				$username = $_SESSION["user_id"];
			}
			$data['flag'] = $action = $this->input->get("flag");
			//var_dump($data);
			$this->load->view("modify_address",$data);
		}

		/**

		**/
		public function insert_address(){
			session_start();
			$username = $_SESSION["user_id"];
			$address = $this->input->post("address");
			$conname = $this->input->post("conname");
			$contact = $this->input->post("contact");
			if($this->Address_model->insert_address($username,$address,$conname,$contact)==1){
				echo "success";
			}
			else{
				echo "failed";
			}
		}
		/**

		*/
		public function delete_address(){
			session_start();
			$username = $_SESSION["user_id"];
			$adid = $this->input->post("adid");
			if($this->Address_model->delete_address_by_adid($adid,$username)==1){
				echo "success";
			}
			else{
				echo "failed";
		}
		}

		/**

		*/
		public function default_address(){
			session_start();
			$username = $_SESSION["user_id"];
			$adid = $this->input->post("adid");
			if($this->Address_model->default_address($username,$adid)==1){
				echo "success";
			}
			else{
				echo "failed";
			}
		}


		/**
		2015-2-07
		**/
		public function queryaddbyuser($username){
			$this->Address_model->queryaddbyuser($username);
		}
	}
?>