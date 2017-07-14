<?php
/**
主控制器,负责主页跳转等相关操作
*/
	class Masys extends CI_Controller {
		function __construct(){
        	//parent::CI_Controller();
        	//构造时，加载模型
        	parent::__construct();
        	$this->load->model('Bill_model','',TRUE);
            //加载helper airsky46 2015-3-21
            $this->load->helper("user_helper");
            $this->load->helper("url");
    	}
		/**
		跳转至订单查询页面
		**/
		public function showbills(){
			$res= $this->Bill_model->queryallbill();
			//var_dump($res->result_array());
			$data['billlist']=$res->result_array();	
			$this->load->view("manager_message",$data);
		}

		/**
		订单细节页面
		**/
		public function showbilldetail($billid){
			$res=$this->Bill_model->querybillbyid($billid);
			//var_dump($res->result_array());
			$data['bdid']=$billid;
			$data['bdlist']=$res->result_array();
			$this->load->view("showbilldetail",$data);
		}

		/**
		订单修改接收页面 yc-4-13
		将bill rflag置为1
		**/
		public function receivebill($billid){
			$this->Bill_model->receive_bill($billid);
			$res=$this->Bill_model->querybillbyid($billid);
			//var_dump($res->result_array());
			$data['bdid']=$billid;
			$data['bdlist']=$res->result_array();
			$this->load->view("showbilldetail",$data);
		}

		/**
		订单完成页面 yc-4-13
		将bill cflag置为1
		**/
		public function completebill($billid){
			$this->Bill_model->complete_bill($billid);
		}
	}
?>
