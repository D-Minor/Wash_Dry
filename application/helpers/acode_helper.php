<?php
	/**
	---获得一个$length长度的随机数------
	*/
	function getRandStr($length) 
	{   $str = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randString = ''; 
		$len = strlen($str)-1;
		for($i = 0;$i < $length;$i ++)
		{ $num = mt_rand(0, $len); 
			$randString .= $str[$num];
		} 
		return $randString ;  
	}

	/**
	通过短信接口发送验证码信息
	输入{验证码，手机号码}
	输出{0成功，-1失败}
	*/
	function send_changepwd_acode_sms($acode,$phone_num){

	}
?>