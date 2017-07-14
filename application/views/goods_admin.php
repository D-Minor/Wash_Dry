<?php
	$this->load->helper("url");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>商品管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('res/js/header.js')?>"></script>
<!-- datepicker required -->
<link href="<?php echo base_url('res/css/datepicker.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/datepicker.min.js');?>"></script>
<script src="<?php echo base_url('res/js/datepicker.zh-CN.js')?>"></script>
</head>

<body>
	<div>
		<form id="add">
			<label>商品名称:</label>
			<input id="servicename" name="servicename"></input>
			<label>价格:</label>
			<input id="price" name="price"></input>
			<label>图片链接:</label>
			<input id="picurl" name="picurl" value="null"></input>
			<label>类型:</label>
			<select id="type" name="type">
  				<option value="normal">normal</option>
  				<option value="shoes">shoes</option>
  				<option value="house">house</option>
			</select>
			<input type="button" value="添加" onclick="add()"></input>
		</form>
	</div>
</body>
</html>
<link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
<script type="text/javascript">
	/*
	通过ajax提交添加商品请求
	*/
	function add(){
		$.ajax({
   			type: "POST",
   			url: "<?php echo site_url('goods/insertnewgoods');?>",
   			data:$("#add").serialize(),
   			success: function(msg){//
   				if(msg==true){
   					$.Prompt("商品添加成功", 1000); //时间单位为ms
   					return;
   				}
   				else{
   					$.Prompt("商品添加失败", 1000); //时间单位为ms
   					return;
   				}
     			
   			}
		});
		//$.Prompt("商品信息不完整", 1500); //时间单位为ms			
	}

</script>