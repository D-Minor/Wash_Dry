<?php
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>选择优惠券</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<!--<script src="<?php echo base_url('/res/js/coupon.js');?>"></script>-->
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">选择优惠券</div>
		<div class="header-r"></div>
	</div>
	<div class="content xys-content header-fix">
		<div class="wm-detail">
			<div class="coupon-list shadow">
				<?php
					foreach ($coupons as $value) {
				?>	
					<div class="panel shadow">
						<div class="chosen-label hidden">
							<img src="<?php echo base_url('res/images/icon_supportA.png');?>">
						</div>
						<div class="coupon-info">
							<div class="title">
								<span class="coupon-name">优惠券</span>
								<span class="cpnid">No.<?php echo $value["couponid"]?></span>
							</div>
							<div class="content">
								<img class="cpic"src="<?php echo base_url('res/images/default-img-m2.png');?>">
								<div class="detail">
									<div>优惠金额：<span class="discprice"><?php echo $value["insteadprice"]?></span></div>
									<div class="ddl">使用截止日期：<?php echo $value["cddl"]?></div>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>	
	</div>
	<script src="<?php echo base_url('res/js/header.js');?>"></script>
	<script type="text/javascript">
		$('.coupon-list .coupon-info').click(function() {
			$('.coupon-info').removeClass('chosen');
			$('.chosen-label').addClass('hidden');
			$(this).addClass('chosen');
			$(this).prev().removeClass('hidden');
			var couponid = $(this).find('.cpnid').text().substr(3);
			var insteadprice = $(this).find('.discprice').text();
			setTimeout(function(){
				//跳转回order_confirm页面，在那里设置$('#coupon span')[0].text('优惠券面额');
				sessionStorage.setItem('couponid', couponid);
				sessionStorage.setItem('price', insteadprice);
				location.href = siteurl + "order/confirmorder";
			}, 500);
		});
	</script>
</body>
</html>