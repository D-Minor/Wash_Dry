<?php 
	$this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>登录</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css')?>" rel="stylesheet" type="text/css">

</head>

<body>
	<div class="header wm-title">
		<div class="f-header-l header-back"></div>
		<div class="f-header-m header-name">登录</div>
		<div class="header-r header-side-txt" onclick><a style="color:#fff;" href='<?php echo site_url("user/registe");?>'>注册</a></div>
	</div>
	<div class="content xys-content header-fix">
	<form id='loginform'method="post" action="<?php echo site_url('user/login')?>">
		<div class="panel shadow log-panel-top">
			<div class="panel-content">
				<div class="controlers">
					<span class="label">用户名:</span>
					<input class="input-control control-with-label" type="text" placeholder="请输入登录用户名" name="user_id" id="username">
				</div>
				<div class="controlers">
					<span class="label">密&nbsp;&nbsp;码:</span>
					<input class="input-control control-with-label" type="password" placeholder="请输入登录密码" name="user_password" id="passwd">
				</div>
			</div>	
		</div>
		<div class="alertInfo">
			<?php
				if(isset($login_statu) && $login_statu==false){
					echo '用户名或者密码错误';
				}
			?>
		</div>
		<div type="submit" class="btn btn-block submit" onclick="login()">登&nbsp;录</div>
		<div class="content-footer">
			<a class="forget-pass" href="<?php echo site_url("");?>">忘记密码</a>
		</div>
	</form>
	</div>
	<script src="<?php echo base_url('res/js/common.js');?>"></script>
	<script src="<?php echo base_url('res/js/header.js')?>"></script>
	<!-- prompt required -->
	<link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
	<script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
	<script type="text/javascript">
		function login(){
			// 检查输入
			if($('#username').val().length != 0 && $('#passwd').val().length != 0){
				;
			}
			else{
				$.Prompt("用户名或密码不能为空", 1500); //时间单位为ms
				return;
			}

			//通过ajax提交登录信息
			$.ajax({
	   			type: "POST",
	   			url: "<?php echo site_url('user/login');?>",
	   			data:$("#loginform").serialize(),
	   			success: function(msg){//登录结果处理
	   				if(msg=="success"){//登录成功
	   					$.Prompt("登录成功,即将跳转至用户中心", 2000); //时间单位为ms 
	   					setTimeout(function() {
	   						window.location.href='<?php echo site_url("user/mine");?>';  
	   					}, 1500);
	   				}
	   				else{//登录失败
	   					$.Prompt("登录失败用户名或密码错误", 1500); //时间单位为ms
	   				}

	   			}
			});
		}
	</script>
</body>
</html>
