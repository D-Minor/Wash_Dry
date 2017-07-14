<?php 
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>更多</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css')?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('res/js/more.js')?>"></script>

</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">更&nbsp;多</div>
		<div class="header-r header-person"></div>
	</div>
	<div class="content xys-content header-fix footer-fix">
		<div class="menu shadow">
			<div class="menu-item" onclick="showShare()">
				<img class="pic" src="<?php echo base_url('res/images/icon-my-order.png')?>"/>
				<span class="txt">分享给朋友</span>
			</div>
			<div class="menu-item split-top" onclick="location.href=siteurl+'more/serviceArea';">
				<img class="pic" src="<?php echo base_url('res/images/icon-my-coupon.png')?>"/>
				<span class="txt">服务范围</span>
			</div>
		</div>
		<div class="menu shadow">
			<div class="menu-item split-top" onclick="location.href=siteurl+'more/aboutUs';">
				<img class="pic" src="<?php echo base_url('res/images/icon-my-comment.png')?>"/>
				<span class="txt">关于我们</span>
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
	<div class="sharer hidden" onclick="hideShare()">
		<pre class="text">点击上面的按钮
	就可以分享到<span>朋友圈</span>哦！
		</pre>
		<img id="rabit" src="<?php echo base_url('res/images/share/t.png')?>">
		<img id="quan" src="<?php echo base_url('res/images/share/q.png')?>">
		<img id="arr" src="<?php echo base_url('res/images/share/arr.png')?>">
	</div>
	<script src="<?php echo base_url('res/js/header.js')?>"></script>
	<script src="<?php echo base_url('res/js/footer.js')?>"></script>
	<script type="text/javascript">
		function showShare() {
			$('.sharer').removeClass('hidden');
			// if ($(".sharer").prop("hidden") == true) {
			// 	$(".sharer").prop("hidden", false);
			// }
			// return false;
		}

		function hideShare() {
			$('.sharer').addClass('hidden');
			// $(".sharer").prop("hidden", true);
			// return false;
		}
	</script>
</body>
</html>
