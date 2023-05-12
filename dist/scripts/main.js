jQuery(document).ready(function($){  

	$(window).on("scroll",function(){

		let offset = $(this).scrollTop();

		if(offset > 0){

			$("header").addClass("is-sticky");

		}else{

			$("header").removeClass("is-sticky");

		}

	});

	$(".banner-button .button-link").on("click",function(e){

		let href = $(this).attr("href");

		if(href[0] == "#" && href.length > 1){

			e.preventDefault();

			$('html,body').animate({

		        scrollTop: $(href).offset().top

		    }, 400);

		}

	});

	setTimeout(function(){

		$('.count-number').each(function(index, el) {

			$(this).counterUp({

				time: 1000

			});

		});

	},10);

	$('form .search input').on('input',function(){

		var value = $(this).val(); 

		$(this).attr('value', value);

	});

	$('form a.submit-button').on('click',function(e){

		e.preventDefault();

		var form = $(this).parents('form'),

			value_bo_mon = form.find('.cadres select').find(':selected').attr('slug'),

			value_linh_vuc = form.find('.field select').find(':selected').attr('slug'),

			value_input = form.find('input').attr('value');

			$.ajax({

				url: '/wp-admin/admin-ajax.php',

				type: 'POST',

				dataType: 'json',

				data:{

				  'action' : 'search_loading',

				  'value_bo_mon' : value_bo_mon,

				  'value_linh_vuc' : value_linh_vuc,

				  'value_input' : value_input,

				},

				beforeSend: function() {

				},

				success: function(data) {

					$('#post-list .row').html(data.content);

				},

				error: function(){

				  console.log('Đã xảy ra lỗi');

				},

			  });

	});



	$('.menu-mb').on('click', function(event) {

		event.preventDefault();

		if ($(this).hasClass('active')) {

		  $(this).removeClass('active');

		  $('.menu-mobi').removeClass('show');

		  $(this).fadeOut();

		}else{

		  $(this).addClass('active')

		  $('.menu-mobi').addClass('show');

		  $(this).fadeIn();

		}

	  });

	  $('#overlay').on('click', function(event) {

		event.preventDefault();

		$(this).fadeOut();

		$('.menu-mb').removeClass('active');

		$('.menu-mobi').removeClass('show');

	  });

	  if ($('#wpadminbar').length >0){$('.menu-mobi').css('top',$('#wpadminbar').height());}

	  if ($(window).width()<= 1200) {

		  $('.menu-mobi .top').append($('form.search-form'));

	  }

	  $(".main-nav-mobi .menu > .menu-item-has-children > a").append('<div class="icon-mb"><i class="fas fa-chevron-down"></i></div>');

	  //$(".menu-mobi .menu-item-has-children .icon-mb").on('click',function(e){

	  //    e.preventDefault();

	  //    $(this).parents('.menu-item-has-children').find(".sub-menu").slideToggle();

	  //    $(this).parents('.menu-item-has-children').toggleClass('open');

	 // });

  

	//  $(".menu-mobi .menu-item-type-post_type .icon-mb").on('click', function(e){

	// 	 e.preventDefault();

	// 	//  $('.menu-mobi').toggleClass('show');

	//  });



	// $(".menu-mobi .menu-item-type-post_type .icon-mb").on('click',function(e){

	// 	e.preventDefault();

	// 	$(this).parents('li').toggleClass('show').siblings('li').removeClass('show');

	// });



	$(".menu-mobi .menu-item .icon-mb").on('click',function(e){

		e.preventDefault();

		$(this).parents('li').toggleClass('show').siblings('li').removeClass('show');

		$(this).find(".sub-menu").toggleClass('show');

	});

})