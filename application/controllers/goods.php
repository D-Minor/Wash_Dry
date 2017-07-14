<?php
/**
商品控制器，负责商品相关操作
*/
	class Goods extends CI_Controller {
		/**
		打开商品列表
		访问数据库提取商品列表
		*/
		public function goods_list($param){
			//加载模型
			$this->load->model("goods_model");
			$this->load->helper('url');
			//查询数据库获取结果集
			$res = $this->goods_model->getallenbale();
			//传递标志位进入view
			$data['tag'] = $param;
			//传递数据view
			$data['goods_array'] = $res->result_array();
			session_start();
			if (isset($_SESSION['shoppingcar'])) {
				$data['shoppingcar'] = $_SESSION['shoppingcar'];
			}
			$this->load->view("waimai",$data);
		}

		public function goods_admin(){
			$this->load->view("goods_admin");
		}
		/**
		添加新的商品
		输入{商品信息}
		输出{插入成功:true,插入失败:false}
		*/
		function insertnewgoods(){
			//获取相关参数
			$servicename = $this->input->post("servicename");
			$price = $this->input->post("price");
			$picurl = $this->input->post("picurl");
			$enable = 0;
			$type = $this->input->post("type");
			if($servicename){
				//加载模型
				$this->load->model("goods_model");
				//准备数据
				$data = array(
					'servicename'=>$servicename,
					'price'=>$price,
					'picurl'=>$picurl,
					'enable'=>$enable,
					'type'=>$type
				);
				//插入数据
				if($this->goods_model->insert($data)){
					echo true;
				}
				else{
					echo false;
				}
			}
			else{
				echo false;
			}
		}

		/**
		删除商品信息,只对商品enbale状态进行标记不真正删除商品
		输入{商品编号:$id}
		输出{删除成功:true,删除失败:false}

		*/
		function delete($serviceid){

			return true;
		}




	}
?>