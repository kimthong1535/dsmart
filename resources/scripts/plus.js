jQuery(document).ready(function ($) {
    if (jQuery('form.variations_form').length !== 0) {
        var form = jQuery('form.variations_form');
        var variable_product_price = '';
        setInterval(function() {
            if (jQuery('.single_variation_wrap span.price span.amount').length !== 0) {
                if (jQuery('.single_variation_wrap span.price span.amount').text() !== variable_product_price) {
                    variable_product_price = jQuery('.single_variation_wrap span.price span.amount').text();
                    jQuery('.price-current').text(variable_product_price);
                }
                if (jQuery('.single_variation_wrap .variation_id').attr('value') !== variable_product_price) {
                    variable_product_price = jQuery('.variation_id').attr('value');
                    jQuery('.addtocart .variation_id').attr('value',variable_product_price);
                }
            }
        }, 500);
    };
    $(".variable-item-contents span, .variations tr .label label").each(function() {
        var str = "(";
        var newhtml1 = $(this).html().replace(str, '<span class="marked">' + str );
        $(this).html(newhtml1);
    });
    $(".variable-item-contents span, .variations tr .label label").each(function() {
        var dtr = ")";
        var newhtml2 = $(this).html().replace(dtr, dtr + '</span>' );
        $(this).html(newhtml2);
    });
    // var element = $('.single_variation_wrap').detach();
    // $('.addtocart').append(element);
    $('.product-checkout .variation .data-vari:nth-child(1) dt.variation-').text('사이즈');
    $('.product-checkout .variation .data-vari:nth-child(2) dt.variation-').text('종이종류');
    $('.product-checkout .purple-checkout .variation .data-vari:nth-child(3) dt.variation-').text('수량');
    $('.product-checkout .green-checkout .variation .data-vari:nth-child(3) dt.variation-').text('제작수량');
    $('.product-checkout .variation .data-vari:nth-child(4) dt.variation-').text('후가공');
    // faq repeater field filter 
$('.search-sample-box').on('keyup', 'INPUT[type="text"]', function(event) {

    // get our elements
    let $faq = $(event.delegateTarget);
    
    // get the search filter value
    let search = $(this).val().replace(/[-/\\^$*+?.()|[\]{}]/g, '\\$&');
    
    // get the repeater list in faq object
    let $repeater = $('.item-sample', $faq);
    
    // items visible counter
    let itemsVisible = 0;
  
    // return false early if we dont have a list
    if ($repeater.length < 1) return false;
  
    // loop through each item in the repeater list
    $("li:not('.filter-no-results')", $repeater).each(function(key, item) {
    
      // strip all mark tags from list item html
      $(this).html($(this).html().replaceAll(/<(\/?|\!?)(mark)>/g, ""));
     
      // store our q and a text
      let text = $(this).text();
  
      // check if the item is visible using regular expression match
      let itemVisible = text.match(new RegExp(search, 'i'));
      
      // remove these classes
      $(item).removeClass('filter-visible filter-hidden');
  
      // check if we have a match
      $(item).addClass('filter-' + (itemVisible ? 'visible' : 'hidden'));
      
      // for each div inside the list item
      $('div',this).each(function(){
      
        // highlight the matched search text by wrapping it with a mark tag
          let newText = $(this).html().replace(itemVisible, '<mark>' + itemVisible + '</mark>');
        
        // update the html with new text
          $(this).html(newText);
        
      });
  
      // if item is visible, increment our count
      if (itemVisible) ++itemsVisible;
  
    });
  
    // check if we have no items visible then show hide no results message
    if (itemsVisible === 0) {
      $('li.filter-no-results', $repeater).show();
    } else {
      $('li.filter-no-results', $repeater).hide();
    }
  
  });
  
});