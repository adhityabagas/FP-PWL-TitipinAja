<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
            href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            rel="stylesheet">
        <link rel="stylesheet" href="cart.css">
        <link
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
            crossorigin="anonymous">

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script
            src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" style="padding-top: 30px;">

            <label style="color: black; padding-left: 20px;">Product</label>

            <div class="shopping-cart">

                <div class="column-labels" style="margin-bottom: 40px;">
                    <label class="product-image">Image</label>
                    <label class="product-details">Product</label>
                    <label class="product-price">Price</label>
                    <label class="product-quantity">Quantity</label>
                    <label class="product-removal">Remove</label>
                    <label class="product-line-price">Total</label>
                </div>

                <div class="a">
                    <div class="product">
                        <div class="product-image">
                            <img src="img/nike.jpg">
                        </div>
                        <div class="product-details">
                            <div class="product-title">Nike Flex Form TR Women's Sneaker</div>
                            <p class="product-description">
                                It has a lightweight, breathable mesh upper with forefoot cables for a
                                locked-down fit.</p>
                        </div>
                        <div class="product-price">12.99</div>
                        <div class="product-quantity">
                            <input type="number" value="2" min="1">
                        </div>
                        <div class="product-removal">
                            <button class="remove-product btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="product-line-price">25.98</div>
                    </div>

                    <div class="product">
                        <div class="product-image">
                            <img src="img/nike.jpg">
                        </div>
                        <div class="product-details">
                            <div class="product-title">ULTRABOOST UNCAGED SHOES</div>
                            <p class="product-description">Born from running culture, these men's shoes
                                deliver the freedom of a cage-free design</p>
                        </div>
                        <div class="product-price">45.99</div>
                        <div class="product-quantity">
                            <input type="number" value="1" min="1">
                        </div>
                        <div class="product-removal">
                            <button class="remove-product btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="product-line-price">45.99</div>
                    </div>
                </div>

                <div class="totals">
                    <div class="totals-item">
                        <label>Subtotal</label>
                        <div class="totals-value" id="cart-subtotal">71.97</div>
                    </div>
                    <div class="totals-item">
                        <label>Shipping</label>
                        <div class="totals-value" id="cart-shipping">15.00</div>
                    </div>
                    <div class="totals-item totals-item-total">
                        <label>Grand Total</label>
                        <div class="totals-value" id="cart-total">90.57</div>
                    </div>
                </div>

                <button class="checkout">Checkout</button>

            </div>
        </div>
        <script type="text/javascript">

            $(document).ready(function () {

                /* Set rates + misc */
                var shippingRate = 15.00;
                var fadeTime = 300;

                /* Assign actions */
                $('.product-quantity input').change(function () {
                    updateQuantity(this);
                });

                $('.product-removal button').click(function () {
                    removeItem(this);
                });

                /* Recalculate cart */
                function recalculateCart() {
                    var subtotal = 0;

                    /* Sum up row totals */
                    $('.product').each(function () {
                        subtotal += parseFloat($(this).children('.product-line-price').text());
                    });

                    /* Calculate totals */
                    var shipping = (
                        subtotal > 0
                            ? shippingRate
                            : 0
                    );
                    var total = subtotal + shipping;

                    /* Update totals display */
                    $('.totals-value').fadeOut(fadeTime, function () {
                        $('#cart-subtotal').html(subtotal.toFixed(2));
                        $('#cart-shipping').html(shipping.toFixed(2));
                        $('#cart-total').html(total.toFixed(2));
                        if (total == 0) {
                            $('.checkout').fadeOut(fadeTime);
                        } else {
                            $('.checkout').fadeIn(fadeTime);
                        }
                        $('.totals-value').fadeIn(fadeTime);
                    });
                }

                /* Update quantity */
                function updateQuantity(quantityInput) {
                    /* Calculate line price */
                    var productRow = $(quantityInput)
                        .parent()
                        .parent();
                    var price = parseFloat(productRow.children('.product-price').text());
                    var quantity = $(quantityInput).val();
                    var linePrice = price * quantity;

                    /* Update line price display and recalc cart totals */
                    productRow
                        .children('.product-line-price')
                        .each(function () {
                            $(this).fadeOut(fadeTime, function () {
                                $(this).text(linePrice.toFixed(2));
                                recalculateCart();
                                $(this).fadeIn(fadeTime);
                            });
                        });
                }

                /* Remove item from cart */
                function removeItem(removeButton) {
                    /* Remove row from DOM and recalc cart total */
                    var productRow = $(removeButton)
                        .parent()
                        .parent();
                    productRow.slideUp(fadeTime, function () {
                        productRow.remove();
                        recalculateCart();
                    });
                }

            });
        </script>
    </body>
</html>
