<html>
	<?php $this->load->helper('url')?>
	<head>
	</head>
	<body>
		<div>
			<form action='<?php echo site_url('/user/registe')?>' method='post'> 
				<label>�û���:</label>
				<input id='user_id' name='user_id' type='txt'></input>
				<br>
				<label>��  ��:</label>
				<input id='user_password' name='user_password' type='txt'></input>
				<br>
				<label>�� ��:</label>
				<input id='level' name='level' type='txt'></input>
				<br>
				<input type='submit'></input>
			</form>
		</div>
	</body>
</html>