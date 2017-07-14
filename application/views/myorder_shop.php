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
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('/res/js/order.js');?>"></script>

</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">我的订单</div>
		<div class="header-r"></div>
	</div>
	<div class="content xys-content header-fix">
		<div class="wq-tabs">
			<div class="f3 tab tab-l" id="notpayed">
                <span class="current">待接单</span>
            </div>
            <div class="f3 tab tab-m" id="doing">
                <span>正在进行</span>
            </div>
            <div class="f3 tab tab-r" id="finished">
                <span>已完成</span>
            </div>
		</div>
		<div class="wm-detail">
			<div class="detail-list shadow" id="detail-0">
				<div class="panel">
					<div class="panel-title">
						<span class="txt order-time">2015-01-12</span>
						<span class="txt order-status">待接单</span>
					</div>
					<div class="panel-content" onclick="location.href='<?php echo site_url("order/orderdetail_shop")?>';">
						<div class="buy-item">
							<div class="item-detail">
								<span class="name">春秋外套类1</span>
								<span class="num">2件</span>
								<span class="price">￥30</span>
							</div>
						</div>
						<div class="buy-item">
							<div class="item-detail">
								<span class="name">春秋外套类2</span>
								<span class="num">1件</span>
								<span class="price">￥30</span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="totalInfo">
							共<span class="totalnum">2</span>件商品，实付<span class="totalPrice">￥60</span>
						</div>
						<button class="btn btn-xs">确认接单</button>
					</div>				
				</div>
			</div>
			<div class="detail-list shadow hidden" id="detail-1">
				<div class="panel">
					<div class="panel-title">
						<span class="txt order-time">2015-01-11</span>
						<span class="txt order-status">正在洗衣</span>
					</div>
					<div class="panel-content" onclick="location.href='<?php echo site_url("order/orderdetail_shop")?>';">
						<div class="buy-item">
							<div class="item-detail">
								<span class="name">春秋外套类1</span>
								<span class="num">2件</span>
								<span class="price">￥30</span>
							</div>
						</div>
						<div class="buy-item">
							<div class="item-detail">
								<span class="name">春秋外套类2</span>
								<span class="num">1件</span>
								<span class="price">￥30</span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="totalInfo">
							共<span class="totalnum">2</span>件商品，实付<span class="totalPrice">￥60</span>
						</div>
						<button class="btn btn-xs">待确认收货</button>
					</div>				
				</div>
			</div>
			<div class="detail-list shadow hidden" id="detail-2">
				<div class="panel">
					<div class="panel-title">
						<span class="txt order-time">2015-01-10</span>
						<span class="txt order-status order-sucess">已完成</span>
					</div>
					<div class="panel-content" onclick="location.href='<?php echo site_url("order/orderdetail_shop")?>';">
						<div class="buy-item">
							<div class="item-detail">
								<span class="name">春秋外套类1</span>
								<span class="num">2件</span>
								<span class="price">￥30</span>
							</div>
						</div>
						<div class="buy-item">
							<div class="item-detail">
								<span class="name">春秋外套类2</span>
								<span class="num">1件</span>
								<span class="price">￥30</span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="totalInfo">
							共<span class="totalnum">2</span>件商品，实付<span class="totalPrice">￥60</span>
						</div>
						<button class="btn btn-xs hidden"></button>
					</div>				
				</div>
			</div>
		</div>
		<div class="end"></div>
	</div>
	<script src="<?php echo base_url('res/js/header.js');?>"></script>
</body>
</html>
