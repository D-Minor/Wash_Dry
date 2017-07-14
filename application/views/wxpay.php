<?php
    $this->load->helper("url");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>微信支付</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<script src="<?php echo base_url('res/js/jquery-1.11.2.js');?>"></script>
<link href="<?php echo base_url('res/css/main.min.css');?>" rel="stylesheet" type="text/css">

<script src="<?php echo base_url('res/js/common.js');?>"></script>
<script src="<?php echo base_url('res/js/confirm.js');?>"></script>

</head>

<body>
    <div class="header wm-title">
        <div class="f-header-l header-back header-back-txt"></div>
        <div class="f-header-m header-name">完成支付</div>
        <div class="header-r"></div>
    </div>
    <div class="content xys-content header-fix">
        <div class="panel shadow">
            <!-- ---------------------- -->
            <div class="panel-title">
                <span class="txt">请支付</span>
            </div>
            <div class="panel-content" style="color:red; font-size:1.3em;">
                <?php echo $bill?> 元
            </div>
        </div>
        <div class="btn btn-block submit" onclick="callpay()">支 付</div>
    </div>
    <script type="text/javascript">
        //调用微信JS api 支付
    function jsApiCall()
    {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?php echo $jsApiParameters; ?>,
            function(res){
                //WeixinJSBridge.log(res.err_msg);
                //alert('<?php echo $jsApiParameters; ?>');
                //alert(res.err_code+'--'+res.err_desc+'--'+res.err_msg);
                if (res.err_msg == "get_brand_wcpay_request:ok") {
                    $.Prompt("付款成功", 1500); //时间单位为ms
                    $.ajax({
                        type:'POST',
                        url: "<?php echo site_url('order/paysuccess').'/'.$billid;?>",
                        success: function(msg){//用户名检测结果
                            if(msg="success"){
                                setTimeout(function() {
                                    location.href = baseurl;
                                }, 1500);
                            }      
                        }
                    });   
                }
                else {
                    $.Prompt("支付失败，请重新下单！", 1500);
                    $.ajax({
                        type:'POST',
                        url: "<?php echo site_url('order/cancel_bill').'/'.$billid;?>",
                        success: function(msg){
                            if(msg="success"){
                                setTimeout(function() {
                                    location.href = baseurl;
                                }, 1500);
                            }
                        }
                    }); 
                }
            }
        );
    }

    function callpay()
    {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }
    // //获取共享地址
    // function editAddress()
    // {
    //     WeixinJSBridge.invoke(
    //         'editAddress',
    //         <?php echo $editAddress; ?>,
    //         function(res){
    //             var value1 = res.proviceFirstStageName;
    //             var value2 = res.addressCitySecondStageName;
    //             var value3 = res.addressCountiesThirdStageName;
    //             var value4 = res.addressDetailInfo;
    //             var tel = res.telNumber;
                
    //             alert(value1 + value2 + value3 + value4 + ":" + tel);
    //         }
    //     );
    // }
    
    // window.onload = function(){
    //     if (typeof WeixinJSBridge == "undefined"){
    //         if( document.addEventListener ){
    //             document.addEventListener('WeixinJSBridgeReady', editAddress, false);
    //         }else if (document.attachEvent){
    //             document.attachEvent('WeixinJSBridgeReady', editAddress); 
    //             document.attachEvent('onWeixinJSBridgeReady', editAddress);
    //         }
    //     }else{
    //         editAddress();
    //     }
    // };
        // $('.buy-item #wxpay').on('click', function() {
        //  callpay();
        // });
    </script>
    <!-- prompt required -->
    <link href="<?php echo base_url('res/css/jquery.prompt.css')?>" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url('res/js/jquery.prompt.js')?>"></script>
</body>
</html>