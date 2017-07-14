<?php
/**
用户模型
*/
	class User_Model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		/**
		检查用户名是否占用
		*/
		function isuserexist($user_id){
			$this->load->database();
			$this->db->where('username',$user_id);//查询条件
			$res = $this->db->get('user');//查询表名
			if($res->num_rows() > 0){
				return true;//用户名已存在返回true
			}
			else{
				return false;//用户名不存在返回false
			}
		}
		/**
		添加用户..后期需添加事务管理防止注册过程中当前用户名被占用
		add 昵称 -yjt 2015-4-15
		*/
		function user_add($user_id, $user_name, $user_password,$headimgurl){
			if($this->isuserexist($user_id)){
				return -1;//用户名已存在
			}
			$this->load->database();
			$data = array(
				'username'=>$user_id,
				'realname'=>$user_name,
				'pwd'=>$user_password,
				'headimgurl'=>$headimgurl
			);
			$this->db->insert('user',$data);//插入
			if($this->db->affected_rows()>0){
				return 1;//注册成功
			}
			else{
				return 0;//注册失败
			}
		}
		/**
		用户登录
		*/
		function user_login($user_id,$user_password){
			$this->load->database();
			$this->db->where('username',$user_id);//查询条件
			$res = $this->db->get('user');//查询表名
			$message = $res->result_array();
			if(!isset($message[0]["pwd"])){//登陆失败返回登陆页面 用户名错误
				//用户名不存在返回0
				return 0;
			}
			else{
				return 1;
			}
		}

		/**
		通过user_id查找user_name -airsky46
		*/
		function find_user_name($user_id){
			$this->load->database();
			$this->db->where('username',$user_id);
			$res = $this->db->get('user');
			$message = $res->result_array();
			return $message[0]["realname"];
		}
		/**
		修改用户密码
		提供用户名 旧密码 新密码
		返回
			0密码修改成功
			-1旧密码错误 密码修改失败
 		*/
		function change_pwd($user_id,$current_pwd,$new_pwd){
			$this->load->database();
			$data = array(
                'pwd' => $new_pwd
            );
            //检查旧密码是否正确
			$this->db->where('username',$user_id);
			$this->db->where('pwd',$current_pwd);
			//更新新密码
			$this->db->update('user', $data);
			if($this->db->affected_rows()>=1){
				return 0;
			}
			else{
				return -1;
			}
		}

		/**
		用户短信验证码方式,修改用户密码
		提供用户名 新密码
		返回
			1密码修改成功
			0旧密码错误 密码修改失败
		*/
		function acode_change_pwd($user_id,$new_pwd){

			return 1;//修改密码成功
		}

		/**
		查找头像
		*/
		function gethead($user_id){
			$this->load->database();
			$this->db->where('username',$user_id);
			$res = $this->db->get('user');
			if($res->num_rows()>0)
			{
				$message = $res->result_array();
				return $message[0]["headimgurl"];
			}
			else{
				return "";
			}
		}

	}
?>