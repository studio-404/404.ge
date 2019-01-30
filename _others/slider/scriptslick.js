$(document).ready(function(){


	var lastItem = $(".gallery_iner .gallery_box").length - 1;

$('.gallery_iner').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	speed: 1000,
	arrows: false
});

$('#first').slick({
	slidesToShow: 2,
	slidesToScroll: 1,
	speed: 1000,
	// dots: true,
	// centerMode: true,
	focusOnSelect: true,
	// centerPadding: "10px"
	// rtl: true
});

$('#second').slick({
	slidesToShow: 2,
	slidesToScroll: 1,
	arrows: true,
	focusOnSelect: true,
	speed: 1000,
	swipeToSlide: true
});

				$("body").click(function(){
					console.log($('#first').slick('slickCurrentSlide'));
					console.log($('.gallery_iner').slick('slickCurrentSlide'));
					console.log($('#second').slick('slickCurrentSlide'));
				});

function Toggle(){
	var self = this;
	this.next = function(not){
		if(not != "#first")
			$('#first').slick('next');
		if(not != "#second")
			$('#second').slick('next');
		if(not != ".gallery_iner")
			$('.gallery_iner').slick('next');
	};
	this.prev = function(not){
		if(not != "#first")
			$('#first').slick('prev');
		if(not != "#second")
			$('#second').slick('prev');
		if(not != ".gallery_iner")
			$('.gallery_iner').slick('prev');
	};
	this.start = function(){
		$('#first').slick('slickGoTo', self.countPrev2(0));
		$('#second').slick('slickGoTo', 1);
		$('.gallery_iner').slick('slickGoTo', 0);
	};
	this.slickGoTo = function(where){
		var currentSlide = $('.gallery_iner').slick('slickCurrentSlide');
		var f;
		var s;
		var m;
		if(where == "next"){
			m = self.countNext2(currentSlide);
			f = self.countNext2(self.countPrev2(currentSlide));
			s = self.countNext2(self.countPlus1(currentSlide));
			console.log("current + 1: " + self.countPlus1(currentSlide));
			console.log("next 2: " + s);
			console.log("lastItem: " + lastItem);
		}
		if(where == "prev"){
			m = self.countPrev2(currentSlide);
			f = self.countPrev2(self.countPrev2(currentSlide));
			s = self.countPrev2(self.countPlus1(currentSlide));
		}
		$('#first').slick('slickGoTo', f);
		$('#second').slick('slickGoTo', s);
		$('.gallery_iner').slick('slickGoTo', m);
	};
	this.countNext2 = function(current){
		var out;
		switch (current) {
			case lastItem:
				out = 1;
				break
			case (lastItem - 1):
				out = 0;
				break
			default:
				out = current + 2;
				break
		}
		return out;
	};
	this.countPrev2 = function(current){
		var out;
		switch (current) {
			case 0:
				out = lastItem -1;
				break
			case 1:
				out = lastItem;
				break
			default:
				out = current - 2;
				break
		}
		return out;
	};
		this.countPlus1 = function(current){
		var out;
		switch (current) {
			case lastItem:
				out = 0;
				break
			default:
				out = current + 1;
				break
		}
		return out;
	};
}



$('.gallery_iner').on('beforeChange', function(event, slick, currentSlide, nextSlide){
	console.log("gallery_iner change");
	if(currentSlide < nextSlide || nextSlide == 0){
		toggle.next('#first');
		toggle.next('#second');
	} else {
		toggle.prev('#first');
		toggle.prev('#second');
	}
});


	var toggle = new Toggle();
	toggle.start();

	$(".GalNext1").click(function(){
		toggle.prev();
	});
	$(".GalPrev1").click(function(){
		toggle.next();
	});

	$(".GalNext2").click(function(){
		toggle.slickGoTo("prev");
	});
	$(".GalPrev2").click(function(){
		toggle.slickGoTo("next");
	});

	$("#next").click(function(){
		toggle.next();
	});
	$("#prev").click(function(){
		toggle.prev();
	});
	$("#test").click(function(){
		toggle.slickGoTo();
	});
});