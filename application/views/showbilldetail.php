<!DOCTYPE html> 
<html lang="zh-CN"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content=""> 
<meta name="author" content=""> 

<title>查询订单</title> 
<?php $this->load->helper('url'); ?>
<!--<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap-theme.min.css"> -->
<link rel="shortcut icon" href="<?php echo base_url("img/site.ico")?> "/>
    <link href="<?php echo base_url("/res/css/bootstrap.min.css");?>" rel="stylesheet">

<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]--> 
<!--[if lt IE 9]> 
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
           <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> 
       <![endif]--> 

<style> 
.bs-docs-home 
{ 
background-color: #dfdfdf; 
} 

.input-group
{
margin-top:3px;
margin-bottom:3px;
}
.tans-bg
{ 
background-color: rgba(255, 255, 255, 0.9);  
} 
</style> 
<script type="text/javascript">
function downloadxls(){
	//验证码校验

} 
</script>
</head> 

<body class="bs-docs-home">
 
		<div class="container">
		<h1 style=" line-height:2em;"> </h1>
		<div class="panel panel-primary tans-bg">
		<div class="panel-heading">
			<h2 class="panel-title"><strong>订单详细信息</strong></h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>  
							<th>订单号</th>
							<th>username</th>
							<th>用户地址</th>
							<th>联系方式</th>
							<th>支付方式</th>
							<th>是否支付</th>
							<th>是否接单</th>
							<th>是否完成</th>
							<th>下单时间</th>
							<th>接单时间</th>
							<th>完成时间</th>
							<th>couponid</th>
							<th>服务种类</th>
							<th>数量</th>
						</tr>        
					</thead> 
					<tbody>
						<?php foreach($bdlist as $key=>$value):?>
						<tr>
						    <td><?php echo $value['billid']?></td>
						    <td><?php echo $value['username']?></td>
						    <td><?php echo $value['address']?></td>
						    <td><?php echo $value['contact']?></td>
						    <?php if($value['payment']==0){echo "<td style='color:red;'>送衣付款</td>";}else{echo "<td style='color:green;'>微信支付</td>";}?>
						    <td><?php if($value['pflag']==1){echo "是";}else{echo "否";}?></td>
						    <td><?php if($value['rflag']==1){$rf=1;echo "是";}else if($value['rflag']==0){$rf=0;echo "否";}else{$rf=-1;echo "已取消";}?></td>
						    <td><?php if($value['cflag']==1){echo "是";}else{echo "否";}?></td>
						    <td><?php echo $value['billctime']?></td>
						    <td><?php echo $value['billrtime']?></td>
						    <td><?php echo $value['billetime']?></td>
						    <td><?php echo $value['couponid']?></td>
						    <td><?php echo $value['servicename']?></td>
						    <td><?php echo $value['sercount']?></td>
						</tr>        
						<?php endforeach;?>	
					</tbody>
				</table> 
			</div>	
		</div>	
		<div class="panel-footer">
            <div style="height:30px;text-align:right">
				<?php ?>	
			</div> 
			<div class="container">
				<button class="btn btn-primary " <?php if(isset($rf)&&$rf!=0){echo "disabled=\"disabled\"";}?> onclick="javascript:window.location.href='<?php echo site_url("masys/receivebill")."/".$bdid; ?>'">接收订单</button>
				<!--<button class="btn btn-success" onclick="javascript:window.location.href='<?php echo site_url(); ?>'">返回首页</button>
						<!--<button class="btn btn-primary btn-danger " type="reset">导出Excel</button>-->
			</div>					
		</div>
	</div> 
    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url("res/js/jquery-1.11.0.js");?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url("res/js/bootstrap.min.js");?>"></script>
</body> 
</html>
