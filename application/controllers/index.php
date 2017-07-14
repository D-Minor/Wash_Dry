<?php
	class Index extends CI_Controller {
		public function sendview()
		{
			$this->load->view('/message/sendmessage');
		}
		public function main(){
			session_start();
			$this->load->view('/main/index');
		}
		/**
		更多 -yjt 2015-4-14
		*/
		public function more() {
			$this->load->view('more');
		}
		/**
		第一张图的活动 -yc 2015-5-2
		*/
		public function firstimg() {
			$this->load->view('fristimgpage');
		}
		/**
		第二张图的活动 -yc 2015-5-2
		*/
		public function secondimg() {
			$this->load->view('secondimgpage');
		}
		/**
		第三张图的活动 -yc 2015-5-2
		*/
		public function thirdimg() {
			$this->load->view('thirdimgpage');
		}
	}
?>