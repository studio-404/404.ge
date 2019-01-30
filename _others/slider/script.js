$(document).ready(function(){
	var bigw = parseInt($(".slider-center img").width());
	var bigh = parseInt($(".slider-center img").height());
	var smallw = parseInt($(".slider-left .col-md-4 img").width());
	var smallh = parseInt($(".slider-left .col-md-4 img").height());

	var marginTop = ((bigh - smallh) / 2) + 55;
	var marginLeft = smallw / 2;
	$(".slider-left").css({
		"margin-top": marginTop+"px"
	});
	// $(".slider-left .col-md-4:first-child").css({
	// 	"margin-left": "-"+marginLeft+"px"
	// });
	$(".slider-right").css({
		"margin-top": marginTop+"px"
	});
});

// $('<img/>').attr('src', 'http://ingoroyva.404.ge/image?f=http://ingoroyva.404.ge/public/files/photo/1f22028ca3e7710ad882dc9a2dd3067c.jpg&w=240&h=400').load(function() {
// 	  console.log(22);
// 	});

