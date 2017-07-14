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
			<h2 class="panel-title"><strong>订单信息</strong></h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>  
							<th>订单号</th>
							<th>地址</th>
							<th>下单时间</th>
							<th>操作</th>
						</tr>        
					</thead> 
					<tbody>
						<?php foreach($billlist as $key=>$value):?>
						<tr
						<?php if(($value['rflag']=='0')&&($value['cflag']=='0')){echo "class=\"danger\"";}else if(($value['rflag']=='1')&&($value['cflag']=='0')){echo "class=\"info\"";}else if(($value['rflag']=='1')&&($value['cflag']=='1')){echo "class=\"success\"";}
						?>
						>
						    <td><?php echo $value['billid']?></td>
						    <td><?php echo $value['address']?></td>
						    <td><?php echo $value['billctime']?></td>
						    <td><button class="btn btn-primary " onclick="javascript:window.location.href='<?php echo site_url("masys/showbilldetail")."/".$value['billid']; ?>'">查看详细</button></td>
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
				<!--<button class="btn btn-primary " onclick="javascript:window.location.href='<?php echo site_url("tongji/download")."/"."123"; ?>'">导出Excel</button>
				<button class="btn btn-success" onclick="javascript:window.location.href='<?php echo site_url(); ?>'">返回首页</button>
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
