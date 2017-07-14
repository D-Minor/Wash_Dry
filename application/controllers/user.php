<?php
/**
用户控制器
登录
注册
检查用户名是否已经存在
*/
	class User extends CI_Controller {
		/**
		判断用户名是否存在
		json 输出结果{用户名已存在:true;用户名不存在fasle}
		*/
		public function isuserexist($user_id){
			$this->load->Model("user_model");

			$res = $this->user_model->isuserexist($user_id);//数据库操作

			echo json_encode($res);
		}

		/**
		检测登录状态
		已登录返回true
		未登录返回false
		*/
		public function is_login(){
			session_start();
			if(isset($_SESSION["login_statu"])){//登录状态已设置
				//echo json_encode($_SESSION["login_statu"]);
				return $_SESSION["login_statu"];//返回登陆状态
			}
			else{//登录状态未设置
				//echo "false";
				return false; //未登录
			}
		}

		/**
		用户注册 
		add 昵称 -yjt 2015-4-15
		*/
		public function registe() //注册
		{
			$this->load->Model("user_model");
			if($this->input->post("user_id")){
				$user_id = $this->input->post('user_id');//用户名
				$user_name = $this->input->post('user_name');//昵称
				$user_password = $this->input->post('user_password');//密码
				$level = $this->input->post('level');//等级
				
				$res = $this->user_model->user_add($user_id,$user_name,$user_password,$level);//调用数据库操作

				if($res==1){
					echo 'success';
				}
				else{
					echo 'unsuccess';
				}
				
			}
			else{
				$this->load->view("signup");
			}
		}
		/**
		用户登录
		*/
		public function login(){ //登陆
			//yc 2015-5-11 add weixin
			session_start();
			if(isset($_SESSION["login_statu"])==false){
				
	              $MY_BASE_URL = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxfcd6d88e77826d2f&secret=8192e320051711c49da1acb873317945";
	              $ch = curl_init ();
	              $url = $MY_BASE_URL;
	              // 设置URL参数 
	              curl_setopt ( $ch, CURLOPT_URL, $url );
	              // 设置cURL允许执行的最长秒数
	              curl_setopt ( $ch, CURLOPT_TIMEOUT, 15 );
	              // 要求CURL返回数据
	              curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	              // 执行请求
	              $result = curl_exec ( $ch );
	              // 获取http状态
	              $http_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
	              if ($http_code != 200) {
	                return array();
	              }
	              $jsondata = json_decode ( $result );
	              curl_close ($ch);
	              $access_token=$jsondata->{"access_token"};
	              $openid=$jsondata->{"openid"};
	              //----------------
	              $MY_BASE_URL = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&&openid=".$openid;
	              $ch = curl_init ();
	              $url = $MY_BASE_URL;
	              // 设置URL参数 
	              curl_setopt ( $ch, CURLOPT_URL, $url );
	              // 设置cURL允许执行的最长秒数
	              curl_setopt ( $ch, CURLOPT_TIMEOUT, 15 );
	              // 要求CURL返回数据
	              curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	              // 执行请求
	              $result = curl_exec ( $ch );
	              // 获取http状态
	              $http_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );
	              if ($http_code != 200) {
	                return array();
	              }
	              $jsondata = json_decode ( $result );
	              $useropenid=$jsondata->{"openid"};
	              $nickname=$jsondata->{"nickname"};
	              $userhead=$jsondata->{"headimgurl"};
				//end weixin
				$this->load->Model("user_model");
				$this->load->helper("url");
				 //start session
				//echo session_id();
				$uhz=substr($userhead,0,-1);
				$userheadsmall=$uhz."64";
				$wechat = $useropenid;//获取用户名
				$result = $this->user_model->user_login($wechat);//调用数据库操作
				if($result==0){//如果不存在那么添加用户
					$this->user_model->user_add($wechat, $nickname, $userheadsmall);
				}
				$data['login_statu']=true;
				$_SESSION["login_statu"]=true; //设置session 登陆状态
				$_SESSION["user_id"]=$wechat; //设置session 用户名
				$_SESSION["user_name"]=$nickname;//设置用户昵称
				$_SESSION["userheadimg"]=$userheadsmall;
						//$this->load->view("login",$data);
			}
			$this->load->view("index");
		}

		/**
		获取用户信息中心相关数据并跳转至mine页面
		*/
		public function mine(){
			$this->load->helper('url');
			$this->load->Model("user_model");
			if($this->is_login()){//验证用户登录状态已登录跳转至mine
				//echo session_id();
		    //$user_id=$_SESSION["user_id"]
		    //$headurl=$this->user_model->gethead($user_id);
			//$data['headurl'] = $headurl;
			$this->load->view("mine");
		}
			else{//未登录跳转至登录页面
				$url = site_url('user/login');  
				echo "<script language='javascript' type='text/javascript'>";  
				echo "window.location.href='$url'";  
				echo "</script>";  
			}
		}
			
		/**
		注销当前用户
		*/
		public function loginout(){
			$this->load->helper("url");
			$res = $this->is_login();
			if($res){//当前为登录状态
				$_SESSION["login_statu"]=false;//注销
			}
			//已注销后跳转至首页
			 $url = base_url('');  
			 echo "<script language='javascript' type='text/javascript'>";  
			 echo "window.location.href='$url'";  
			 echo "</script>";    
		}
		/**
		忘记密码功能
		*/
		public function forgetpwd($user_id){
			$this->load->Model("user_model");
			$this->load->helper("acode");
			session_start();
			if(is_null($user_id)){
				//未提供用户名
			}
			else{
				//提供了用户名
				if($this->user_model->isuserexist($user_id)){
					//用户名存在
					$phone_number = $this->user_model->get_phone_number($user_id);//获取用户手机号
					//生成验证码
					$acode_temp = getRandStr(4);
					//验证码存入session
					$_SESSION["changepwd_acode"] = $acode_temp;
					//通过短信发送验证码
					if(send_changepwd_acode_sms($acode_temp)==0){
						//验证码发送成功
					}
					else{
						//验证码发送失败
					}
					//跳转至验证码验证页面
				}
				else{
					//用户名不存在，跳转至找回密码并提示用户不存在
				}
			}
		}

		/**
		修改密码 
		提供用户名和当前密码，修改为新的密码
		不提供相关信息跳转至修改页面
		*/
		public function changepwd(){
			$this->load->Model("user_model");
			session_start();
			if($this->input->post('user_id')){ //检测数据条件
			$user_id = $this->input->post('user_id');//获取用户名
			$current_pwd = $this->input->post('current_pwd');//获取当前密码
			$new_pwd = $this->input->post('new_pwd');//新密码
				$res = $this->user_model->change_pwd($user_id,$current_pwd,$new_pwd);//调用数据库操作修改密码
				switch ($res) {//判断密码修改结果
					case '0'://密码修改成功
						# code...
						echo "success";
						break;

					case '-1'://密码修改失败旧密码错误
						# code...
						echo "failed";
						break;
					default:
						# code...
						break;
				}
			}
			else{//未提供必要数据
				$this->load->view('modify_password');
			}
		}
		/**
		验证验证码
		*/
		public function confirm($acode){
			session_start();
		}

		/**
		生成验证码
		*/
		private function generate_code(){ 

			return "2222";
		}
	}
?>