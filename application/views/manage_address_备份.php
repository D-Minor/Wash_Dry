<?php 
	$this->load->helper('url');
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
<script src="<?php echo base_url('res/js/address.js');?>"></script>
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">编辑取送地址</div>
		<div class="header-r"></div>
	</div>
	<div class="content xys-content header-fix">
		<?php foreach ($address as $key => $value) {?>
		<div class="panel shadow">
			<input type="hidden" class="adid" value="<?php echo $value["adid"];?>"></input>
			<div class="address-info">
				<div class="custom">
					<span class="txt"><?php echo $value["conname"];?></span>
					<span class="txt"><?php echo $value["contact"];?></span>
				</div>
				<div class="address">
					<?php echo $value["address"];?>
				</div>
			</div>
			<div class="<?php 
				if($value["adflag"]==1){
					echo 'default-address';
				}
				else{
					echo 'default-address hidden';
				}?>
			">
				<img src="<?php echo base_url('res/images/icon_supportA.png');?>">
			</div>
		</div>
		<?php } ?>
		<div class="btn btn-block">+ 添加新地址</div>
	</div>
</body>
</html>