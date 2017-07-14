<?php 
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>我的</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css')?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('res/js/mine.js')?>"></script>

</head>

<body>
	<div class="my-header wm-title">
		<img class="my-photo" src="<?php echo $headimgurl;?>">
		<span class="my-name"><?php echo $nickname ?></span>
	</div>
	<div class="content xys-content footer-fix">
		<div class="menu shadow">
			<div class="menu-item" onclick="location.href='<?php echo site_url("order/myorder")?>';">
				<img class="pic" src="<?php echo base_url('res/images/icon-my-order.png')?>"/>
				<span class="txt">我的订单</span>
			</div>
			<div class="menu-item split-top" onclick="location.href='<?php echo site_url("coupon/mycoupon");?>';">
				<img class="pic" src="<?php echo base_url('res/images/icon-my-coupon.png')?>"/>
				<span class="txt">我的代金券</span>
			</div>
			<div class="menu-item split-top" onclick="location.href='<?php echo site_url("address/manage_address")?>';">
				<img class="pic" src="<?php echo base_url('res/images/icon-my-score.png')?>"/>
				<span class="txt">地址管理</span>
			</div>
			<div class="menu-item split-top" onclick="location.href='<?php echo site_url("user/changepwd");?>';">
				<img class="pic" src="<?php echo base_url('res/images/icon-my-comment.png')?>"/>
				<span class="txt">修改密码</span>
			</div>
		</div>
		<div class="btn btn-block exit" onclick="location.href='<?php echo site_url('user/loginout');?>';">退出登录</div>
		<div class="end"></div>
	</div>
	<div class="footer xys-menu shadow-top">
		<div class="f4 btn index-btn chosen">首页</div>
		<div class="f4 btn shopping-btn">
			衣篮
			<span id="shopcarNum" style="z-index:-1;">0</span>
		</div>
		<div class="f4 btn user-btn">账户</div>
		<div class="f4 btn find-btn">更多</div>
	</div>
	<script src="<?php echo base_url('res/js/footer.js')?>"></script>
	<script type="text/javascript">
		function logout(){
			$.ajax({
	   		url: "<?php echo site_url('user/loginout');?>",
	   		success: function(msg){//用户名检测结果
	   			if(msg=="success"){
	 				$.Prompt("已退出登录", 2000); //时间单位为ms 
	 				setTimeout(function() {
	   					window.location.href='<?php echo site_url("");?>';
	   				}, 1500);
	     		}
	     		else{
	     			$.Prompt("网络有点不太给力啊~请重试~", 2000); //时间单位为ms 
	     		} 			
	     	}
		});
		}
	</script>
	<!-- prompt required -->
	<link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
	<script src="<?php echo base_url('res/js/header.js');?>"></script>
</body>
</html>