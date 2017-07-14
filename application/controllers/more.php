<?php
/**
“更多”的控制器
*/
    class More extends CI_Controller {
        function __construct(){
            //parent::CI_Controller();
            //构造时，加载模型
            parent::__construct();
            //$this->load->model('Address_model','',TRUE);
        }

        /**
        跳转至服务范围页面   //by yjt 20150418
        */
        public function serviceArea(){
            $this->load->view("service_area");
        }

        /**
        跳转至 关于我们 页面
        */
        public function aboutUs(){
            $this->load->view("aboutus");
        }

        /**
        跳转至 联系客服 页面
        */
        public function contactUs(){
            $this->load->view("contactus");
        }
     
    }
?>