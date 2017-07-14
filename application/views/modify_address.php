<?php
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>洗衣单</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<!---<script src="<?php echo base_url('res/js/address.js');?>"></script>-->
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">编辑取送地址</div>
		<div class="header-r"></div>
	</div>
	<div class="content xys-content header-fix">
		<div class="panel shadow">
			<input class="hidden" id="adid" value="<?php if($action=="modify") echo $address["adid"]?>"></input>
			<div class="controlers">
				<input value="<?php if($action=="modify") echo $address["conname"]?>" class="input-control" type="text" placeholder="请输入姓名" id="conname" name="conname">
			</div>
			<div class="controlers">
				<input value="<?php if($action=="modify") echo $address["contact"]?>" class="input-control" type="text" placeholder="请输入手机号" id="contact" name="contact">
			</div>
			<div class="controlers">
				<div class="select-group">
					<select class="school">
						<option selected>----请选择学校----</option>
						<option value ="南京中医药大学">南京中医药大学</option>
						<option value ="南京邮电大学">南京邮电大学</option>
						<option value ="南理工紫金学院">南理工紫金学院</option>
						<option value ="南京师范大学">南京师范大学</option>
						<option value ="南京财经大学">南京财经大学</option>
						<option value ="南京信息职业技术学院">南京信息职业技术学院</option>
					</select>
				</div>
			</div>
			<div class="controlers">
				<div class="select-group">
					<select class="dormitory">
						<option selected>----请选择宿舍区----</option>
					</select>
					<select class="dormitory">
						<option selected>----请选择宿舍区----</option>
					  	<option value ="一管">一管</option>
					  	<option value ="二管">二管</option>
					  	<option value ="三管">三管</option>
					  	<option value ="四管">四管</option>
					  	<option value ="五管">五管</option>
					  	<option value ="六管">六管</option>
					  	<option value ="七管">七管</option>
					  	<option value ="八管">八管</option>
					  	<option value ="教学B区">教学B区</option>
					  	<option value ="E区">E区</option>
					  	<option value="其他地区">其他地区</option>
					</select>
					<select class="dormitory">
						<option selected>----请选择宿舍区----</option>
					  	<option value ="梅苑">梅苑</option>
					  	<option value ="荷苑">荷苑</option>
					  	<option value ="桂苑">桂苑</option>
					  	<option value ="柳苑">柳苑</option>
					  	<option value ="李苑">李苑</option>
					  	<option value ="桃苑">桃苑</option>
					  	<option value ="菊苑">菊苑</option>
					  	<option value ="竹苑">竹苑</option>
					  	<option value ="兰苑">兰苑</option>
					  	<option value ="青年教师公寓">青年教师公寓</option>
					</select>
					<select class="dormitory">
						<option selected>----请选择宿舍区----</option>
					  	<option value ="A1-A7">A1-A7</option>
					  	<option value ="B1-B7">B1-B7</option>
					  	<option value ="C1-C9">C1-C9</option>
					  	<option value ="D1-D8">D1-D8</option>
					</select>
					<select class="dormitory">
						<option selected>----请选择宿舍区----</option>
					  	<option value ="南师大西区">南师大西区</option>
					  	<option value ="南师大东区">南师大东区</option>
					  	<option value ="南师大北区">南师大北区</option>
					  	<option value ="南师大中北学院新北区">南师大中北学院新北区</option>
					</select>
					<select class="dormitory">
						<option selected>----请选择宿舍区----</option>
					  	<option value ="东苑">东苑</option>
					  	<option value ="西苑一">西苑一</option>
					  	<option value ="西苑二">西苑二</option>
					  	<option value ="西苑三">西苑三</option>
					  	<option value ="西苑四">西苑四</option>
					  	<option value ="西苑五">西苑五</option>
					  	<option value ="中苑六">中苑六</option>
					  	<option value ="中苑七">中苑七</option>
					  	<option value ="中苑八">中苑八</option>
					  	<option value ="中苑九">中苑九</option>
					  	<option value ="中苑十">中苑十</option>
					  	<option value ="中苑十一">中苑十一</option>
					  	<option value ="北苑十二">北苑十二</option>
					  	<option value ="北苑十三">北苑十三</option>
					  	<option value ="北苑十四">北苑十四</option>
					  	<option value ="北苑十五">北苑十五</option>
					</select>
					<select class="dormitory">
						<option selected>----请选择宿舍区----</option>
					  	<option value ="宿舍楼1">宿舍楼1</option>
					  	<option value ="宿舍楼2">宿舍楼2</option>
					  	<option value ="宿舍楼3">宿舍楼3</option>
					  	<option value ="宿舍楼4">宿舍楼4</option>
					  	<option value ="宿舍楼5">宿舍楼5</option>
					  	<option value ="宿舍楼6">宿舍楼6</option>
					  	<option value ="宿舍楼7">宿舍楼7</option>
					  	<option value ="宿舍楼8">宿舍楼8</option>
					  	<option value ="宿舍楼9">宿舍楼9</option>
					  	<option value ="宿舍楼10">宿舍楼10</option>
					  	<option value ="宿舍楼11">宿舍楼11</option>
					  	<option value ="宿舍楼12">宿舍楼12</option>
					  	<option value ="宿舍楼13">宿舍楼13</option>
					  	<option value ="宿舍楼14">宿舍楼14</option>
					  	<option value ="宿舍楼15">宿舍楼15</option>
					  	<option value ="宿舍楼16">宿舍楼16</option>
					  	<option value ="宿舍楼17">宿舍楼17</option>
					  	<option value ="宿舍楼18">宿舍楼18</option>
					  	<option value ="宿舍楼19">宿舍楼19</option>
					  	<option value ="宿舍楼20">宿舍楼20</option>
					</select>
				</div>
			</div>
			<div class="controlers">
				<input value=""class="input-control" type="text" placeholder="输入详细地址" id="address" name="address">
			</div>
		</div>
		<div class="btn btn-block <?php if($action=="add") echo "hidden"?>" id="setdefault" onclick="set_default_address()">设置为默认地址</div>
		<div class="btn btn-block" id="save" onclick="save_address()">保 存</div>
		<div class="btn btn-block <?php if($action=="add") echo "hidden"?>" id="delete" onclick="delete_address()">删除该地址</div>
	</div>
	<!-- prompt required -->
	<link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
	<script src="<?php echo base_url('res/js/header.js');?>"></script>
	<script type="text/javascript">
		var address = '<?php if($action=="modify") echo $address["address"]?>';
		if (address!="") {
			var addr = address.split(" ");
			$('.school').val(addr[0]);
			$('.dormitory').val(addr[1]);
			$('#address').val(addr[2]);
		}
		function save_address(){
			var postdata = new Object();
			//准备订单相关数据，通过post下单
			var id = $('.school option').index($('.school option:selected'));
			postdata.address = $('.school option:selected').val()+" "+$('.dormitory:eq('+id+') option:selected').val()+" "+$('#address').val();
			postdata.contact = $('#contact').val();
			postdata.conname = $('#conname').val();
			//验证信息
			if($('#conname').val().length<=0){
				$.Prompt("姓名信息缺失", 2000); //时间单位为ms
				return;
			}
			if($('#contact').val().length!=11){
				$.Prompt("手机号码格式错误", 2000); //时间单位为ms
				return;
			}
			if($('.school option').index($('.school option:selected'))==0||
				$('.dormitory:eq('+id+') option').index($('.dormitory:eq('+id+') option:selected'))==0||
				$('#address').val().length<=0){
				$.Prompt("地址信息缺失", 2000); //时间单位为ms
				return;
			}
			//提交信息创建新的地址
			$.ajax({
				type:'POST',
				data:postdata,
	   			url: "<?php echo site_url('address/insert_address');?>",
	   			success: function(msg){//用户名检测结果
	   				if(msg="success"){
	   					$.Prompt("地址添加成功", 1500); //时间单位为ms
	   					if ('<?php echo $flag;?>' == '0')
	   						setTimeout("location.href = siteurl + 'address/manage_address'", 1500);
	   					else if ('<?php echo $flag;?>' == '1')
	   						setTimeout("location.href = siteurl + 'address/manage_address?action=1'", 1500);
	   				}
	   				else{
	   					$.Prompt("地址添加失败", 1500); //时间单位为ms
	   				}			
	     		}
			});
		      	}
		function delete_address(){
			var postdata = new Object();
			//准备订单相关数据，通过post下单
			postdata.adid = $('#adid').val();
			$.ajax({
				type:'POST',
				data:postdata,
	   			url: "<?php echo site_url('address/delete_address');?>",
	   			success: function(msg){//用户名检测结果
	   				if(msg="success"){
	   					$.Prompt("删除地址成功", 1500); //时间单位为ms
	   					setTimeout("location.href = siteurl + 'address/manage_address'", 1500);
	   				}	
	   				else{
	   					$.Prompt("删除地址失败", 1500); //时间单位为ms
	   				}			
	     		}
			});
		      	}
		function set_default_address(){
			var postdata = new Object();
			//准备订单相关数据，通过post下单
			postdata.adid = $('#adid').val();
			$.ajax({
				type:'POST',
				data:postdata,
	   			url: "<?php echo site_url('address/default_address');?>",
	   			success: function(msg){//用户名检测结果
	   				if(msg="success"){
	   					$.Prompt("默认地址设置成功", 1500); //时间单位为ms
	   					setTimeout("location.href = siteurl + 'address/manage_address'", 1500);
	   				}	
	   				else{
	   					$.Prompt("默认地址设置失败", 1500); //时间单位为ms
		      		}
		   		}
			});
		}
		$(".school").on('change', function(){
			var id = $('.school option').index($('.school option:selected'));
			$(".dormitory").hide();
            $(".dormitory").eq(id).show();
        });
        $(".school").change();
	</script>
</body>
</html>