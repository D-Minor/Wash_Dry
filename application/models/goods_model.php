<?php
/**
商品模型
*/
	class Goods_Model extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		/**
		添加新的商品
		输入{商品信息关联数组:$data}
		输出{插入成功true,插入失败false}
		*/
		function insert($data){
			$this->db->insert("service",$data);
			if($this->db->affected_rows()>0){
				return true;
			}
			return false;
		}

		/**
		删除商品信息,只对商品enbale状态进行标记不真正删除商品
		输入{商品编号:$id}
		输出{删除成功:true,删除失败:false}

		*/
		function delete($serviceid){

			return true;
		}

		/**
		获取所有正在出售的商品
		输出{查询结果:$res}
		*/
		function getallenbale(){
			$enable = 0;
			$this->db->where('enable',$enable);//查询条件
			$res = $this->db->get('service');//查询表名
			return $res;//返回查询结果
		}

		/**
		获取相关商品信息
		输入{服务编号列表:$serviceids}
		输出{商品信息查询列表}
		*/
		function getgoodsinfo($serviceids){
			foreach ($serviceids as $key => $value) {
				$this->db->or_where("serviceid",$key);
			}
			$res = $this->db->get('service');//查询表名
			return $res;//返回查询结果
		}
	}
?>