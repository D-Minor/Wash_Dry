<?php
	$this->load->helper('url');
	echo session_id();
	var_dump($_SESSION);
	if(!isset($_SESSION["login_statu"])||!$_SESSION["login_statu"]){
		header("location:".site_url("/user/login")); //没有登录跳转到登陆页面
	}
	echo "<br> user:".$_SESSION["user_id"];
?>
<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
	<form action="<?php echo site_url("/user/login")?>" method="post">

	</form>
</body>
</html>

