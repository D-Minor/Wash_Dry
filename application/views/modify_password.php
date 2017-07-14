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

<!-- datepicker required -->
<link href="<?php echo base_url('res/css/datepicker.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/datepicker.min.js');?>"></script>
<script src="<?php echo base_url('res/js/datepicker.zh-CN.js')?>"></script>
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back header-back-txt"></div>
		<div class="f-header-m header-name">修改登录密码</div>
		<div class="header-r"></div>
	</div>
	<form id="changepwd" method="post" action="<?php echo site_url('user/changepwd');?>" 
	<div class="content xys-content header-fix">
		<div class="panel shadow">
			<div class="panel-title">
				<span class="txt">旧登录密码</span>
			</div>
			<div class="panel-content">
				<div class="controlers">
					<input style="display:none" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id'];?>"></input>
					<input class="input-control" type="password" placeholder="请输入旧密码" id="oldpass" name="current_pwd">
				</div>
			</div>	
		</div>
		<div class="panel shadow">
			<div class="panel-title">
				<span class="txt">新登录密码</span>
			</div>
			<div class="panel-content">
				<div class="controlers">
					<input class="input-control" type="password" placeholder="请输入新密码" id="newpass" name="new_pwd">
				</div>
				<div class="controlers">
					<input class="input-control" type="password" placeholder="请再次输入新密码" id="newpassconf">
				</div>
			</div>	
		</div>
		<div class="btn btn-block submit" onclick="confirm()">确认修改</div>
	</div>
	</form>
	
<script src="<?php echo base_url('res/js/header.js')?>"></script>
<link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
<script type="text/javascript">
	function confirm(){
		/*
		验证输入条件是否满足
		*/
		if($("#oldpass").val().length<=0){
			$.Prompt("请输入旧密码", 1500); //时间单位为ms
			return;
	}
		else{
			if($("#newpass").val().length<=0){
				$.Prompt("请输入新密码", 1500); //时间单位为ms
				return;
			}
			else{
				if($("#newpass").val() != $("#newpassconf").val()){
					$.Prompt("两次输入的新密码不匹配", 1500); //时间单位为ms
					return;
				}
			}
		}
		/*
		ajax 提交修改密码信息
		*/
		$.ajax({
   			type: "POST",
   			url: "<?php echo site_url('user/changepwd');?>",
   			data:$("#changepwd").serialize(),
   			success: function(msg){//修改密码信息提结果提示
   				if(msg=="success"){//密码修改成功
   					$.Prompt("密码修改成功", 1500); //时间单位为ms
   				}
   				else{//密码修改失败
   					$.Prompt("旧密码错误", 1500); //时间单位为ms
   				}
     			
   			}
		});	}
</script>
</body>
</html>
