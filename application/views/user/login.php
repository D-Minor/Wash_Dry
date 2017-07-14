<?php $this->load->helper('url')?>
<html>
	<head>
		<meta charset="utf-8"></meta>
		<base href="<?php  echo base_url();?>"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div >
			<?php echo "session_id:".session_id();?>
			<form action="<?php echo site_url("/user/login")?>" method="post" data-ajax="false">
				<!--<label for="user_id">用户名</label> -->
				<input type="text" id="user_id" name="user_id" placeholder="用户名"></input>
				<!-- <label for="user_password">密 码</label> -->
				<input type="text" id="user_password" name="user_password" placeholder="密码"></input>
				<input type="submit" value="登陆" ></input>
			</form>
			<a href="<?php echo site_url('/user/registe')?>">注册</a>
			<a href="<?php echo site_url('/user/registe')?>">忘记密码</a>
			<?php
			if(isset($login_statu) && $login_statu==false){
				echo '用户名或者密码错误';
			}
			?>
		</div><!-- /content -->
	</body>
</html>
