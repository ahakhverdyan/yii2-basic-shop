jQuery(document).ready(function ($) {

    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });

    var navoffeset = $(".agileits_header").offset().top;
    $(window).scroll(function () {
        var scrollpos = $(window).scrollTop();
        if (scrollpos >= navoffeset) {
            $(".agileits_header").addClass("fixed");
        } else {
            $(".agileits_header").removeClass("fixed");
        }
    });

    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );

    $().UItoTop({easingType: 'easeOutQuart'});

    $(function(){
        $('#example').okzoom({
            width: 150,
            height: 150,
            border: "1px solid black",
            shadow: "0 0 5px #000"
        });
    });
});

$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
});

paypal.minicart.render();

paypal.minicart.cart.on('checkout', function (evt) {
    var items = this.items(),
        len = items.length,
        total = 0,
        i;

    // Count the number of each item in the cart
    for (i = 0; i < len; i++) {
        total += items[i].get('quantity');
    }

    if (total < 3) {
        alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
        evt.preventDefault();
    }
});

/* Cart */

function showCart(cart) {
    $('#modal-cart .modal-body').html(cart);
    $('#modal-cart').modal();
    let cartSumText = $('#cart-sum').text();
    let cartSum = cartSumText ? cartSumText : '$0';
    $('.cart-sum').text(cartSum);
}

function getCart() {
    $.ajax({
        url: 'cart/show',
        type: 'GET',
        success : function(res) {
            showCart(res);
        },
        error: function () {
            alert('Error! : Cant add to cart');
        }
    });
}

function clearCart() {
    $.ajax({
        url: 'cart/clear',
        type: 'GET',
        success : function(res) {
            showCart(res);
        },
        error: function () {
            alert('Error! : Cant add to cart');
        }
    });
}

$('.add-to-cart').on('click', function () {
    let id = $(this).data('id');

    $.ajax({
        url: 'cart/add',
        data: {id:id},
        type: 'GET',
        success : function(res) {
            if(!res) alert('Product dose not exists');
            showCart(res);
        },
        error: function () {
            alert('Error! : Cant add to cart');
        }
    });

    return false;
});


$('#modal-cart .modal-body').on('click', '.del-item', function () {
    let id = $(this).data('id');
    $.ajax({
        url: 'cart/delete-item',
        data: {id:id},
        type: 'GET',
        success : function(res) {
            if(!res) alert('Product dose not exists');
            let current_location = document.location.pathname;
            if(current_location == '/cart/checkout') {
                location = 'cart/checkout';
            }
            showCart(res);
        },
        error: function () {
            alert('Error! : Cant add to cart');
        }
    });
});

$('.value-plus, .value-minus').on('click', function () {
    let id = $(this).data('id');
    let qty = $(this).data('qty');
    $('.cart-table .overlay').fadeIn();
    $.ajax({
        url: 'cart/change-cart',
        data: {id: id, qty: qty},
        type: "GET",
        success: function (res) {
            if(!res) alert('Error change cart');
            location.reload();
        },
        error: function () {
            alert('Cant change cart');
        }
    });
});



/* /Cart */