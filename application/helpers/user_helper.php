<?php
	/**
	检测登录状态
	已登录返回true
	未登录返回false
	*/
	function is_login(){
		if(isset($_SESSION["login_statu"])){//登录状态已设置
			//echo json_encode($_SESSION["login_statu"]);
			return $_SESSION["login_statu"];//返回登陆状态
		}
		else{//登录状态未设置
			//echo "false";
			return false; //未登录
		}
	}
?>