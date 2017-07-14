<?php 
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>商品详细信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css')?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('res/js/waimai.js');?>"></script>

</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">商品名称</div>
		<div class="header-r header-person"></div>
	</div>
	<div class="content xys-content header-fix">
		<div class="wq-maininfo">
			<div class="price-info">
				<div class="price-now">
					<span class="price" id="priceNow">￥2</span>
					<span class="disc">1.0折</span>
					<span class="price-pre">原价￥20</span>
				</div>
			</div>
			<div class="buy-info">
				<span class="icon minus hidden">-</span>
				<input type="text" class="num hidden" value="0">
				<span class="icon plus">+</span>
			</div>
		</div>
		<div class="wm-detail">
			
		</div>
		<div class="end"></div>
	</div>
	<script src="<?php echo base_url('res/js/header.js')?>"></script>

</body>
</html>