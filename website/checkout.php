<?php
include('includes/header.php');
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php }
$cart_total = 0;
if (isset($_POST['submit'])) {
    $address = get_safe_value($con, $_POST['address']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $payment_type = get_safe_value($con, $_POST['payment_type']);
    $user_id = $_SESSION['USER_ID'];

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $cart_total = $cart_total + ($price * $qty);
    }

    $total_price = $cart_total;
    $payment_status = 'pending';
    if ($payment_type == 'cod') {
        $payment_status = 'success';
    }
    $order_status = 'pending';
    $added_on = date('Y-m-d h:i:s');
    $sql = "INSERT into orders(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price)
    values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price')";
    mysqli_query($con, $sql);



    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $sql = "INSERT into order_details(order_id,product_id,qty,price)values('$order_id','$key','$qty','$price')";
        mysqli_query($con, $sql);
    }
    unset($_SESSION['cart']);
?>
    <script>
        window.location.href = 'order_submit.php';
    </script>
<?php
}
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(layout/images/bg/7.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">

                            <?php
                            $accordin_class = 'accordion__title';
                            if (!isset($_SESSION['USER_LOGIN'])) {
                                $accordin_class = 'accordion__hide';
                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form id="login-form" method="post">
                                                        <h5 class="checkout-method__title">Login</h5>
                                                        <div class="single-input">
                                                            <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
                                                            <span class="field_error" id="login_email_error"></span>
                                                        </div>

                                                        <div class="single-input">
                                                            <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
                                                            <span class="field_error" id="login_password_error"></span>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_login()">Login</button>
                                                        </div>
                                                        <div class="form-output login_msg">
                                                            <p class="form-messege field_error"></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form action="#">
                                                        <h5 class="checkout-method__title">Register</h5>
                                                        <div class="single-input">
                                                            <input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%">
                                                            <span class="field_error" id="name_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="text" name="email" id="email" placeholder="Your Email*" style="width:100%">
                                                            <span class="field_error" id="email_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
                                                            <span class="field_error" id="mobile_error"></span>
                                                        </div>
                                                        <div class="single-input">
                                                            <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%">
                                                            <span class="field_error" id="password_error"></span>
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="button" class="fv-btn" onclick="user_register()">Register</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="<?php echo $accordin_class ?>">
                                Address Information
                            </div>
                            <form method="post">
                                <div class="accordion__body">
                                    <div class="bilinfo">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" required placeholder="Street Address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" required placeholder="City/State">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" required placeholder="Post code/ zip">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="<?php echo $accordin_class ?>">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">
                                            COD<input required type="radio" name="payment_type" value="COD">
                                            &nbsp;&nbsp;PayU <input required type="radio" name="payment_type" value="payu">
                                        </div>
                                        <div class="single-method">

                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $cart_total = 0;
                            foreach ($_SESSION['cart'] as $key => $val) {
                                $productArr = get_product($con, '', '', $key);
                                $pname = $productArr[0]['name'];
                                $mrp = $productArr[0]['mrp'];
                                $price = $productArr[0]['price'];
                                $image = $productArr[0]['image'];
                                $qty = $val['qty'];
                                $cart_total = $cart_total + ($price * $qty);
                        ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" />
                                    </div>

                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname ?></a>
                                        <span class="price"><?php echo $price * $qty ?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="icon-trash icons"></i></a>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price"><?php echo $cart_total ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>
<script>
    function manage_cart(pid, type) {
        if (type == 'update') {
            var qty = jQuery("#" + pid + "qty").val();
        } else {
            var qty = jQuery("#qty").val();
        }
        jQuery.ajax({
            url: 'manage_cart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                if (type == 'update' || type == 'remove') {
                    window.location.href = window.location.href;
                }
                jQuery('.htc__qua').html(result);
            }
        });
    }
</script>