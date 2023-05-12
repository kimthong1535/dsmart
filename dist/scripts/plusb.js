jQuery(document).ready(function($){  
	$('#slide').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		fade: true,
		prevArrow: '<i class="fas fa-arrow-left slick-prev"></i>',
		nextArrow: '<i class="fas fa-arrow-right slick-next"></i>',
		responsive: [
			{
			  breakpoint: 415,
			  settings: {
				dots: false
			  }
			},
		]
	});
	$('#events').slick({
		slidesToShow: 4,
		slidesToScroll: 4,
		arrows: true,
		prevArrow: '<i class="fas fa-arrow-left slick-prev"></i>',
		nextArrow: '<i class="fas fa-arrow-right slick-next"></i>',
		responsive: [
			{
			  breakpoint: 769,
			  settings: {
				slidesToShow: 3,
			  }
			},
			{
			  breakpoint: 601,
			  settings: {
				slidesToShow: 2,
			  }
			},
			{
			  breakpoint: 481,
			  settings: {
				slidesToShow: 1,
			  }
			}
		]
	});
	$('#client-slick').slick({
		dots: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		autoplay: true,
		prevArrow: '<i class="fas fa-arrow-left slick-prev"></i>',
		nextArrow: '<i class="fas fa-arrow-right slick-next"></i>',
	});
	$('#front-new .front-alumani .front-new-list').slick({
		slidesToShow: 4,
		arrows: true,
		prevArrow: '<i class="fas fa-arrow-left slick-prev"></i>',
		nextArrow: '<i class="fas fa-arrow-right slick-next"></i>',
		responsive: [
			{
			  breakpoint: 769,
			  settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			  }
			},
			{
			  breakpoint: 602,
			  settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},
			{
			  breakpoint: 481,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
		]
	});
});