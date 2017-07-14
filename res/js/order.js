$(document).ready(function() {
	var startID = 0;
	var url = location.href;
	var str = url.split("#");
	if (str.length == 1) {}
	else {
		if (str[1] == 'notpayed') {
			showTab(0);
			startID = 0;
		}
		else if (str[1] == 'doing') {
			showTab(1);
			startID = 1;
		}
		else if (str[1] == 'finished') {
			showTab(2);
			startID = 2;
		}
		else {};
	}
	function showTab(i) {
		$('.wq-tabs .tab span').removeClass("current");
		$('.wq-tabs .tab span:eq('+i+')').addClass("current");
		$('.wm-detail .detail-list').addClass("hidden");
		$('.wm-detail .detail-list:eq('+i+')').removeClass("hidden");
	}

	$('.wq-tabs .tab-l').click(function() {
		changeList(0-startID);
	});
	$('.wq-tabs .tab-m').click(function() {
		changeList(1-startID);
	});
	$('.wq-tabs .tab-r').click(function() {
		changeList(2-startID);
	});
	var changeList = function(dir) {
		nowID = startID + dir;
		if (nowID < 0)
			nowID = 2;
		if (nowID > 2)
			nowID = 0;
		$('.wq-tabs .tab span').removeClass("current");
		$('.wq-tabs .tab span:eq('+(nowID)+')').addClass("current");

		$('.wm-detail .detail-list:eq('+startID+')').animate({opacity:0}, function() {
			$('.wm-detail .detail-list:eq('+startID+')').addClass("hidden");
			$('.wm-detail .detail-list:eq('+nowID+')').removeClass("hidden");
			$('.wm-detail .detail-list:eq('+nowID+')').animate({opacity:1});
			startID = nowID;
		});
	};
	
});
