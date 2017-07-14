$(document).ready(function() {
	var startID = 0;
	//$('.footer .index-btn').css('background-image',"url('"+baseurl+"res/images/m-icon-home-w.png')");
	var url = location.href;
	var str = url.split("/");
	if (str.length < 7) {}
	else {
		var tag = str[6];
		if (tag == 'normal') {
			showTab(1);
			startID = 1;
		}
		else if (tag == 'shoes') {
			showTab(2);
			startID = 2;
		}
		else if (tag == 'textile') {
			showTab(3);
			startID = 3;
		}
		else if (tag == 'protect') {
			showTab(0);
			startID = 0;
		}
		else {};
	}
	function showTab(i) {
		$('.wq-tabs .tab span').removeClass("current");
		$('.wq-tabs .tab span:eq('+(i*2)+')').addClass("current");
		$('.wm-detail .detail-list').addClass("hidden");
		$('.wm-detail .detail-list:eq('+i+')').removeClass("hidden");
	}

	$('.wq-tabs .tab').click(function() {
		var id = $(this).index();
		changeList(id-startID);
	});
	var changeList = function(dir) {
		nowID = startID + dir;
		if (nowID < 0)
			nowID = $('.wq-tabs .tab').size()-1;
		if (nowID >= $('.wq-tabs .tab').size())
			nowID = 0;
		$('.wq-tabs .tab span').removeClass("current");
		$('.wq-tabs .tab span:eq('+(nowID*2)+')').addClass("current");

		$('.wm-detail .detail-list:eq('+startID+')').animate({opacity:0}, function() {
			$('.wm-detail .detail-list:eq('+startID+')').addClass("hidden");
			$('.wm-detail .detail-list:eq('+nowID+')').removeClass("hidden");
			$('.wm-detail .detail-list:eq('+nowID+')').animate({opacity:1});
			startID = nowID;
		});
	};
	/*$('.detail-list').on('swipeleft', function() {
		changeList(-1);
	});
	$('.detail-list').on('swiperight', function() {
		changeList(1);
	});*/
	/*touch.on('.wm-detail', 'touchstart', function(ev){
		ev.preventDefault();
	});
	touch.on('.wm-detail', 'swipeleft', function(ev) {
		changeList(1);
	});
	touch.on('.wm-detail', 'swiperight', function(ev) {
		changeList(-1);
	});*/

	var changeNum = function(obj, delta) {
		var node = $(obj);
		var pre = parseInt(node.find(".num").text());
		var now = pre + delta;
		if (now <= 0) {
			node.find(".num").text("0");
			node.find(".minus").addClass("hidden");
			node.find(".num").addClass("hidden");
		}
		else {
			node.find(".num").text(now);
			node.find(".minus").removeClass("hidden");
			node.find(".num").removeClass("hidden");
		}
	};

	var changeTotal = function() {
		var node = $('.tab .num');
		var num = 0;
		for (var i = 0; i < node.size(); i++) {
			num += parseInt(node.get(i).innerHTML);
		}
		if (num <= 0) {
			$('#shopcarNum').css({"z-index":"-1"});
			$('#shopcarNum').text(num);
		}
		else {
			$('#shopcarNum').css({"z-index":"1"});
			$('#shopcarNum').text(num);
		}
	}

	var addAnimate = function(event) {
		var offset = $('#shopcarNum').offset();
		var flyer = $("<div id='flyerNum'>1</div>");
		flyer.fly({
			start: {
				left: event.pageX,
				top: event.pageY
			},
			end: {
				left: offset.left,
				top: offset.top
			},
			onEnd: function() {
				changeTotal();
				this.destory();
			}
		});
	}

	$(".buy-info").on("click",'.minus', function() {
		deleteItem(this);
	});
	$(".buy-info").on("click",'.plus', function() {
		addItem(this);
	});
	function ValidateNumber(e, pnumber)
	{
	    // if (!/^\d+$/.test(pnumber))
	    // {
	    //     e.value = /^\d+/.exec(e.value);
	    // }
	    e.val(e.val().replace(/\D+/g,''));
	    return false;
	}
	// $(".buy-info .num").on('keyup', function() {
	// 	return ValidateNumber($(this), $(this).val());
	// });
	// $(".buy-info .num").on('blur', function() {
	// 	if ($(this).val() == "") {
	// 		$(this).val('0');
	// 		$(this).prev().addClass("hidden");
	// 		$(this).addClass("hidden");
	// 	}
	// 	$('.buy-info .num').change();
	// 	changeTotal();
	// });
	function addItem(obj) {
		changeNum(obj.parentNode, 1);
		$(obj.parentNode).find('.num').change();
		$('#flyerNum').removeClass('hidden');
		addAnimate(event);

		//添加至购物车
		addtopshoppingcar($(obj).siblings().first().text());
	}
	function deleteItem(obj) {
		changeNum(obj.parentNode, -1);
		$(obj.parentNode).find('.num').change();
		changeTotal();

		//从购物车中删除
		removefromshoppingcar($(obj).siblings().first().text());
	}
	$('.buy-info .num').change(function() {
		var parent = $(this).parents(".detail-list");
		var type = parent.index();
		var node = parent.find('.buy-info .num');
		var num = 0;
		for (var i = 0; i < node.size(); i++) {
			num += parseInt(node.get(i).innerHTML);
		}
		if (num <= 0) {
			$('.wq-tabs .tab:eq('+type+') .num').addClass('hidden');
			$('.wq-tabs .tab:eq('+type+') .num').text(num);
		}
		else {
			$('.wq-tabs .tab:eq('+type+') .num').removeClass('hidden');
			$('.wq-tabs .tab:eq('+type+') .num').text(num);
		}
	});
	//向购物车添加商品
	function addtopshoppingcar(serviceid){
		$.ajax({
	   		url: siteurl + 'shopingcar/add' +"/"+serviceid,
	   		//crossDomain: true,
	   		success: function(msg){//用户名检测结果
	     		/*if(msg=="true"){
	     			$("#isuserexist").html("用户名已存在");
	     		}
	     		else{
	     			$("#isuserexist").html("");
	     		}*/   			
	     	}
		});
	}
	//从购物车中删除商品
	function removefromshoppingcar(serviceid){
		$.ajax({
	   		url: siteurl + 'shopingcar/remove' +"/"+serviceid,
	   		//crossDomain: true,
	   		success: function(msg){//用户名检测结果
	   			/*if(msg=="true"){
	 				$("#isuserexist").html("用户名已存在");
	     		}
	     		else{
	     			$("#isuserexist").html("");
	     		} */  			
	     	}
		});
	}
	$('.buy-info .num').change();
	changeTotal();
});
