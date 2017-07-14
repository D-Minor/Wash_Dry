$(document).ready(function () {
	$('.footer .index-btn').click(function() {
		$('.footer .chosen').removeAttr('style');
		$('.footer .chosen').removeClass('chosen');
		$(this).addClass('chosen');
		$(this).css('background-image',"url('"+baseurl+"res/images/m-icon-home-w.png')");
		window.location.href = baseurl;
	});
	$('.footer .find-btn').click(function() {
		$('.footer .chosen').removeAttr('style');
		$('.footer .chosen').removeClass('chosen');
		$(this).addClass('chosen');
		$(this).css('background-image',"url('"+baseurl+"res/images/m-icon-find-w.png')");
		window.location.href = siteurl + 'index/more';
	});
	$('.footer .shopping-btn').click(function() {
		$('.footer .chosen').removeAttr('style');
		$('.footer .chosen').removeClass('chosen');
		$(this).addClass('chosen');
		$(this).css('background-image',"url('"+baseurl+"res/images/m-icon-shopping-w.png')");
		window.location.href = siteurl + 'order/confirmorder';
	});
	$('.footer .user-btn').click(function() {
		$('.footer .chosen').removeAttr('style');
		$('.footer .chosen').removeClass('chosen');
		$(this).addClass('chosen');
		$(this).css('background-image',"url('"+baseurl+"res/images/m-icon-user-w.png')");
		window.location.href = siteurl + 'user/mine';
	});
});
