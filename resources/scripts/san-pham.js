$(document).ready(function () {
    //selected color

    BindClickColor();
    //bind sự kiện click color form chi tiết
    $(".info-product .color .circle").bind("click", function () {
        $(this).parent().find(".circle").each(function (index, value) {
            $(value).removeClass("active");
        });
        $(this).addClass("active");
        // bind ten màu nếu có.
        let colorName = $(this).data('name');
        if (colorName) {
            $(this).parent().parent().find('.label').text(colorName);
        }

        let sizes = $(this).data('size-ids') || '';
        $(this).parent().parent().parent().find('.size .circle').each(function (index, value) {
            $(this).parent().attr("tooltip", "Hết hàng!");
            $(this).removeClass('active');
            $(this).parent().find('.circle-disable').removeClass('d-none');
        });
        if (sizes !== '') {
            $(this).parent().parent().parent().find('.size .circle').each(function (index, value) {
                if (sizes.toString().includes($(value).data('id'))) {
                    $(value).parent().attr("tooltip", "");
                    $(value).find('.circle-disable').addClass('d-none');
                }

            });

        }
        if (cartItem) {
            cartItem.colorId = $(this).data('id');
            cartItem.sizeId = 0;
        }

        var urls = $(this).data('urls') ? $(this).data('urls').split(',') : [];

        $(urls).each(function (index, value) {
            // bind desktop
            $('#product-detail .desktop .view-image img').each(function (index1, value1) {

                if (index === index1) {
                    $(value1).attr('src', value);
                }
            });
            //bind mobile
            $('#product-detail .mobile .view-image img').each(function (index1, value1) {

                if (index === index1) {
                    $(value1).attr('src', value);
                }
            });
        });

        // Bind ảnh theo màu đã click
    });

    // bind su kien view-add-to-cart
    BindHoverAddCart();

    // selectd size

    //click open bind model
    //$('.add-to-cart').bind('click', function () {
    //    BindAddCartBtn(this);
    //});

    $('#view-image-fixed .img-fixed').bind('click', function () {
        let url = $(this).attr('src');
        BindPhotoWipe(url);
    });
    // show hướng dẫn chọn size
    $('#product-detail .size-guide').bind('click', function () {

        var url = window.location.href
        var arr = url.split("/");
        var result = arr[0] + "//" + arr[2];
        var image = result + '/images/product/size-guide.png'
        BindPhotoWipe(image);
    });
    // bind click image.
    $('#product-detail .view-image').bind('click', function () {
        var url = $(this).find('img').attr('src');
        var close = function () {
            $('#view-image-fixed').addClass('d-none');
            $('#view-image-fixed').removeClass('d-flex');
        }
        BindPhotoWipe(url, close)
    });

    $('#product-detail .view-image').bind('click', function () {
        $('#view-image-fixed').removeClass('d-none');
        $('#view-image-fixed').addClass('d-flex');
    });
    //-----------------------

});

function ResetModelCart() {
    $('#modelCart .title').text('Chưa có sản phẩm nào được thêm');
    $('#modelCart img').attr('src', '');
    $('#modelCart .name').text('');
    $('#modelCart .color').css('background-color', '#ffffff');
    $('#modelCart .size .name').text('');
    $('#modelCart .info-product .price .old').text('');
    $('#modelCart .info-product .price .new').text('');
    console.log("11");
}
function BindPhotoWipe(image, close) {
    console.log("10");
    $('#photoWipe').removeClass('d-none');
    var pswpElement = document.querySelectorAll('.pswp')[0];
    // build items array
    var items = [
        {
            src: image,
            w: 0,
            h: 0
        }
    ];

    // define options (if needed)
    var options = {
        // optionName: 'option value'
        // for example:
        index: 0, // start at first slide,
        mouseUsed: false
    };

    // Initializes and opens PhotoSwipe
    var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.listen('beforeChange', function () {
        gallery.zoomTo(1, { x: gallery.viewportSize.x / 2, y: gallery.viewportSize.y / 2 }, 1);
    });
    gallery.listen('gettingData', function (index, item) {
        if (item.w < 1 || item.h < 1) { // unknown size
            var img = new Image();
            img.onload = function () { // will get size after load

                item.w = $(window).width();
                item.h = $(window).width() * (this.height / this.width);
                gallery.invalidateCurrItems(); // reinit Items
                gallery.updateSize(true); // reinit Items
            }
            img.src = item.src; // let's download image
        }
    });
    if (typeof close === "function") {
        gallery.listen('close', function () {
            close();
            $('#photoWipe').addClass('d-none');
        });
    }
    else {
        gallery.listen('close', function () {
            $('#photoWipe').addClass('d-none');
        });
    }

    gallery.init();

}
function BindColorSelect(T) {
    BindClickColor();
    BindSize();

    //$.ajax({
    //    url: '/san-pham/product-detail/' + T.data('product-slug'),
    //    method: 'get',
    //    dataType: 'json',
    //    beforeSend: function () {
    //        //StartLoading();
    //    },
    //    complete: function () {
    //        //StopLoading();
    //    },
    //    success: function (response) {

    //        let color = '';
    //        let size = '';
    //        let sizeDefault = '';
    //        $(response.color).each(function (index, value) {
    //            if (value.id <= 0) return;
    //            if (value.sizeIds && !sizeDefault) {
    //                sizeDefault = value.sizeIds
    //                color += `
    //                         <span class="circle active" data-name=${value.name} style="background-color: ${value.value}" data-id="${value.id}" data-url="${value.urlImage}" data-size-ids="${value.sizeIds}"></span>           
    //                     `;
    //            }
    //            else {
    //                color += `
    //                         <span class="circle" data-name=${value.name} style="background-color: ${value.value}" data-id="${value.id}" data-url="${value.urlImage}" data-size-ids="${value.sizeIds}"></span>           
    //                     `;
    //            }

    //        });
    //        let isCheckSize = 0;

    //        $(response.size).each(function (index, value) {
    //            let active = '';
    //            if (value.id <= 0) return;

    //            if (sizeDefault.includes(value.id.toString())) {
    //                active = 'd-none';
    //                isCheckSize++;
    //            }
    //            size += `
    //                        <span class="product-feature-size circle circle_border ${isCheckSize === 1 && active ? 'active' : ''}" data-id="${value.id}">
    //                            <span class="name">${value.name}</span>
    //                            <span class="circle-disable ${active}"></span>
    //                        </span>
    //                    `;



    //        });

    //        T.parent().find('.view-add-to-cart .color').empty().append(color);
    //        T.parent().find('.view-add-to-cart .size').empty().append(size);
    //        BindClickColor();
    //        BindSize();

    //    },
    //    error: function () {
    //        //StopLoading();
    //        ToastMessage("danger", "Lỗi! Vui lòng thử lại");
    //    }
    //});
}
function BindClickColor() {
    $(".view-add-to-cart .color .circle").bind("click", function () {
        let url = $(this).data('url');
        $(this).parent().parent().parent().find('.product-thumbnail-wrap').find('img').attr('src', url);
        $(this).parent().find(".circle").each(function (index, value) {
            $(value).removeClass("active");
        });
        $(this).addClass("active");

        let sizes = $(this).data('size-ids') || '';
        $(this).parent().parent().parent().find('.size .circle').each(function (index, value) {
            $(this).removeClass('active');
            $(this).parent().find('.circle-disable').removeClass('d-none');
        });
        if (sizes !== '') {
            $(this).parent().parent().find('.size .circle').each(function (index, value) {
                if (sizes.toString().includes($(value).data('id'))) {
                    $(value).find('.circle-disable').addClass('d-none');
                }
            });
        }
    });
}
function BindSize() {
    // bind trang danh sach
    $('.view-add-to-cart .size .circle').bind('click', function () {
        if (!$(this).find('.circle-disable').hasClass('d-none')) {
            return;
        }

        $(this).parent().find('.circle').each(function (index, value) {
            $(value).removeClass("active");
        });

        $(this).addClass('active');
        if (cartItem) {
            cartItem.sizeId = $(this).data('id');
        }

    });
    // bind trang chi tiet.
    $('.info-product .size .circle').bind('click', function () {
        console.log("3");
        if (!$(this).find('.circle-disable').hasClass('d-none')) {
            $('.size-info-mobile').text('Hết hàng!');
            return;
        }
        $('.size-info-mobile').html('');
        $(this).parent().parent().find('.circle').each(function (index, value) {
            $(value).removeClass("active");
        });

        $(this).addClass('active');
        if (cartItem) {
            cartItem.sizeId = $(this).data('id');
        }

    });

}
function BindHoverAddCart() {
    var x = window.matchMedia("(max-width: 768px)");
    if (x.matches) { // If media query matches
        $(".info-product").click(function () {
            BindColorSelect($(this));
            $(".view-add-to-cart").removeClass('opacity-1').css("display", "none");
            $(this).parent().find(".view-add-to-cart").addClass('opacity-1').css("display", "block");
        });
    }
    else {
        $(".info-product").hover(function () {
            BindColorSelect($(this));
            $(this).parent().find(".view-add-to-cart").addClass('opacity-1');
        });
        $(".view-add-to-cart").mouseleave(function () {
            $(this).removeClass('opacity-1');

        });

        $(".info-product").mouseleave(function () {
            $(this).parent().find(".view-add-to-cart").removeClass("opacity-1");
        });
    }

}
function BindAddCartBtn(T) {
    ResetModelCart();
    if (0 == 0) {
        let elmRoot = $(T).parent().parent().parent();
        let name = elmRoot.find('.product-name').text();
        let price = elmRoot.find('.pull-right').html();

        let color = elmRoot.find('.color .circle.active').css('background-color');
        let colorName = elmRoot.find('.color .circle.active').data('name') || "";
        let colorId = elmRoot.find('.color .circle.active').data('id');
        let size = elmRoot.find('.size .circle.active').text();
        let sizeId = elmRoot.find('.size .circle.active').data('id');
        let image = elmRoot.find('img').attr('src');
        let productId = elmRoot.find('.info-product').data('product-id');

        if (!size || !color) {
            //$('#modelCart .title').text('Vui lòng chọn màu và size'); return;
            ToastMessage("danger", 'Vui lòng chọn màu và size'); return;
        }

        cartItem.productId = productId;
        cartItem.colorId = colorId;
        cartItem.sizeId = sizeId;
        $('#modelCart').modal('show');
        AddProductCart(true);

        $('#modelCart .name').text(name);
        $('#modelCart .info-product').empty().append(price);
        $('#modelCart .color').css('background-color', color);
        $('#modelCart .size .name').text(size);
        $('#modelCart img').attr('src', image);
        $('#modelCart .color-name').text('Màu: ' + colorName);
        $('#modelCart .size-name').text('Size: ' + size)


        // bind san pham da xem.
        let productViewed = GetProductviewed();
        let elmsViewd = '';
        if (productViewed) {
            $(productViewed).each(function (index, value) {

                elmsViewd += `
                            <div class="mr-1 item">
                                <a href="${value.Url}">
                                    <img class="img-fixed w-100" src="${value.UrlImage}">
                                </a>
                                <div class="name" style="">${value.Name}</div>
                                <div class="price-new text-danger ${!value.SpecialPrice ? 'd-none' : ''}">${value.SpecialPrice} VNĐ</div>
                                <div class="price-old text-line-through ${!value.SpecialPrice ? 'text-decoration-none' : ''}">${value.Price} VNĐ</div>
                            </div>

                        `;
            });
            $('#modelCart .product-viewed .viewed-container').empty().append(elmsViewd);
        }

        $('#modelCart .title').empty().append('<i class="fa fa-check text-success"></i> Sản phẩm đã được thêm');
    }
    //$('#modelCart').modal('show');

}
// get storage
function GetProductviewed() {
    let strListProduct = localStorage.getItem('listProduct');
    let listProduct = [];

    if (strListProduct !== null && strListProduct !== undefined) {
        listProduct = JSON.parse(strListProduct);
    }
    return listProduct;
}

function SetProductviewed(product) {
    let products = GetProductviewed();
    var isExits = products.find(function (item) {
        if (!item) return false;
        return item.Id === product.Id
    });
    if (!isExits) {
        products.push(product);
    }

    if (products.length > 4) {
        let productEnd = [];
        for (var i = products.length - 4; i < products.length; i++) {
            productEnd.push(products[i]);
        }
        localStorage.setItem('listProduct', JSON.stringify(productEnd));
    }
    else {
        localStorage.setItem('listProduct', JSON.stringify(products));
    }


}


