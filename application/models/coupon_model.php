<?php
/**
优惠券模型
*/
	class Coupon_Model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		/**
		判断优惠券是否过期
		*/
		function isoverddl($coupon_id){
			$this->db->where('cddl',$coupon_id);//查询条件
			$res = $this->db->get('coupon');//查询表名
			if($res->num_rows() > 0){
				return 1;
			}
			else{
				return 0;
			}
		}

		/**
		给用户发优惠券 
		输入：优惠券id-$coupon_id 用户id-$user_id
		**/
		function addusercoupon($username,$coupon_id){
			$data = array(
				'username'=>$username,
				'couponid'=>$coupon_id
				);
			$this->db->insert('usercoupon',$data);
			if($this->db->affected_rows()>0){
				return 1;//发放成功
			}
			else{
				return 0;//发放失败
			}
		}

		/**
		By username 查看用户所有优惠券 yc 2015-2-4
		**/
		function userallcoupon($username){
			$this->db->select('a.*,b.*')
			->from('coupon AS a')
			->join('usercoupon AS b','a.couponid = b.couponid')
			->where('b.username',$username);
			$res=$this->db->get();	
			//var_dump($res->result_array());//临时显示结果以后可以删除
			return $res;
		}

		/**
		By username 查看用户有效优惠券 yc 2015-2-4
		**/
		function userefcoupon($username){
			$this->db->select('a.*,b.*')
			->from('coupon AS a')
			->join('usercoupon AS b','a.couponid = b.couponid')
			->where('b.username',$username)
			->where('a.efflag',1);
			$res=$this->db->get();	
			//var_dump($res->result_array());//临时显示结果以后可以删除
			return $res;
		}
	}
?>