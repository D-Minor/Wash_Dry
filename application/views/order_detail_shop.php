<?php 
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>洗衣单</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css')?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">订单详情</div>
		<div class="header-r"></div>
	</div>
	<div class="content xys-content header-fix">
		<div class="panel shadow">
			<div class="panel-title">
				<span class="txt order-time">2015-01-12</span>
				<span class="txt order-status">交易成功</span>
			</div>
			<div class="panel-content">
				<div class="line">
					订单金额（含运费）：<span id="totalPrice">￥40</span>
				</div>
				<div class="line">
					运费：<span id="postFee">￥0</span>
				</div>
				<div class="line">
					联系方式：<span id="tel">15212345678</span>
				</div>
				<div class="line">
					取送地址：<span id="address">南京市孝陵卫200号</span>
				</div>
			</div>	
		</div>
		<div class="panel shadow">
			<!-- ---------------------- -->
			<div class="panel-title">
				<span class="txt">衣单详情</span>
			</div>
			<div class="panel-content">
				<div class="buy-item">
					<div class="item-detail">
						<span class="name">春秋外套类1</span>
						<span class="num">2件</span>
						<span class="price">￥30</span>
					</div>
					<div class="item-more">
						<span class="txt">西装 夹克 毛衣 羽绒马甲</span>
					</div>
				</div>
				<div class="buy-item">
					<div class="item-detail">
						<span class="name">春秋外套类2</span>
						<span class="num">1件</span>
						<span class="price">￥30</span>
					</div>
					<div class="item-more">
						<span class="txt">西装 夹克 毛衣 羽绒马甲</span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel shadow">
			<div class="panel-title">
				<span class="txt">支付方式</span>
			</div>
			<div class="panel-content">
				<div class="buy-item" id="payMethod">
					<span class="square-btn chosen">现金支付</span>
					<span class="pay-detail"></span>
				</div>
			</div>	
		</div>
		<div class="panel shadow">
			<div class="panel-title">
				<div class="order-info">
					洗衣订单号<span id="orderid">20150112123456</span>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('res/js/header.js')?>"></script>
</body>
</html>