$(document).ready(function() {
    var flag = false;   //false表示编辑管理地址，true表示选择地址

    var url = location.search; //获取url中"?"符后的字串
    var theRequest = new Object();
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        strs = str.split("&");
        for(var i = 0; i < strs.length; i ++) {
            theRequest[strs[i].split("=")[0]]=unescape(strs[i].split("=")[1]);
        }
        if (typeof theRequest["action"] != "undefined") {
            if (theRequest["action"]=="1") {
                flag = true;
                $('.header-name').text("选择取送地址");
                $('.header-back').click(function() {
                    location.href = siteurl + 'order/confirmorder2';
                });
                $('.btn-block').click(function() {
                     location.href=siteurl + 'address/modify_address?action=add&flag=1';
                });
            }
            else {
                flag = false;
                $('.header-name').text("编辑取送地址");
                $('.header-back').click(function() {
                    location.href=siteurl+'user/mine';
                });
                $('.btn-block').click(function() {
                     location.href = siteurl + 'address/modify_address?action=add&flag=0';
                });
            }
        }
        else {
            flag = false;
            $('.header-name').text("编辑取送地址");
            $('.header-back').click(function() {
                location.href=siteurl+'user/mine';
            });
            $('.btn-block').click(function() {
                location.href = siteurl + 'address/modify_address?action=add&flag=0';
            });
        }
    }
    else {
        flag = false;
        $('.header-name').text("编辑取送地址");
        $('.header-back').click(function() {
            location.href=siteurl+'user/mine';
        });
        $('.btn-block').click(function() {
            location.href = siteurl + 'address/modify_address?action=add&flag=0';
        });
    }

    //每项地址的单击事件        
    $('.panel').click(function() {
        var addressid = $(this).find('input').val();
        var name = $(this).find('.custom span:eq(0)').text();
        var telephone = $(this).find('.custom span:eq(1)').text();
        var address = $(this).find('.address').text();
        if (!flag)//地址管理=>编辑地址
            location.href = siteurl + 'address/modify_address?action=modify&flag=0&adid='+$(this).find(".adid").val();
        else {  //确认订单=>选择地址
            sessionStorage.setItem("addressid", addressid);
            sessionStorage.setItem("name", name);
            sessionStorage.setItem("telephone", telephone);
            sessionStorage.setItem("address", address);
            location.href = siteurl + 'order/confirmorder2';
        }

    });

});