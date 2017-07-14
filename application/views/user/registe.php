<html>
	<?php $this->load->helper('url')?>
	<head>
	</head>
	<body>
		<div>
			<form action='<?php echo site_url('/user/registe')?>' method='post'> 
				<label>用户名:</label>
				<input id='user_id' name='user_id' type='txt'></input>
				<br>
				<label>密  码:</label>
				<input id='user_password' name='user_password' type='txt'></input>
				<br>
				<label>等 级:</label>
				<input id='level' name='level' type='txt'></input>
				<br>
				<input type='submit'></input>
			</form>
		</div>
	</body>
</html>