<?php
	$this->load->helper("url");
	$total_number = 0;//商品总件数
	$total_price = 0;//订单总金额
	/**
	$goods 选购商品编号=>数量 关联数组
	$goods_array 商品详细信息 serviceid=>商品详细信息 关联数据组，索引与数据库字段名称相同
	$address 地址详细信息关联数组
	$coupons 优惠券信息
	*/
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
<script src="<?php echo base_url('res/js/confirm.js');?>"></script>

<!-- datepicker required -->
<link href="<?php echo base_url('res/css/datepicker.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/datepicker.min.js');?>"></script>
<script src="<?php echo base_url('res/js/datepicker.zh-CN.js');?>"></script>
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">确认订单</div>
		<div class="header-r"></div>
	</div>
	<div class="content xys-content header-fix">
		<!--<div class="panel shadow">
			<div class="panel-title">
				<span class="txt">取衣时间</span>
			</div>
			<div class="panel-content">
				<div class="line">
					<div id="get-date">
					    <input class="input-control" type="text" value="" datepicker readonly>
					</div>
					<div id="get-time">
						<select>
						  <option value ="09:00~14:00" selected>09:00~14:00</option>
						  <option value ="14:00~18:00">14:00~18:00</option>
						  <option value="18:00~21:00">18:00~21:00</option>
						</select>
					</div> 
				</div>
			</div>	
		</div>-->
		<div class="panel shadow">
			<!-- ---------------------- -->
			<div class="panel-title">
				<span class="txt">取送地址</span>
			</div>
			<div class="panel-content" onclick="location.href='<?php echo site_url('address/manage_address').'?action=1'; ?>';">
				<input type="hidden" id="addressid" value=""> 
				<div class="line hidden">
					<span class="txt" id="contact"></span>
				</div>
				<div class="line hidden">
					<span class="txt" id="address"></span>
				</div>
				<div class="line item-right-arrow">请选择取送地址</div>
			</div>
			<!-- ---------------------- -->
			<div class="panel-title">
				<span class="txt">衣单详情</span>
				<span class="price" id="clear">清空重选</span>
			</div>
			<div class="panel-content">
			<?php
				foreach ($goods as $key => $value) {
			?>	
				<?php
					if($value > 0){
						$total_number += $value;
						$total_price += $value*$goods_array[$key]["price"];
				?>
					<div class="buy-item">
						<div class="item-detail">
							<span class="name"><?php echo $goods_array[$key]["servicename"];?></span>
							<span class="num"><span><?php echo $value;?></span>件</span>
							<span class="price">￥<span><?php echo $value*$goods_array[$key]["price"];?></span></span>
						</div>
						<div class="item-more">
							<span class="txt">西装 夹克 毛衣 羽绒马甲</span>
						</div>
					</div>
				<?php
					}
				?>
			<?php
				}
			?>
			</div>
			<!-- ---------------------- -->
			<div class="panel-title">
				<span class="txt">运费</span>
				<span class="price" id="postfee">￥<span>0</span></span>
			</div>
			<div class="panel-title" onclick="location.href='<?php echo site_url('coupon/choose_coupon');?>';">
				<span class="txt">优惠券</span>
				<span class="price item-right-arrow" id="chooseCoupon">请选择优惠券</span>
				<input type="hidden" id="couponID" />
				<span class="price hidden" id="coupon">-￥<span>0</span></span>
			</div>
			<div class="panel-title">
				<span class="txt">合计</span>
				<span class="num" id="totalNum"><span><?php echo $total_number;?></span>件</span>
				<span class="price" id="totalFee">￥<span><?php echo $total_price;?></span></span>
			</div>
		</div>

		<div class="panel shadow">
			<div class="panel-title">
				<span class="txt">支付方式</span>
			</div>
			<div class="panel-content" id="payMethod">
				<div class="buy-item">
					<span class="square-btn chosen">现金支付</span>
					<span class="pay-detail">（送衣付款）</span>
				</div>
				<!--<div class="buy-item">
					<span class="square-btn">微信支付</span>
					<span class="pay-detail"></span>
				</div>-->
			</div>	
		</div>
		<div class="panel shadow">
			<div class="panel-title">
				<span class="txt">服务周期及配送方式</span>
			</div>
			<div class="panel-content">
				<div class="items">春秋外套类、春秋外套类、春秋外套类、春秋外套类
				</div>
				<div class="period">（服务周期：6小时内）
				</div>
			</div>	
		</div>
		<div class="btn btn-block submit" onclick="confirmorder()">提交订单</div>
	</div>
	<script type="text/javascript">
		function confirmorder(){
			if (checkData() == false)
				return;
			var postdata = new Object();
			//准备订单相关数据，通过post下单
			postdata.address = $('#address').text();
			postdata.contact = $('#contact').text();
			$.ajax({
			type:'POST',
			data:postdata,
	   		url: "<?php echo site_url('order/submit_order');?>",
	   		success: function(msg){//用户名检测结果
	   			if(msg="success"){
	   				$.Prompt("下单成功", 1500); //时间单位为ms
	   				sessionStorage.removeItem('couponid');
	   				sessionStorage.removeItem('addressid');
	   				setTimeout(function() {
	   					location.href = baseurl;
	   				}, 1500);
	   			}			
	     	}
			});
		}
		function checkData() {
			if ($('#contact').text()=="" || $('#address').text()=="") {
				$.Prompt("请选择取送地址！", 1500);
				return false;
			}
			if ($('#totalNum span').text() == '0') {
				$.Prompt("请选择要洗的衣物！", 1500);
				return false;
			}
			return true;
		}
		function loadAddress() {
			if (typeof sessionStorage['addressid'] == "undefined" ||
				sessionStorage['addressid'] == null) {
				$('#contact').parent().addClass('hidden');
				$('#address').parent().addClass('hidden');
				$('#address').parent().next().removeClass('hidden');
				return;
			}
			//加载取送地址相关信息	
			$('#addressid').val(sessionStorage['addressid']);
			$('#contact').text(sessionStorage['name']+' '+sessionStorage['telephone']);
			$('#address').text(sessionStorage['address']);
			$('#contact').parent().removeClass('hidden');
			$('#address').parent().removeClass('hidden');
			$('#address').parent().next().addClass('hidden');
		}
		function loadCoupon() {
			if (typeof sessionStorage['couponid'] == "undefined" ||
				sessionStorage['couponid'] == null) {
				$("#coupon").addClass('hidden');
				$("#chooseCoupon").removeClass('hidden');
				return;
			}
			//加载优惠券相关信息
			$("#couponID").val(sessionStorage['couponid']);
			$("#coupon span").text(sessionStorage['price'] );
		    $("#coupon").removeClass('hidden');
		    //修改计算总价
		    var totalFee = $('#totalFee span').text();
		    $('#totalFee span').text(totalFee - $("#coupon span").text());
		    $('#chooseCoupon').addClass('hidden');
		}
		loadAddress();
		loadCoupon();
		$('.header-back').click(function() {
			 return location.href='<?php echo base_url();?>';
		});
	</script>
	<!-- prompt required -->
	<link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
</body>
</html>