<?php 
    $this->load->helper('url');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>洗衣单</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('/res/js/order.js');?>"></script>

</head>

<body>
    <div class="header wm-title">
        <div class="f-header-l header-back header-back-txt"></div>
        <div class="f-header-m header-name">我的订单</div>
        <div class="header-r"></div>
    </div>
    <div class="content wqmm-content header-fix">
        <div class="wq-tabs">
            <div class="f3 tab tab-l" id="notpayed">
                <span class="current">取衣中</span>
            </div>
            <div class="f3 tab tab-m" id="doing">
                <span>正在进行</span>
            </div>
            <div class="f3 tab tab-r" id="finished">
                <span>已完成</span>
            </div>
        </div>
        <div class="wm-detail">
            <div class="detail-list shadow" id="detail-0">
            <?php
                foreach ($userbdlist as &$value) {
            ?>
            <?php
                    if($value['rflag']=='0'){
            ?>
                <div class="panel shadow">
                    <div class="panel-title">
                        <span class="txt order-time"><?php echo $value['billctime'];?></span>
                        <?php 
                        if($value['payment']=='0') echo "<span class='txt order-status'>送衣付款</span>"; 
                        else if($value['pflag']=='1')echo "<span class='txt order-status order-sucess'>支付成功</span>";
                        else echo "<span class='txt order-status'>未支付</span>"
                        ?>
                    </div>
                    <div class="panel-content" onclick="">
                        <?php
                            $totalprice=0;
                            $sercount=0;
                            foreach ($value['billdetail'] as &$svalue) {
                                $sercount=$sercount+1;
                        ?>
                        <div class="buy-item">
                            <div class="item-detail">
                                <span class="name"><?php echo $svalue['servicename'];?></span>
                                <span class="num"><?php echo $svalue['sercount'];?>件</span>
                                <span class="price">￥
                                    <?php 
                                    $totalprice=$totalprice+$svalue['sercount']*$svalue['price'];
                                    echo $svalue['sercount']*$svalue['price'];
                                    ?>
                                </span>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="panel-footer">
                        <div class="totalInfo">
                            共<span class="totalnum"><?php echo $sercount;?></span>件商品，实付<span class="totalPrice">￥<?php echo $totalprice;?></span>
                        </div>
                        <button class="btn btn-xs <?php if($value['pflag']=='1') echo 'hidden';?>" onclick="cancelOrder('<?php echo $value['billid']; ?>');">取消订单</button>
                        <?php 
                            //if($value['payment']=='1' && $value['pflag']=='0')
                                //echo '<button class="btn btn-xs " onclick="location.href=\''.site_url("order/continue_wxpay")."/".$value["billid"].'?showwxpaytitle=1\';">完成支付</button>';
                        ?>
                    </div>              
                </div>
                <?php
                    }
                ?>
                <?php
                    }
                ?>
            </div>
            <div class="detail-list shadow hidden" id="detail-1">
            <?php
                foreach ($userbdlist as &$value) {
            ?>
            <?php
                    if(($value['rflag']=='1')&&($value['cflag']=='0')){
            ?>
                <div class="panel shadow">
                    <div class="panel-title">
                        <span class="txt order-time"><?php echo $value['billctime'];?></span>
                        <span class="txt order-status">正在洗衣</span>
                    </div>
                    <div class="panel-content" onclick="">
                        <?php
                            $totalprice=0;
                            $sercount=0;
                            foreach ($value['billdetail'] as &$svalue) {
                                $sercount=$sercount+1;
                        ?>
                        <div class="buy-item">
                            <div class="item-detail">
                                <span class="name"><?php echo $svalue['servicename'];?></span>
                                <span class="num"><?php echo $svalue['sercount'];?>件</span>
                                <span class="price">￥
                                    <?php 
                                    $totalprice=$totalprice+$svalue['sercount']*$svalue['price'];
                                    echo $svalue['sercount']*$svalue['price'];
                                    ?>
                                </span>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="panel-footer">
                        <div class="totalInfo">
                            共<span class="totalnum"><?php echo $sercount;?></span>件商品，实付<span class="totalPrice">￥<?php echo $totalprice;?></span>
                        </div>
                        <button class="btn btn-xs" onclick="confirmOrder('<?php echo $value['billid']; ?>');">确认订单</button>
                    </div>              
                </div>
                <?php
                    }
                ?>
                <?php
                    }
                ?>
            </div>
            <div class="detail-list shadow hidden" id="detail-2">
            <?php
                foreach ($userbdlist as &$value) {
            ?>
            <?php
                    if(($value['rflag']=='1')&&($value['cflag']=='1')){
            ?>
                <div class="panel shadow">  
                    <div class="panel-title">
                        <span class="txt order-time"><?php echo $value['billctime'];?></span>
                        <span class="txt order-status order-sucess">洗衣完成</span>
                    </div>
                    <div class="panel-content" onclick="">
                        <?php
                            $totalprice=0;
                            $sercount=0;
                            foreach ($value['billdetail'] as &$svalue) {
                                $sercount=$sercount+1;
                        ?>
                        <div class="buy-item">
                            <div class="item-detail">
                                <span class="name"><?php echo $svalue['servicename'];?></span>
                                <span class="num"><?php echo $svalue['sercount'];?>件</span>
                                <span class="price">￥
                                    <?php 
                                    $totalprice=$totalprice+$svalue['sercount']*$svalue['price'];
                                    echo $svalue['sercount']*$svalue['price'];
                                    ?>
                                </span>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="panel-footer">
                        <div class="totalInfo">
                            共<span class="totalnum"><?php echo $sercount;?></span>件商品，实付<span class="totalPrice">￥<?php echo $totalprice;?></span>
                        </div>
                    </div>              
                </div>
                <?php
                    }
                ?>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="end"></div>
    </div>
    <script src="<?php echo base_url('res/js/header.js');?>"></script>
    <!-- prompt required -->
    <link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
    <script type="text/javascript">
        function confirmOrder(billid) {
            $.ajax({
            type:'POST',
            url: "<?php echo site_url('order/complete_bill');?>/"+billid,
            success: function(msg){
                    $.Prompt("确认收货成功！", 1500); //时间单位为ms
                    setTimeout(function() {
                        location.href = "<?php echo site_url('order/myorder');?>";
                    }, 1500);
                }           
            });
        }
        function cancelOrder(billid) {
            $.ajax({
            type:'POST',
            url: "<?php echo site_url('order/cancel_bill');?>/"+billid,
            success: function(msg){
                    $.Prompt("取消订单成功！", 1500); //时间单位为ms
                    setTimeout(function() {
                        location.href = "<?php echo site_url('order/myorder');?>";
                    }, 1500);
                }           
            });
        }
    </script>
</body>
</html>
