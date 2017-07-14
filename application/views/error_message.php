<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>404 - Page Not Found</title>
<?php $this->load->helper('url'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/404.css") ?>">
<!--<script type="text/javascript" src="../lib/jquery.js"></script>-->
</head>
<body class="bodytype">
  
  <!-- zh -->
    <div id="main" class="zh" >
    <header id="header">
      <h1><span class="icon">!</span>404<span class="sub">页面未找到</span></h1>
    </header>
    <div id="content">
      <h2><br><?php if(isset($pageinfo)){echo $pageinfo;}else {echo "您所请求的页面无法找到";} ?></h2>
      <p>服务器无法正常提供信息。<br>
      目标页面可能已经被更改、删除或移到其他位置，或您所输入页面地址错误。</p>
      <div class="utilities">
        <a class="button right" href="<?php echo base_url() ?>" onClick="history.go(-1);return true;">返回首页</a><a class="button right" href="#">意见反馈</a>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>
</html>