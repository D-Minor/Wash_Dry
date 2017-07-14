<?php
/**
订单相关信息管理控制器
*/
	class Order extends CI_Controller {
		function __construct(){
        	//parent::CI_Controller();
        	//构造时，加载模型
        	parent::__construct();
            //加载订单相关的两个数据模型
        	$this->load->model('Bill_model','',TRUE);
            $this->load->model('BillDetail_model');
            //加载helper airsky46 2015-3-21
            $this->load->helper("user_helper");
            $this->load->helper("url");
    	}
		/**
		获取用户订单相关信息并跳转至myorder页面
		*/
		public function myorder(){
            session_start();
            $username=$_SESSION["user_id"];
            $res=$this->Bill_model->qbillbyuser($username);//查出每个用户对应的所有bill（此处先不连接billdetail）
            $userbdlist=$res->result_array();
            //var_dump($userbdlist);
            $ublist = array();//定义一个数组重新组织结果集合；
            $ubl=0;
            foreach ($userbdlist as $key => $value) {
                $ublist[$ubl]['billid']=$value['billid'];
                $ublist[$ubl]['rflag']=$value['rflag'];
                $ublist[$ubl]['cflag']=$value['cflag'];
                $ublist[$ubl]['pflag']=$value['pflag'];
                $ublist[$ubl]['payment']=$value['payment'];
                $ublist[$ubl]['billctime']=$value['billctime'];
                $ublist[$ubl]['billdetail']=$this->Bill_model->qbdbyuser($value['billid']);
                $ubl++;
            }
            //var_dump($ublist);
            //echo $username;
            $data['userbdlist']=$ublist;
			$this->load->view("myorder",$data);
		}

        public function test(){
            
		}
		/**
		获取订单详细信息
		输入{订单编号:$order_id}
		*/
		public function orderdetail($order_id){
            $res=$this->Bill_model->querybillbyid($order_id);
            $data['bdid']=$order_id;
            //var_dump($res->result_array());
            $data['bdlist']=$res->result_array();
			$this->load->view("order_detail",$data);
		}
		/**
        新建订单-yc 2015-1-8
        输出参数方法 post -airsky46
        参数{userid，username,address,contact}
        }
        **/
        /*
    	function insert($bill_userid,$username,$address,$contact){
           
    		$bill_id=$this->Bill_model->insert_bill($bill_userid,$username,$address,$contact);
    		echo $bill_id;
    		return $bill_id;
    	}
        */

		/**
        接收订单-yc 2015-1-8
        **/
    	function receive($bill_id){
    		$this->Bill_model->receive_bill($bill_id);
    	}

		/**
        订单完成-yc 2015-1-8
        **/
    	function complete_bill($bill_id){
    		$this->Bill_model->complete_bill($bill_id);
    	}

        /**
        查询订单详细Bybillid-yc 2015
        **/
        function showdetailbyid($bill_id){
            $this->Bill_model->querybillbyid($bill_id);
        }

                /**
        查询订单详细Byusername-yc 2015
        **/
        function showdetailbyuser($username){
            $this->Bill_model->querybillbyuser($username);
        }

		/**
        订单确认页面相关信息
		从购物车中读取商品信息，用于订单确认
        订单和商品信息通过$data中的$good和$goods_array传递至view
        备份 yjt 2015-06-24
		*/
		public function confirmorder2(){
			session_start();
            //验证登录状态 已登录跳转至订单确认环节，未登录跳转至登陆 airsky46
            if(is_login()){
                //验证购物车中是否存在上平，存在商品进行订单确认，不存在商品提示先访问商品列表添加商品
                if(!isset($_SESSION["shoppingcar"])){//未设置购物车，添加购物车空间
                    //设置购物车
                    $goods = array();
                    $_SESSION["shoppingcar"]=$goods;
                }
            }
            else{
                //未登录跳转至登陆页面
                $url = site_url('user/login');  
                echo "<script language='javascript' type='text/javascript'>";  
                echo "window.location.href='$url'";  
                echo "</script>"; 
                return;
            }
            //加载模型
            $this->load->model("goods_model");
            $this->load->model("address_model");
            $this->load->model("coupon_model");
            //获取购物车之中的内容
            $data['goods'] = $_SESSION["shoppingcar"];
            //获取购物车中商品相关的详细信息
            //查询数据库获取结果集
            $res = $this->goods_model->getgoodsinfo($_SESSION["shoppingcar"]);
            //将查询结果转换为关联数组
            $goods_array  = array();
            foreach ($res->result_array() as $value) {
                $goods_array[$value["serviceid"]] = $value;
            }
            //获取地址信息
            $address = $this->address_model->queryaddbyuser($_SESSION["user_id"])->result_array();
            //获取优惠券信息 modified by yjt 2015-4-13
            //$coupons = $this->coupon_model->userefcoupon($_SESSION["user_id"])->result_array();

            //传递信息
            $data['goods_array'] = $goods_array;
            $data['address'] = $address;
            //$data['coupons'] = $coupons;
			$this->load->view("order_confirm",$data);
		}	

        /**
        通过ajax提交订单
        输出{成功:success,失败:failed} -airsky46 2015-3-21 
        ！！！！！！！！需要同时进行大量数据库操作，需进行数据库事物改进，避免发生错误！！！！！！！！！
        */
        public function submit_order(){
            session_start();
            //从session中获取用户身份相关参数
            $bill_userid=$_SESSION["user_id"];
            $username=$_SESSION["user_name"];
            //从post中获取用户订单相关信息
            $address=$this->input->post('address');
            $contact=$this->input->post('contact');
            $totalprice=$this->input->post('totalprice');
            $_SESSION["totalprice"]=$totalprice;
            $payment=$this->input->post('payment');

            //从post中获取用户订单详细信息-关联数组形式
            //$bill_detail=$this->input->post('bill_detail');

            //从session中获取用户当前购买的商品数量等信息
            $bill_detail=$_SESSION["shoppingcar"];
            //插入订单基本信息，并获取订单号
            $bill_id=$this->Bill_model->insert_bill($bill_userid,$username,$address,$contact,$totalprice,$payment);
            //根据订单号和订单详细信息管理数组，通过循环迭代完成订单详细信息插入
            foreach ($bill_detail as $serviceid => $sercount) {
                if ($sercount > 0)
                    $this->BillDetail_model->insert_billdetail($bill_id,$serviceid,$sercount);
            }
            //echo $bill_userid;
            //modified by yjt 2015-06-24 修改返回值为json
            $res['result'] = 'success';
            $res['billid'] = $bill_id;
            $_SESSION["billid"]=$bill_id;//yc add 2015-6-24 20:38
            echo json_encode($res);//'success';
            //购物成功清空购物车
            $_SESSION["shoppingcar"]=array();
            /*session_start();
            //从session中获取用户身份相关参数
            $bill_userid=$_SESSION["user_id"];
            $username=$_SESSION["user_name"];
            //从post中获取用户订单相关信息
            $address=$this->input->post('address');
            $contact=$this->input->post('contact');

            //从post中获取用户订单详细信息-关联数组形式
            //$bill_detail=$this->input->post('bill_detail');

            //从session中获取用户当前购买的商品数量等信息
            $bill_detail=$_SESSION["shoppingcar"];
            //插入订单基本信息，并获取订单号
            $bill_id=$this->Bill_model->insert_bill($bill_userid,$username,$address,$contact,0);
            //根据订单号和订单详细信息管理数组，通过循环迭代完成订单详细信息插入
            foreach ($bill_detail as $serviceid => $sercount) {
                if ($sercount > 0)
                    $this->BillDetail_model->insert_billdetail($bill_id,$serviceid,$sercount);
            }
            //echo $bill_userid;
            //modified by yjt 2015-06-24 修改返回值为json
            $res['result'] = 'success';
            $res['billid'] = $bill_id;
            echo json_encode($res);//'success';
            //购物成功清空购物车
            $_SESSION["shoppingcar"]=array();*/
	   }

       /**
        取消订单-yjt 2015-5-12
        **/
        function cancel_bill($bill_id){
            $this->Bill_model->cancel_bill($bill_id);
        }

        /**
        订单确认页面相关信息
        从购物车中读取商品信息，用于订单确认
        订单和商品信息通过$data中的$good和$goods_array传递至view
        */
        public function confirmorder(){
            session_start();
            //验证登录状态 已登录跳转至订单确认环节，未登录跳转至登陆 airsky46
            if(is_login()){
                //验证购物车中是否存在上平，存在商品进行订单确认，不存在商品提示先访问商品列表添加商品
                if(!isset($_SESSION["shoppingcar"])){//未设置购物车，添加购物车空间
                    //设置购物车
                    $goods = array();
                    $_SESSION["shoppingcar"]=$goods;
                }
            }
            else{
                //未登录跳转至登陆页面
                $url = site_url('user/login');  
                echo "<script language='javascript' type='text/javascript'>";  
                echo "window.location.href='$url'";  
                echo "</script>"; 
                return;
            }
            //加载模型
            $this->load->model("goods_model");
            $this->load->model("address_model");
            $this->load->model("coupon_model");
            //获取购物车之中的内容
            $data['goods'] = $_SESSION["shoppingcar"];
            //获取购物车中商品相关的详细信息
            //查询数据库获取结果集
            $res = $this->goods_model->getgoodsinfo($_SESSION["shoppingcar"]);
            //将查询结果转换为关联数组
            $goods_array  = array();
            foreach ($res->result_array() as $value) {
                $goods_array[$value["serviceid"]] = $value;
            }
            //获取地址信息
            $address = $this->address_model->queryaddbyuser($_SESSION["user_id"])->result_array();
            //获取优惠券信息 modified by yjt 2015-4-13
            //$coupons = $this->coupon_model->userefcoupon($_SESSION["user_id"])->result_array();

            //传递信息
            $data['goods_array'] = $goods_array;
            $data['address'] = $address;
            //$data['coupons'] = $coupons;

            //加载微信支付相关 add by yjt
            // $this->load->library('Wxpay_jsapi');
            // $paydata['bill'] = 1;
            // $apidata = $this->wxpay_jsapi->get_parameters($paydata);

            // $data['jsApiParameters'] = $apidata['jsApiParameters'];
            // $data['editAddress'] = $apidata['editAddress'];

            $this->load->view("order_confirm",$data);
        }

        public function wxpay(){
            session_start();
            //加载微信支付相关 add by yjt
            $this->load->library('Wxpay_jsapi');
            $this->load->model('bill_model');

            $money = $_SESSION["totalprice"];//yc temp 6-24 20:36
            $paydata['bill'] = $money;
            $apidata = $this->wxpay_jsapi->get_parameters($paydata);

            $data['jsApiParameters'] = $apidata['jsApiParameters'];
            $data['editAddress'] = $apidata['editAddress'];
            $data['bill'] = $money*1.0/100;
            $data['billid'] = $_SESSION['billid'];

            $this->load->view("wxpay",$data);
        }

        public function continue_wxpay($billid){
            //加载微信支付相关 add by yjt
            $this->load->library('Wxpay_jsapi');
            $this->load->model('bill_model');

            $money = $this->bill_model->findpricebybillid($billid);
            $paydata['bill'] = $money;
            $apidata = $this->wxpay_jsapi->get_parameters($paydata);

            $data['jsApiParameters'] = $apidata['jsApiParameters'];
            $data['editAddress'] = $apidata['editAddress'];
            $data['bill'] = $money*1.0/100;
            $data['billid'] = $billid;

            $this->load->view("wxpay",$data);
        }

        /**
        设置为 支付成功 yjt 2015-06-24
        */
        public function paysuccess($billid) {
            $this->load->model("bill_model");
            $this->bill_model->pay_bill($billid);
            echo "success";
        }
        /**
        支付失败，删除订单 yjt 2015-06-24
        */
        public function deleteorder($billid) {
            $this->load->model('bill_model');
            $this->load->model('billdetail_model');
            if ($this->bill_model->delete_bill($billid) == 1) {
                $res = $this->billdetail_model->delete_billdetail($billid);
                if ($res == 1)
                    echo "success";
                else
                    echo "fail";
            }
            else
                echo "fail";
        }
	}
?>
