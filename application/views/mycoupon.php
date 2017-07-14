<?php
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>我的优惠券</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('/res/js/coupon.js');?>"></script>
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">我的优惠券</div>
		<div class="header-r"></div>
	</div>
	<div class="content wqmm-content header-fix">
		<div class="wq-tabs">
			<div class="f3 tab tab-l" id="all">
				<span class="current">全部</span>
			</div>
			<div class="f3 tab tab-m" id="notused">
				<span>未使用</span>
			</div>
			<div class="f3 tab tab-r" id="used">
				<span>已过期</span>
			</div>
		</div>
		<div class="wm-detail">
			<div class="detail-list shadow" id="detail-0">
				<?php
					foreach ($coupons as $value) {
				?>
				<div class="panel shadow">
					<div class="coupon-info 
						<?php 
							if ($value['efflag']=='0' || strcmp(date('y-m-d',time()), $value['cddl'])>0)
								echo 'outofdate';
						?>
					">
						<div class="title">
							<span class="coupon-name">优惠券</span>
							<span class="cpnid">No.<?php echo $value['couponid'];?></span>
						</div>
						<div class="content">
							<img class="cpic"src="<?php echo base_url('res/images/default-img-m2.png');?>">
							<div class="detail">
								<div>优惠金额：<span class="discprice"><?php echo $value['insteadprice'];?>元</span></div>
								<div class="ddl">使用截止日期：<?php echo $value['cddl'];?></div>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<div class="detail-list shadow hidden" id="detail-1">
				<?php
					foreach ($coupons as $value) {
				?>
				<?php
					if($value['efflag']=='1' && strcmp(date('y-m-d',time()), $value['cddl'])<0) {
				?>
				<div class="panel shadow">
					<div class="coupon-info">
						<div class="title">
							<span class="coupon-name">优惠券</span>
							<span class="cpnid">No.<?php echo $value['couponid'];?></span>
						</div>
						<div class="content">
							<img class="cpic"src="<?php echo base_url('res/images/default-img-m2.png');?>">
							<div class="detail">
								<div>优惠金额：<span class="discprice"><?php echo $value['insteadprice'];?>元</span></div>
								<div class="ddl">使用截止日期：<?php echo $value['cddl'];?></div>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
				<?php
					}
				?>
			</div>
			<div class="detail-list shadow hidden" id="detail-2">
				<?php
					foreach ($coupons as $value) {
				?>
				<?php
					if($value['efflag']=='0' || strcmp(date('y-m-d',time()), $value['cddl'])>0) {
				?>
				<div class="panel shadow">
					<div class="coupon-info outofdate">
						<div class="title">
							<span class="coupon-name">优惠券</span>
							<span class="cpnid">No.<?php echo $value['couponid'];?></span>
						</div>
						<div class="content">
							<img class="cpic"src="<?php echo base_url('res/images/default-img-m2.png');?>">
							<div class="detail">
								<div>优惠金额：<span class="discprice"><?php echo $value['insteadprice'];?>元</span></div>
								<div class="ddl">使用截止日期：<?php echo $value['cddl'];?></div>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
				<?php
					}
				?>
			</div>
		</div>	
	</div>
	<script src="<?php echo base_url('res/js/header.js');?>"></script>
</body>
</html>