<?php
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>洗衣单</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/header.js')?>"></script>
<!-- datepicker required -->
<link href="<?php echo base_url('res/css/datepicker.min.css');?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/datepicker.min.js');?>"></script>
<script src="<?php echo base_url('res/js/datepicker.zh-CN.js')?>"></script>
</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back"></div>
		<div class="f-header-m header-name">快速注册</div>
		<div class="header-r header-side-txt"></div>
	</div>
	<form id="registeform" method="post" action="<?php echo site_url('user/registe');?>">
	<div class="content xys-content header-fix">
		<div class="panel shadow log-panel-top">
			<div class="panel-content">
				<div class="controlers">
					<span class="label">用户名:</span>
					<input class="input-control control-with-label" type="text" placeholder="请输入邮箱地址/手机号" id="username" name="user_id">
				</div>
                <div class="controlers">
                    <span class="label">昵&nbsp;&nbsp;称:</span>
                    <input class="input-control control-with-label" type="text" placeholder="请输入昵称" id="realname" name="user_name">
                </div>
				<div class="controlers">
					<span class="label">密&nbsp;&nbsp;码:</span>
					<input class="input-control control-with-label" type="password" placeholder="请设置登录密码" id="passwd" name="user_password">
				</div>
				<div class="controlers">
					<span class="label">重复密码:</span>
					<input class="input-control control-with-label" type="password" placeholder="请再次输入登录密码" id="passconf">
				</div>
				<div class="controlers">
					<span class="label">验证码:</span>
					<input class="input-control control-with-label" type="text" placeholder="请输入验证码" id="vcode" name="sms_vocode">
					<img class="verify-code" src="" onclick="changecode()">
				</div>
			</div>	
		</div>
		<div class="btn btn-block submit" onclick="check()">注&nbsp;册</div>
	</div>
	</form>
</body>
</html>
<link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
<script type="text/javascript">
	/*
	检测信息填充是否完整
	*/
	function check(){
		if($("#username").val().length<=0 || $("#realname").val().length<=0 || 
           $("#passwd").val().length<=0){//验证用户名,昵称，密码
			$.Prompt("信息不完整", 1500); //时间单位为ms
			return;
		}
		if($("#passwd").val().length>0 && $("#passconf").val().length>0){//验证密码
			if($("#passwd").val() != $("#passconf").val()){
				$.Prompt("两次输入的密码不同", 1500); //时间单位为ms
				return;
			}
			else{
				//验证通过提交注册信息
				register();
			}
		}
		else{
			$.Prompt("密码信息不完整", 1500); //时间单位为ms
			return;
		}

	}
	/*
	通过AJAX提交用户注册用户信息
	*/
	function register(){
		$.ajax({
   			type: "POST",
   			url: "<?php echo site_url('user/registe');?>",
   			data:$("#registeform").serialize(),
   			success: function(msg){//注册信息提结果提示
   				if(msg=="success"){
   					$.Prompt("注册成功,即将跳转至登录页面", 1500); //时间单位为ms
   					//跳转至登录页面
                    location.href = siteurl + 'user/login';
	}
   				else{
   					$.Prompt("注册失败，用户名已存在，请重新注册", 1500); //时间单位为ms
   				}
     			
   			}
		});
	}
	/*
	通过ajax检测当前输入的用户名是否已经存在
	*/
	function isuserexist(){
		$.ajax({
   			url: "<?php echo site_url('user/isuserexist');?>"+"/"+$("#username").val(),
   			success: function(msg){//用户名检测结果
     			if(msg=="true"){
     				$("#isuserexist").html("用户名已存在");
     			}
     			else{
     				$("#isuserexist").html("");
     			}   			
     		}
		});
	}

</script>