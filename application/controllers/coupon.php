<?php
/**
代金券相关控制器
*/
	class coupon extends CI_Controller {
		function __construct(){
        	//parent::CI_Controller();
        	//构造时，加载模型
        	parent::__construct();
        	$this->load->model('Coupon_Model','',TRUE);
    	}
		/**
		跳转至代金卷管理页面
		*/
		public function mycoupon(){
            session_start();
            //加载模型
            $this->load->model("coupon_model");
            
            //获取优惠券信息
            $coupons = $this->coupon_model->userallcoupon($_SESSION["user_id"])->result_array();
            //传递信息
            $data['coupons'] = $coupons;
			$this->load->view("mycoupon", $data);
		}

		/**
		跳转至选择代金卷页面-yjt 2015-4-13
		*/
		public function choose_coupon(){
			session_start();
            //加载模型
            $this->load->model("coupon_model");
            
            //获取优惠券信息
            $coupons = $this->coupon_model->userefcoupon($_SESSION["user_id"])->result_array();
            //传递信息
            $data['coupons'] = $coupons;
			$this->load->view("choose_coupon",$data);
		}

		/**
		给用户派发代金券-yc 2015-2-4
		**/
		public function givecoupon($username,$coupon_id){
			$this->Coupon_Model->addusercoupon($username,$coupon_id);
		}

		/**
		查询用户所有代金券-yc 2015-2-4
		**/
		public function userallcoupon($username){
			$this->Coupon_Model->userallcoupon($username);
		}

		/**
		查询用户可用代金券-yc 2015-2-4
		**/
		public function userefcoupon($username){
			$this->Coupon_Model->userefcoupon($username);
		}

	}
?>
