jQuery(document).ready(function($){
	// MENU_SAN_PHAM
	$('#menu-menu-san-pham> .menu-item > a').prepend('<i class="fa-solid fa-chevron-down"></i>');

	$('#menu-menu-san-pham > .menu-item > a').on('click', function(_event) {
		$(this).toggleClass('active');
		$(this).siblings('.sub-menu').toggleClass('show').parents('.menu-item').siblings('.menu-item').find('a').removeClass('active').siblings('.sub-menu').removeClass('show');
	});
	// MENU FOOTER
	$('#menu-menu-footer > .menu-item > a').prepend('<i class="fa-solid fa-chevron-down"></i>');
	
	$('#menu-menu-footer > .menu-item').on('click', function(_event) {
		$(this).find('a').toggleClass('active');
		$(this).find('.sub-menu').toggleClass('show').parents('.menu-item').siblings('.menu-item').find('a').removeClass('active').siblings('.sub-menu').removeClass('show');
	});
	// MENU_PRODUCT
	$('#menu-product-js').on('click', function(_event) {
		
		$(this).find('.select-selected').toggleClass('select-arrow-active');
		$(this).find('.select-items').toggleClass('select-hide').parents('.custom-select').siblings('#menu-product-js').find('#menu-product-js').removeClass('select-arrow-active').siblings('.select-items').removeClass('select-hide');
	});
	$('#top-menu-right .select-search').on('click', function(_event) {
		$(this).siblings('.ajax-search').toggleClass('search-active');
	});

	$('#employment-current-wrap > .js-show-modal > a').on('click', function(_event) {
		if ($(this).hasClass('active')) {
		  $(this).removeClass('active');
		  $('#modal-recruitment > .v--modal-overlay').removeClass('show');
		  $(this).fadeOut();
		}else{
		  $(this).addClass('active')
		  $('#modal-recruitment > .v--modal-overlay').addClass('show');
		  $(this).fadeIn();
		}
	  });
	$('#employment-other-wrap > .js-show-modal > a').on('click', function(_event) {
		
		if ($(this).hasClass('active')) {
		  $(this).removeClass('active');
		  $('#modal-recruitment > .v--modal-overlay').removeClass('show');
		  $(this).fadeOut();
		}else{
		  $(this).addClass('active')
		  $('#modal-recruitment > .v--modal-overlay').addClass('show');
		  $(this).fadeIn();
		}
	  });

	  
	  $('#close').on('click', function(_event) {
		
		if ($(this).hasClass('active')) {
			$(this).addClass('active');
			$('#modal-recruitment > .v--modal-overlay').addClass('show');
			$('#employment-current-wrap > .js-show-modal > a').addClass('active');
			$('#employment-other-wrap > .js-show-modal > a').addClass('active');

		}else{
			$(this).removeClass('active')
			$('#modal-recruitment > .v--modal-overlay').removeClass('show');
			$('#employment-current-wrap > .js-show-modal > a').removeClass('active');
			$('#employment-other-wrap > .js-show-modal > a').removeClass('active');

		}
		});
		$('#employment-player').on('click', function(_event) {
			
			if ($(this).hasClass('active')) {
				$(this).addClass('active')
				$('#modal-recruitment > .v--modal-overlay').addClass('show');
				$('#employment-current-wrap > .js-show-modal > a').addClass('active');
				$('#employment-other-wrap > .js-show-modal > a').addClass('active');
				
			}else{
				$(this).removeClass('active');
				$('#modal-recruitment > .v--modal-overlay').removeClass('show');
				$('#employment-current-wrap > .js-show-modal > a').removeClass('active');
				$('#employment-other-wrap > .js-show-modal > a').removeClass('active');

			}
			});
	
	// END MODAL

	// MENU_MOBILE
	$('#menu-m-btn').on('click', function(_event) {
		
		if ($(this).hasClass('active')) {
		  $(this).removeClass('active');
		  $('#menu-m').removeClass('active');
		  $(this).fadeOut();
		}else{
		  $(this).addClass('active')
		  $('#menu-m').addClass('active');
		  $(this).fadeIn();
		}
	  });
	  $('#menu-main-menu-1 > .menu-item').on('click', function(_event) {
		
		$(this).find('a').toggleClass('select-active');
		$(this).find('.sub-menu').toggleClass('select-show').parents('.menu-item').siblings('.menu-item').find('a').removeClass('select-active').siblings('.sub-menu').removeClass('select-show');
	});
	// SEARCH
	
});