<?php 
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>围裙妈妈-专业洁净</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css')?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('res/js/main.js')?>"></script>

</head>

<body>
	<div class="header xys-title">
		<div class="header-l header-loc"></div>
		<div class="header-m header-loc-name">南京</div>
		<div class="header-r header-person"></div>
	</div>
	<div class="content wqmm-content header-fix footer-fix">
		<div class="pic-list">
			<img class="pic-item" src="<?php echo base_url('res/images/pic-list-1.png')?>" onclick="location.href='<?php echo site_url('/goods/goods_list/protect');?>'"/>
			<!--<img class="pic-item hidden" src="<?php echo base_url('res/images/pic-list-2.png')?>" onclick="location.href='<?php echo site_url('index/secondimg');?>'"/>
			<img class="pic-item hidden" src="<?php echo base_url('res/images/pic-list-3.png')?>" onclick="location.href='<?php echo site_url('index/thirdimg');?>'"/>
			<!--<img class="pic-item hidden" src="<?php echo base_url('res/images/pic-list.jpg')?>"/>-->
		</div>
		<div class="point-list">
			<div class="point-item selected"></div>
			<!--<div class="point-item"></div>
			<div class="point-item"></div>-->
		</div>
		<div class="main-options">
			<div class="row">
				<div class="f3" id="normal">
					<img class="options-1" src="<?php echo base_url('res/images/normal.png')?>" />
					<div class="options-txt">日常洗衣</div>
				</div>
				<div class="f3" id="shoes">
					<img class="options-2" src="<?php echo base_url('res/images/shoes.png')?>" />
					<div class="options-txt">鞋靴皮革</div>
				</div>
				<div class="f3" id="textile">
					<img class="options-3" src="<?php echo base_url('res/images/textile.png')?>" />
					<div class="options-txt">家纺家居</div>
				</div>
			</div>
			<div class="row">
				<div class="f3" id="protect">
					<img class="options-1" src="<?php echo base_url('res/images/weihu.png')?>" />
					<div class="options-txt">校园专区</div>
				</div>
				<div class="f3" id="orders">
					<img class="options-2" src="<?php echo base_url('res/images/order.png')?>" />
					<div class="options-txt">订单查询</div>
				</div>
				<div class="f3" id="service">
					<img class="options-3" src="<?php echo base_url('res/images/area.png')?>" />
					<div class="options-txt">服务范围</div>
				</div>
			</div>
		</div>
		<div class="act-row split-top">
			<div class="f2 full-height">
				<img src="<?php echo base_url('res/images/act2-1.png')?>" />
			</div>
			<div class="f2 full-height">
				<img src="<?php echo base_url('res/images/act2-2.png')?>" />
			</div>
		</div>
		<div class="end"></div>
	</div>
	<div class="footer xys-menu shadow-top">
		<div class="f4 btn index-btn chosen">首页</div>
		<div class="f4 btn shopping-btn">衣篮</div>
		<div class="f4 btn user-btn">账户</div>
		<div class="f4 btn find-btn">更多</div>
	</div>
	<script src="<?php echo base_url('res/js/footer.js')?>"></script>
	<script src="<?php echo base_url('res/js/header.js')?>"></script>
	<script src="<?php echo base_url('res/js/touch-0.2.14.min.js')?>"></script>
	<script>
		$(document).ready(function () {
			$('#normal').click(function() {
				location.href = "<?php echo site_url('goods/goods_list/normal');?>";
			});
			$('#shoes').click(function() {
				location.href = "<?php echo site_url('goods/goods_list/shoes');?>";
			});
			$('#textile').click(function() {
				location.href = "<?php echo site_url('goods/goods_list/textile');?>";
			});
			$('#protect').click(function() {
				location.href = "<?php echo site_url('goods/goods_list/protect');?>";
			});
			$('#orders').click(function() {
				location.href = "<?php echo site_url('order/myorder');?>";
			});
			$('#service').click(function() {
				location.href = "<?php echo site_url('more/serviceArea');?>";
			});
		});
</script>
</body>
</html>