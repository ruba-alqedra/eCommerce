<?php
include('db.php');
include('functions.php');
include('add_to_cart.php');
$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row;
}

$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ecom Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/owl.carousel.min.css">
    <link rel="stylesheet" href="layout/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="layout/css/core.css">
    <link rel="stylesheet" href="layout/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="layout/css/responsive.css">
    <link rel="stylesheet" href="layout/css/custom.css">
    <script src="layout/js/vendor/modernizr-3.5.0.min.js"></script>
    <style>
        .accordion .accordion__hide {
            background: #f4f4f4;
            height: 65px;
            line-height: 65px;
            display: flex;
            align-items: center;
            padding: 0 30px;
            position: relative;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 10px;
            font-family: "Poppins";
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php"><img src="" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <?php
                                        foreach ($cat_arr as $list) {
                                        ?>
                                            <li><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <?php
                                            foreach ($cat_arr as $list) {
                                            ?>
                                                <li><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
                                            <?php
                                            }
                                            ?>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__account">
                                        <?php if (isset($_SESSION['USER_LOGIN'])) {
                                        ?>
                                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                    <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                    <ul class="navbar-nav mr-auto">
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Hi <?php echo $_SESSION['USER_NAME'] ?>
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="">
                                                                <a class="dropdown-item" href="order.php">Order</a>
                                                                <a class="dropdown-item" href="profile.php">Profile</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="logout.php">Logout</a>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </nav>
                                        <?php
                                        } else {
                                            echo '<a href="login.php">Login/Register</a>';
                                        }
                                        ?>

                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua"><?php echo $totalProduct ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </header>