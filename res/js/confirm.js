$(document).ready(function() {
	Date.prototype.getMyDate = function() {
        var yyyy = this.getFullYear().toString();
        var mm = (this.getMonth()+1).toString(); 
        var dd  = this.getDate().toString();
        return yyyy +'-'+ (mm[1]?mm:"0"+mm[0]) +'-'+ (dd[1]?dd:"0"+dd[0]);
    };
	$('#get-date input').val(new Date().getMyDate());

	$('#payMethod .square-btn').click(function() {
		$('#payMethod .square-btn').removeClass('chosen');
		$(this).addClass('chosen');
	});

	function calTotal() {
		///计算订单总额
		var sum = 0;
		var priceItem = $('.buy-item .item-detail .price span');
		for (var i = 0; i < priceItem.length; i ++) {
			sum += parseFloat(priceItem[i].innerHTML);
		}
		sum += parseFloat($('#postfee span')[0].innerHTML);
		sum -= parseFloat($('#coupon span')[0].innerHTML);
		$('#totalFee span').text(sum);
		///计算总件数
		var cnt = 0;
		var countItem = $('.buy-item .item-detail .num span');
		for (var i = 0; i < countItem.length; i ++) {
			cnt += parseInt(countItem[i].innerHTML);
		}
		$('#totalNum span').text(cnt);
	}
	calTotal();

	$("#clear").click(function clearShoppingCar() {
		//通过ajax 清空购物车
		$.ajax({
   			url: siteurl + "shopingcar/clear_car",
   			success: function(msg){//清空结果处理
   				$.Prompt("衣篮空了哦~没有要洗的了嘛？", 1500); 
                setTimeout("location.href = baseurl", 1500);
   			}
		});
	});
});