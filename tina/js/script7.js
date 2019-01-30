(function ($) {
	Drupal.behaviors.uvaNews = {
		attach: function (context, settings) {
			var $uvaNews = new Swiper('.swiper-container', {
				autoplay: 5000,
				speed: 1500,
				pagination: '.swiper-pagination',
				paginationClickable: true,
				keyboardControl: true,
				a11y: true,
				loop: true,
				spaceBetween: 0,
			});

			$('.swiper-container', context).once('wrapSlideText', function () {
				var $frame = this;
				// Rearranging markup a bit to accomodate design
				$('.swiper-slide', $frame).each(function () {
					var $slideElems = $('.views-field-field-news-description, .views-field-field-news-url', this);
					//$slideElems.wrapAll('<div id="link-news-read-more" class="text-wrapper"></div>');
				});
			});
			$('.swiper-container').on('mouseenter', function () {
				$uvaNews.stopAutoplay();
			});
			$('.swiper-container').on('mouseleave', function () {
				setTimeout(function () {
					$uvaNews.slideNext();
					$uvaNews.startAutoplay();
				}, 1000);
			});
			$uvaNews.on('reachEnd', function () {
				setTimeout(function () {
					$uvaNews.stopAutoplay();
					$uvaNews.slideNext();
				}, 100);
			});

			$('a.element-focusable').focusin(function () { //Slide show focus for keyboard users
				$uvaNews.stopAutoplay();
				$uvaNews.slideTo(1);
				$uvaNews.destroy(false, true);
				//alert(Swiper.realIndex);
				$uvaNews = new Swiper('.swiper-container', {
					effect: 'fade',
					//autoplay: 5000,
					speed: 50,
					pagination: '.swiper-pagination',
					paginationClickable: true,
					keyboardControl: true,
					a11y: true,
					loop: true,
					spaceBetween: 0,
				});


				setTimeout(function () {
					$('.swiper-slide-duplicate a').attr('tabindex', '-1');
					//$('.swiper-slide-duplicate').attr('display', 'none');
					//$('.swiper-slide-duplicate').remove();
				}, 500);

				$("div.hero-read-more a").each(function (c) {
					$(this).attr('count', c);
				});

				$("span.swiper-pagination-bullet").each(function (c) {
					$(this).attr('count', c + 1);
				});

				$("div.hero-read-more a").focusin(function () {
					$("span.swiper-pagination-bullet[count=" + $(this).attr('count') + "]").click();
				});
				
				$('.swiper-pagination').hide();
			});

		}
	};
})(jQuery);
;
