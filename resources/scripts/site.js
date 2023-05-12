/**
 * Site.js
 */
$(document).ready(function () {
    LoadMiniCart();

});
function StartLoading() {
    $('#page-loading').fadeIn();
};

function StopLoading() {
    $('#page-loading').fadeOut();
};

function ToastMessage(type, message) {
    $.simplyToast(
        message,
        type,
        {
            offset: {
                from: 'top',
                amount: 20
            },
            delay: 3000
        }
    );
};

// Fn - page load
function pageLoad() {
    //if (IsHomepage) {
    $('.call-to-action').each(function (i, el) {
        $(el).fbox().open();
    });
    //} else {
    //$('.call-to-action-mini').each(function (i, el) {
    //    $(el).show();
    //});
    //}

    // Show sticker
    $('.call-to-action-mini').each(function (i, el) {
        $(el).show();
    });

    // Set Menu Mobile Wrap
    //$(".menu-m-wrap").height($(window).height() - 66);
    //$(window).resize(function () {
    //    $(".menu-m-wrap").height($(window).height() - 66);
    //});

    //$(document).on('click', 'header .ic-menu', function () {
    //    var currentToggle = $(this).data('toggle');

    //    if (currentToggle == false) {
    //        $(this).addClass('active');
    //        $('header .submenu').show();
    //        $(".ic-menu-toggle").text("Menu");

    //        // Show menu mobile
    //        if ($(".ul-submenu").css("display") == "none") {
    //            $('body').css({ "position": "fixed" });
    //            $("header").addClass("header-m");
    //            $("#content").css({ "padding-top": "66px" });
    //            $("#menu-m").addClass("active");
    //        }

    //    } else {
    //        $(this).removeClass('active');
    //        $('header .submenu').hide();
    //        $('.product-category').removeClass('active').hide();
    //        $('.not-fixed').show();
    //        $('header .mn-shop').data('toggle', false);
    //        $(".ic-menu-toggle").text("Close");

    //        // Hide menu mobile
    //        if ($(".submenu").css("display") == "none") {
    //            $("#menu-m").removeClass("active")
    //                .queue(function () {
    //                    setTimeout(function () {
    //                        $("header").removeClass("header-m");
    //                        $("#content").css({ "padding-top": "0px" });
    //                        $('body').css({ "position": "relative" });
    //                    }, 300);
    //                }).dequeue();
    //        }
    //    }

    //    $(this).data('toggle', !currentToggle);

    //    if ($(this).hasClass('active')) {
    //        $('header').removeClass('active');
    //        if ($('header').hasClass("home")) {
    //            $("#header-logo").attr("src", $("#header-logo").data("logo-black"));
    //        }
    //        $(".ic-menu-toggle").text("Close");
    //    }
    //    else {
    //        $('header').addClass('active');
    //        if ($('header').hasClass("home")) {
    //            if ($(".submenu").css("display") == "none") {
    //                setTimeout(function () {
    //                    $("#header-logo").attr("src", $("#header-logo").data("logo-white"));
    //                }, 300);
    //            } else {
    //                $("#header-logo").attr("src", $("#header-logo").data("logo-white"));
    //            }
    //        }
    //        $(".ic-menu-toggle").text("Menu");
    //    }
    //})
    //    .on('click', 'header .ic-menu-toggle', function () {
    //        $('header .ic-menu').trigger('click');
    //    });

    // Toggle submenu-child
    //$(".submenu-child-toggle").bind("click", function () {
    //    var i = $(this).find("i");
    //    if (i.text() == "+") {
    //        i.text("-");
    //    } else {
    //        i.text("+");
    //    }
    //    $(this).parent().find(".ul-submenu-m-wrap").slideToggle();
    //});

    // Load cart info


    // Trigger bootstrap tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Fix content height
    $("#content").css({ "min-height": ($(window).outerHeight() - $("footer").outerHeight() - $("header").outerHeight()) });
    $(window).bind("resize", function () {
        $("#content").css({ "min-height": ($(window).outerHeight() - $("footer").outerHeight() - $("header").outerHeight()) });
    });

    // Show menu when scroll top
    //var position = $(window).scrollTop();
    //var isHeaderFixed = false;
    //$(window).scroll(function () {
    //    var scroll = $(window).scrollTop();
    //    if (scroll > position) {
    //        $('header').removeClass("fixed header-fixed-show");
    //        $("body").css({ "margin-top": 0 });
    //        isHeaderFixed = false;
    //    } else {
    //        if (scroll > 0) {
    //            if (!isHeaderFixed) {
    //                $('header').addClass("fixed header-fixed-show");
    //                $("body").css({ "margin-top": 66 });
    //                isHeaderFixed = true;
    //            }
    //        } else {
    //            $('header').removeClass("fixed header-fixed-show");
    //            $("body").css({ "margin-top": 0 });
    //            isHeaderFixed = false;
    //        }
    //    }
    //    position = scroll;
    //});

    // Bind event for closing popup
    $('.popup-close-btn').bind('click', function (e) {
        var btn = $(this);
        var popup = $(this).closest('.popup');
        e.preventDefault();
        popup.fbox().close();
        //$('.call-to-action-mini').show();

        //if (btn.data('dismiss') == 1) {
        //    popup.dismiss();
        //}
    });

    // Bind event for closing popup
    $('.popup-dismiss-btn').bind('click', function (e) {
        var btn = $(this);
        var popup = $(this).closest('.popup');
        e.preventDefault();
        popup.fbox().close();

        if (btn.data('dismiss') == 1) {
            popup.dismiss();
        }
    });

    $('.popup-mini-close-btn').bind('click', function (e) {
        var popup = $(this).closest('.call-to-action-mini');
        e.preventDefault();
        popup.hide();
    });

    //== Event on Giftcode ==
    $('#get_giftcode_form').bind('submit', function (e) {
        var form = $(this);
        var email = form.find('input[type="email"]').val();
        e.preventDefault();

        if (!F.IsValidEmail(email)) {
            ToastMessage("danger", "Vui lòng nhập email!");
            return;
        }

        $.ajax({
            url: window.location.origin + '/promotion/giftcode-for-saleoff/register',
            method: 'post',
            data: form.serialize(),
            dataType: 'json',
            beforeSend: function () {
                StartLoading();
            },
            complete: function () {
                StopLoading();
            },
            success: function (response) {
                if (response.status == 1) {
                    ToastMessage("success", response.message || "Giftcode đã được gửi đến email của bạn!");
                    // Dismiss get-code popup
                    form.closest('.popup').dismiss();
                }
                else {
                    ToastMessage("danger", response.message || "Lỗi! Vui lòng thử lại");
                }
            },
            error: function () {
                StopLoading();
                ToastMessage("danger", "Lỗi! Vui lòng thử lại");
            }
        });
    });
    //===========================

    /*== Trigger event on Cart ==
    $(document).on("click", ".mini-cart .close-box, .ic-shopping-cart", function () {
        if ($(".mini-cart").css("right") != "0px") {
            $(".mini-cart").css("right", "0px")
        } else {
            $(".mini-cart").css("right", "-100%")
        }
    });*/

    //======================
    //== Search product
    (function () {
        var bestPictures = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: F.url('/san-pham/search'),
                prepare: function (query, settings) {
                    //settings.type = "POST";
                    settings.contentType = "application/json; charset=UTF-8";
                    /*settings.data = JSON.stringify({ sku: query });*/
                    settings.url += F.http_build_query({ sku: query });

                    return settings;
                }
            }
        });

        //$('.search-box').typeahead(null, {
        //    name: 'best-pictures',
        //    display: 'value',
        //    source: bestPictures,
        //    templates: {
        //        suggestion: function (data) {
        //            var html = '<div>';
        //            html += '<a href="' + F.url(data.href) + '"><img src="' + data.featuredImage + '" /></a>';
        //            html += '<a class="product-name" href="' + F.url(data.href) + '">' + data.name + '</a>';
        //            html += '</div>';
        //            return html;
        //        }
        //    }
        //});

        //$('#search-box-btn').bind('click', function () {
        //    $('.search-box-wp').toggleClass('hidden');
        //    $('#search-box-header').focus();
        //    $('#search-box-header2').focus();
        //});

        //$('.search-box-close').bind('click', function () {
        //    $('.search-box-wp').addClass('hidden');
        //});
    })();

    //== Product details ==========================
    (function () {
        $(document).on('click', '.btn-quantity.btn-sub', function () {
            var val = parseInt($('input.quantity').val().length > 0 ? $('input.quantity').val() : 1);
            if (val > 1) {
                val--;
            }

            $('.quantity').val(val);
            cartItem.quantity = val;
        })
            .on('click', '.btn-quantity.btn-add', function () {
                var val = parseInt($('input.quantity').val().length > 0 ? $('input.quantity').val() : 1);
                val++;

                $('.quantity').val(val);
                cartItem.quantity = val;
            })
            .on('click', '#btn-add-cart', function () {

            });

        $('.product-feature-color').bind('click', function (e) {
            var color = $(this);
            var colorId = color.data('color-id');
            var colorName = color.data("color-name");
            var sizeNotAvailable = sizeInfo.filter(
                function (i) {
                    return ((i.colorId != colorId) || (i.colorId == colorId && i.isAvailable == false) || isInstock == false);
                });
            var sizeAvailable = sizeInfo.filter(
                function (i) {
                    return (i.colorId == colorId && i.isAvailable == true && isInstock == true);
                });

            $('.product-feature-color.active').removeClass('active');
            $(this).addClass('active');
            cartItem.colorId = color.data('color-id');

            $('.product-feature-size').removeClass('disabled').attr('title', '');
            $('.product-feature-size.current').css({
                'background-color': color.css('background-color')
            });

            $(".product-color-name span").text(colorName)
                .parent().parent().css("display", "flex");

            for (var i in sizeNotAvailable) {
                var skip = sizeAvailable.filter(function (j) { return (j.entity.id == sizeNotAvailable[i].entity.id); });
                if (skip.length > 0) {
                    continue;
                }

                var size = $('[data-size-id="' + sizeNotAvailable[i].entity.id + '"]');
                size
                    .removeClass('active current')
                    .addClass('disabled')
                    .css({
                        'background-color': 'inherit',
                        'color': 'inherit'
                    })
                    .attr('title', 'Sản phẩm tạm hết hàng');
            }

            cartItem.sizeId = $('.product-feature-size.active').data('size-id') || 0;
        });

        $('.product-feature-size').bind('click', function () {
            var self = $(this);

            if ($('.product-feature-color.active').length == 0) {
                return;
            }

            var colorId = $('.product-feature-color.active').data('color-id');
            var sizeId = self.data('size-id');
            var sizeAvailable = sizeInfo.filter(function (i) { return i.entity.id == sizeId && i.colorId == colorId && i.isAvailable == true && isInstock == true });

            if (sizeAvailable.length == 0) {
                self.attr('title', 'Sản phẩm tạm hết hàng');
                return;
            }

            self.removeClass('disabled').attr('title', '');
            $('.product-feature-size.current').removeClass('current').css({
                'background-color': 'inherit',
                'color': 'inherit'
            });
            self.addClass('current');

            self.css({
                //'background-color': $('.product-feature-color.active').css('background-color'),
                'background-color': '#313132',
                'color': '#fff'
            });

            cartItem.colorId = colorId;
            cartItem.sizeId = sizeId;
        });

        $('#btn-add-cart').bind('click', function (e) {
            e.preventDefault();
            AddProductCart();
        });

        $('#btn-process-order').bind('click', function (e) {
            e.preventDefault();
            window.location = window.location.origin + '/gio-hang';
        });

        $('.product-feature-color:first-child').trigger('click');
        //==========================================================
    })();
}
function AddProductCart(isProductListtingCurrent) {
    //Tạm khóa đặt hàng online
    //ToastMessage("danger", "Vì lượng đơn đặt hàng đang quá tải, quý khách hàng vui lòng inbox fanpage hoặc liên hệ hotline: 0971.220.266 để được tư vấn và hỗ trợ đặt hàng. D.CHIC xin lỗi quý khách hàng nếu gặp phải bất kỳ sự bất tiện nào nếu có.");

    $.ajax({
        url: window.location.origin + '/gio-hang/them-san-pham',
        method: 'post',
        data: cartItem,
        dataType: 'json',
        beforeSend: function () {
            StartLoading();
        },
        complete: function () {
            StopLoading();
        },
        success: function (response) {
            if (response.status === 1) {
                LoadMiniCart();
                //nếu tại trang danh sách sản phẩm thì không show text thành công. vì tại trang đã có popup
                if (!isProductListtingCurrent) {
                    ToastMessage("success", response.message || "Đã thêm sản phẩm vào giỏ hàng! ");
                    $("#btn-process-order").removeClass('hidden');
                    // mở mini-cart 
                    if ($(".mini-cart").css("right") != "0px") {
                        $(".mini-cart").css("right", "0px")
                    } else {
                        $(".mini-cart").css("right", "-100%")
                    }
                }
                else {
                    $("#btn-process-order").addClass('hidden');
                    // mở mini-cart 
                    if ($(".mini-cart").css("right") != "0px") {
                        $(".mini-cart").css("right", "0px")
                    } else {
                        $(".mini-cart").css("right", "-100%")
                    }
                }
            }
            else {
                ToastMessage("danger", response.message || "Lỗi! Vui lòng thử lại");
                $("#btn-process-order").addClass('hidden');
                // mở mini-cart 
                if ($(".mini-cart").css("right") != "0px") {
                    $(".mini-cart").css("right", "0px")
                } else {
                    $(".mini-cart").css("right", "-100%")
                }
            }
        },
        error: function () {
            StopLoading();
            ToastMessage("danger", "Lỗi! Vui lòng thử lại");
            $("#btn-process-order").addClass('hidden');
            // mở mini-cart 
            if ($(".mini-cart").css("right") != "0px") {
                $(".mini-cart").css("right", "0px")
            } else {
                $(".mini-cart").css("right", "-100%")
            }
        }
    });
}


// Delete cart item
function DeleteCartItem(btn) {
    var itemId = $(btn).data('item-id') || 0;

    if (itemId <= 0) {
        return false;
    }

    $.ajax({
        url: window.location.origin + '/gio-hang/huy-san-pham',
        type: 'delete',
        data: { id: itemId, __RequestVerificationToken: __RequestVerificationToken },
        dataType: 'json',
        beforeSend: function () {
            StartLoading();
        },
        complete: function () {
            StopLoading();
        },
        success: function (response) {
            if (response.status === 1) {
                // Remove item from cart-index
                $(".cart .cart_item[data-id='" + itemId + "']").remove();

                // Update mini cart
                LoadMiniCart();
                ToastMessage("success", response.message || "Đã hủy sản phẩm khỏi giỏ hàng! ", "success");

                // Update cart-index
                if ($("#cart").length > 0) {
                    if (response.data.itemsTotal > 0) {
                        // Update cart value
                        $("#cart_money_total").text(response.data.total);
                        $("#cart_money_grandtotal").text(response.data.grandTotal);
                    }

                    // reload if stay on page cart-index
                    window.location.href = window.location.href;
                }
            }
            else {
                ToastMessage("danger", response.message || "Lỗi! Vui lòng thử lại");
            }
        },
        error: function () {
            StopLoading();
            ToastMessage("danger", "Lỗi! Vui lòng thử lại");
        }
    });

}
// Fn - Load mini cart
function LoadMiniCart() {
    // Post ajax
    $.ajax({
        url: '/gio-hang/mini-cart',
        type: 'get',
        dataType: 'html',
        //contentType: 'application/json',
        beforeSend: function () {

        },
        complete: function () {

        },
        success: function (response) {
            $('.mini-cart').empty().html(response);
            var cartItemQuantity = $('#cart-item-quantity').data('cart-item-quantity');
            if (cartItemQuantity > 0) {
                $('.cart-items-total').empty().text('(' + cartItemQuantity + ')');
            }
            else {
                $('.cart-items-total').empty();
            }
        },
        error: function () {
            StopLoading();
            //ToastMessage("danger", response.message || "Lỗi đăng nhập tài khoản! ");
        }
    });
}
// Trigger delete cart item
function _DeleteCartItem(itemId) {
    $('#confirmDeleteItem').modal('show');
    $('#btnDeleteCartItem').data('item-id', itemId);
}

// Customer Logout
function Logout() {
    // Post ajax
    $.ajax({
        url: '/tai-khoan/dang-xuat',
        type: 'post',
        dataType: 'json',
        data: { __RequestVerificationToken: __RequestVerificationToken },
        beforeSend: function () {
            F.StartLoading();
        },
        complete: function () {
            F.StopLoading();
        },
        success: function (response) {
            if (response.status == 1) {
                var redirectUrl = response.data.redirectUrl || "/";
                window.location.href = redirectUrl;
            }
            else {
                ToastMessage("danger", response.message || "Lỗi đăng xuất, vui lòng thử lại! ");
            }
        },
        error: function () {
            ToastMessage("danger", "Lỗi đăng xuất, vui lòng thử lại! ");
            F.StopLoading();
        }
    });
}