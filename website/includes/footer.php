<footer id="htc__footer">
    <!-- Start Footer Widget -->
    <div class="footer__container bg__cat--1">
        <div class="container">
            <div class="row">
                <!-- Start Single Footer Widget -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer">
                        <h2 class="title__line--2">ABOUT US</h2>
                        <div class="ft__details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</p>
                            <div class="ft__social__link">
                                <ul class="social__link">
                                    <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                    <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                    <div class="footer">
                        <h2 class="title__line--2">information</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                                <li><a href="#">Manufactures</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                    <div class="footer">
                        <h2 class="title__line--2">my account</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <li><a href="#">My Account</a></li>
                                <li><a href="cart.html">My Cart</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                    <div class="footer">
                        <h2 class="title__line--2">Our service</h2>
                        <div class="ft__inner">
                            <ul class="ft__list">
                                <li><a href="#">My Account</a></li>
                                <li><a href="cart.html">My Cart</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
                <!-- Start Single Footer Widget -->
                <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                    <div class="footer">
                        <h2 class="title__line--2">NEWSLETTER </h2>
                        <div class="ft__inner">
                            <div class="news__input">
                                <input type="text" placeholder="Your Mail*">
                                <div class="send__btn">
                                    <a class="fr__btn" href="#">Send Mail</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Single Footer Widget -->
            </div>
        </div>
    </div>
    <!-- End Footer Widget -->
    <!-- Start Copyright Area -->
    <div class="htc__copyright bg__cat--5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyright__inner">
                        <p>Copyright© <a href="https://freethemescloud.com/">Free themes Cloud</a> 2023. All right reserved.</p>
                        <a href="#"><img src="" alt="payment images"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->
</footer>
<!-- End Footer Style -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="layout/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="layout/js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="layout/js/plugins.js"></script>
<script src="layout/js/slick.min.js"></script>
<script src="layout/js/owl.carousel.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="layout/js/waypoints.min.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="layout/js/main.js"></script>
<script>
    function user_register() {
        jQuery('.field_error').html('');
        var name = jQuery("#name").val();
        var email = jQuery("#email").val();
        var mobile = jQuery("#mobile").val();
        var password = jQuery("#password").val();
        var is_error = '';
        if (name == "") {
            jQuery('#name_error').html('Please enter name');
            is_error = 'yes';
        }
        if (email == "") {
            jQuery('#email_error').html('Please enter email');
            is_error = 'yes';
        }
        if (mobile == "") {
            jQuery('#mobile_error').html('Please enter mobile');
            is_error = 'yes';
        }
        if (password == "") {
            jQuery('#password_error').html('Please enter password');
            is_error = 'yes';
        }
        if (is_error == '') {
            jQuery.ajax({
                url: 'register_submit.php',
                type: 'post',
                data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&password=' + password,
                success: function(result) {
                    if (result == 'email_present') {
                        jQuery('#email_error').html('Email id already present');
                    }
                    if (result == 'insert') {
                        jQuery('.register_msg p').html('Thank you for registeration');
                    }
                }
            });
        }

    }


    function user_login() {
        jQuery('.field_error').html('');
        var email = jQuery("#login_email").val();
        var password = jQuery("#login_password").val();
        var is_error = '';
        if (email == "") {
            jQuery('#login_email_error').html('Please enter email');
            is_error = 'yes';
        }
        if (password == "") {
            jQuery('#login_password_error').html('Please enter password');
            is_error = 'yes';
        }
        if (is_error == '') {
            jQuery.ajax({
                url: 'login_submit.php',
                type: 'post',
                data: 'email=' + email + '&password=' + password,
                success: function(result) {
                    if (result == 'wrong') {
                        jQuery('.login_msg p').html('Please enter valid login details');
                    }
                    if (result == 'valid') {
                        window.location.href = window.location.href;
                    }
                }
            });
        }
    }
</script>
</body>

</html>