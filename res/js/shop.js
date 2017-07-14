$(document).ready(function() {
	$(".point-item").click(function() {
		$('.point-item.selected').removeClass('selected');
		$(this).addClass('selected');
		var id = $('.point-item').index(this);
		$('.pic-item:eq('+start+')').animate({opacity:0}, function() {
			$('.pic-item:eq('+start+')').addClass('hidden');
			$('.pic-item:eq('+id+')').removeClass('hidden');
			$('.pic-item:eq('+id+')').animate({opacity:1});
			start = id;
		});
	});
	var start = 0;
	var changeImg = function (dir) {
		var now = start + dir;
		if (now < 0)
			now = $('.pic-item').length-1;
		if (now >= $('.pic-item').length)
			now = 0;
		$('.point-item.selected').removeClass('selected');
		$('.point-item:eq('+now+')').addClass('selected');
		$('.pic-item:eq('+start+')').animate({opacity:0}, function() {
			$('.pic-item:eq('+start+')').addClass('hidden');
			$('.pic-item:eq('+now+')').removeClass('hidden');
			$('.pic-item:eq('+now+')').animate({opacity:1});
			start = now;
		});
	}
	$('.pic-list').on('swipeleft', function() {
		changeImg(-1);
	});
	$('.pic-list').on('swiperight', function() {
		changeImg(1);
	});
});
