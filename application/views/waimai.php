<?php
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>洗衣单</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes" />
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('res/js/waimai.js');?>"></script>

</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">洗衣单</div>
		<div class="header-r header-person"></div>
	</div>
	<div class="content wqmm-content header-fix">
		<div class="wq-tabs">
			<!---------------------tab[0]---------------------------->
			<div class="tab tab-l" id="protect">
				<span class="current">校园专区</span>
				<span class="num hidden">0</span>
			</div>
			<!---------------------tab[1]---------------------------->
			<div class="tab tab-m" id="normal">
				<span>干洗专区</span>
				<span class="num hidden">0</span>
			</div>
			<!---------------------tab[2]---------------------------->
			<div class="tab tab-m" id="shoes">
				<span>鞋靴皮革</span>
				<span class="num hidden">0</span>
			</div>
			<!---------------------tab[3]---------------------------->
			<div class="tab tab-r" id="textile">
				<span>家纺家居</span>
				<span class="num hidden">0</span>
			</div>
		</div>
		<div class="wm-detail">
			<!---------------------tab[0]的内容---------------------------->
			<div class="detail-list shadow" id="detail-0">
			<?php
				foreach ($goods_array as &$value) {
			?>
				<?php
					if($value['type']=='protect'){
				?>
				<div class="shop-item split-top">
					<img class="shop-pic" src="<?php echo base_url('res/images/items').'/'.$value['picurl'];?>">
					<div class="shop-info">
						<div class="info-title">
							<span class="shop-name"><?php echo $value['servicename'];?></span>
							<!--<span class="label">两元洗</span>-->
						</div>
						<div class="info-detail">
							<div class="detail-item"><?php echo $value['serdetail'];?></div>
							<div class="detail-buy">
								<div class="price-info">
									<div class="price-now">
										<span class="price" name="price">￥<?php echo $value['price'];?></span>
										<span class="unit">/袋</span>
										<!--<span class="disc">1.0折</span>-->
									</div>
									<!--<div class="price-pre">原价￥20</div>-->
								</div>
								<div class="buy-info">
									<div name="serviceid" class="hidden"><?php echo $value['serviceid'];?></div>
									<?php 
										if (isset($shoppingcar) &&
											isset($shoppingcar[$value['serviceid']]) &&
											$shoppingcar[$value['serviceid']] > 0) {
												$num = $shoppingcar[$value['serviceid']];
												echo "<span class='icon minus'>-</span>".
													 "<span class='num'>".$num."</span>";
										}
										else {
											echo "<span class='icon minus hidden'>-</span>".
												 "<span class='num hidden'>0</span>";
										}
									?>
									<span class="icon plus">+</span>
								</div>
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
			<!---------------------tab[1]的内容---------------------------->
			<div class="detail-list shadow hidden" id="detail-1">
			<?php
				foreach ($goods_array as &$value) {
			?>
				<?php
					if($value['type']=='normal'){
				?>
				<div class="shop-item split-top">
					<img class="shop-pic" src="<?php echo base_url('res/images/items').'/'.$value['picurl'];?>">
					<div class="shop-info">
						<div class="info-title">
							<span class="shop-name"><?php echo $value['servicename'];?></span>
							<!--<span class="label">两元洗</span>-->
						</div>
						<div class="info-detail">
							<div class="detail-item"><?php echo $value['serdetail'];?></div>
							<div class="detail-buy">
								<div class="price-info">
									<div class="price-now">
										<span class="price" name="price">￥<?php echo $value['price'];?></span>
										<span class="unit">/件</span>
										<!--<span class="disc">1.0折</span>-->
									</div>
									<!--<div class="price-pre">原价￥20</div>-->
								</div>
								<div class="buy-info">
									<div name="serviceid" class="hidden"><?php echo $value['serviceid'];?></div>
									<?php 
										if (isset($shoppingcar) &&
											isset($shoppingcar[$value['serviceid']]) &&
											$shoppingcar[$value['serviceid']] > 0) {
												$num = $shoppingcar[$value['serviceid']];
												echo "<span class='icon minus'>-</span>".
													 "<span class='num'>".$num."</span>";
										}
										else {
											echo "<span class='icon minus hidden'>-</span>".
												 "<span class='num hidden'>0</span>";
										}
									?>
									<span class="icon plus">+</span>
								</div>
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
			<!---------------------tab[2]的内容---------------------------->
			<div class="detail-list shadow hidden" id="detail-2">
			<?php
				foreach ($goods_array as &$value) {
			?>
				<?php
					if($value['type']=='shoes'){
				?>
				<div class="shop-item split-top">
					<img class="shop-pic" src="<?php echo base_url('res/images/items').'/'.$value['picurl'];?>">
					<div class="shop-info">
						<div class="info-title">
							<span class="shop-name"><?php echo $value['servicename'];?></span>
							<!--<span class="label">两元洗</span>-->
						</div>
						<div class="info-detail">
							<div class="detail-item"><?php echo $value['serdetail'];?></div>
							<div class="detail-buy">
								<div class="price-info">
									<div class="price-now">
										<span class="price" name="price">￥<?php echo $value['price'];?></span>
										<span class="unit">/件</span>
										<!--<span class="disc">1.0折</span>-->
									</div>
									<!--<div class="price-pre">原价￥20</div>-->
								</div>
								<div class="buy-info">
									<div name="serviceid" class="hidden"><?php echo $value['serviceid'];?></div>
									<?php 
										if (isset($shoppingcar) &&
											isset($shoppingcar[$value['serviceid']]) &&
											$shoppingcar[$value['serviceid']] > 0) {
												$num = $shoppingcar[$value['serviceid']];
												echo "<span class='icon minus'>-</span>".
													 "<span class='num'>".$num."</span>";
										}
										else {
											echo "<span class='icon minus hidden'>-</span>".
												 "<span class='num hidden'>0</span>";
										}
									?>
									<span class="icon plus">+</span>
								</div>
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
			<!---------------------tab[3]的内容---------------------------->
			<div class="detail-list shadow hidden" id="detail-3">
			<?php
				foreach ($goods_array as &$value) {
			?>
				<?php
					if($value['type']=='house'){
				?>
				<div class="shop-item split-top">
					<img class="shop-pic" src="<?php echo base_url('res/images/items').'/'.$value['picurl'];?>">
					<div class="shop-info">
						<div class="info-title">
							<span class="shop-name"><?php echo $value['servicename'];?></span>
							<!--<span class="label">两元洗</span>-->
						</div>
						<div class="info-detail">
							<div class="detail-item"><?php echo $value['serdetail'];?></div>
							<div class="detail-buy">
								<div class="price-info">
									<div class="price-now">
										<span class="price" name="price">￥<?php echo $value['price'];?></span>
										<span class="unit">/件</span>
										<!--<span class="disc">1.0折</span>-->
									</div>
									<!--<div class="price-pre">原价￥20</div>-->
								</div>
								<div class="buy-info">
									<div name="serviceid" class="hidden"><?php echo $value['serviceid'];?></div>
									<?php 
										if (isset($shoppingcar) &&
											isset($shoppingcar[$value['serviceid']]) &&
											$shoppingcar[$value['serviceid']] > 0) {
												$num = $shoppingcar[$value['serviceid']];
												echo "<span class='icon minus'>-</span>".
													 "<span class='num'>".$num."</span>";
										}
										else {
											echo "<span class='icon minus hidden'>-</span>".
												 "<span class='num hidden'>0</span>";
										}
									?>
									<span class="icon plus">+</span>
								</div>
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
		<div class="end"></div>
	</div>
	<div class="footer xys-menu shadow-top">
		<div class="f4 btn index-btn">首页</div>
		<div class="f4 btn shopping-btn">
			衣篮
			<span class="" id="shopcarNum" style="z-index:-1;">0</span>
		</div>
		<div class="f4 btn user-btn">账户</div>
		<div class="f4 btn find-btn">更多</div>
	</div>
	<!-- -------- used js files ------------>
	<script src="<?php echo base_url('res/js/requestAnimationFrame.js');?>"></script>
	<script src='<?php echo base_url('res/js/jquery.fly.min.js');?>'></script>
	<!--<script src="<?php echo base_url('res/js/touch-0.2.14.min.js')?>"></script>-->

	<script src="<?php echo base_url('res/js/footer.js');?>"></script>
	<script src="<?php echo base_url('res/js/header.js');?>"></script>
	<script type="text/javascript">
		window.onload = function(){
		    setTimeout(function(){
		        window.scrollTo(0, 1);
		    }, 100);
		}
	</script>
</body>
</html>