$(function() {
	$('.header .header-back').click(function() {
		history.go(-1);
	});
    $('.header-person').click(function() {
        location.href = siteurl + 'user/mine';
    });
});