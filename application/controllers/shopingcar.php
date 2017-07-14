<?php
/**
用户购物车
通过session保存用户的购物信息
*/
	class Shopingcar extends CI_Controller {
		/**
		清空购物车
		*/
		public function clear_car(){
			session_start();
			//清空购物车
			$_SESSION["shoppingcar"]=array();
			
		}
		/**
		添加商品到购物车，或增加商品数量
		输入{服务编号:$serviceid}
		*/
		public function add($serviceid){
			session_start();
			//检查购物车是否已经设置
			if(!isset($_SESSION["shoppingcar"])){//未设置
				//设置购物车
				$goods = array();
				$_SESSION["shoppingcar"]=$goods;
			}
			//获取购物车之中的内容
			$goods = $_SESSION["shoppingcar"];
			//检查购物车之中是否已有该商品
			if(!isset($goods[$serviceid])){//没有该商品
				//增加商品
				$goods[$serviceid]=1;
			}
			else{
				//商品数量加1
				$goods[$serviceid]=""+$goods[$serviceid]+1;
			}
			$_SESSION["shoppingcar"]=$goods;
		}

		/**
		从购物车中移除某个商品，或减少商品数量
		输入{服务编号:$serviceid}
		*/
		public function remove($serviceid){
			session_start();
			//检查购物车是否已经设置
			if(!isset($_SESSION["shoppingcar"])){//未设置
				//设置购物车
				$goods = array();
				$_SESSION["shoppingcar"]=$goods;
			}
			//获取购物车之中的内容
			$goods = $_SESSION["shoppingcar"];
			//检查购物车之中是否已有该商品
			if(!isset($goods[$serviceid])){//没有该商品
				//增加商品
				$goods[$serviceid]=0;
			}
			else{
				//商品数量减1
				if($goods[$serviceid]>0){
					$goods[$serviceid]=""+$goods[$serviceid]-1;
				}
			}
			$_SESSION["shoppingcar"]=$goods;
		}

		/**
		获取购物车中的内容
		*/
		function getshopingcar(){
			session_start();
			//输出购物车之中的内容
			var_dump($_SESSION);
		}

	}
?>