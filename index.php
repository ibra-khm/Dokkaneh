<?php
require("connection.php");
if(!isset($_SESSION)){
    session_start();
}


// Fetch Products 

$sql = "SELECT * FROM products order by id DESC";
$stmt = $conn->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch categories

$sql = "SELECT * FROM categories order by id DESC";
$stmt = $conn->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Dokkaneh</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="./ogani-master/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./ogani-master/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./ogani-master/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./ogani-master/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./ogani-master/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./ogani-master/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./ogani-master/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./ogani-master/css/style.css" type="text/css">
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">



            <!-- Row count AND Total in bag CODE -->
            <ul>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>

        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop.php">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                    </ul>
                </li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>

        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> support@dokkaneh.com</li>
                <li>Free Shipping for all Orders Above 20jd</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> support@dokkaneh.com</li>
                                <li>Free Shipping for all Orders Above 20jd</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <?php 
                            if(!isset($_SESSION['email'])){
                            ?>
                            <div class="header__top__right__auth">
                                <a href="http://localhost/ecommerce/signup.php"><i class="fa fa-user"></i> Login</a>
                            </div>
                            <?php
                            } else{
                            ?>
                            
                            <button class="btn" id="logout"><i class="fa fa-user"></i> Logout</button>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <h3>Dokkaneh</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <!-- CODE url -->
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="http://localhost/ecommerce/shop.php">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">

                    <!-- CODE -->
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <!-- CODE categories -->
                        <ul>
                            <?php
                            foreach ($categories as $category) {
                                $name = $category['name'];
                                $id = $category['id'];
                                echo "<li><a href='http://localhost/ecommerce/shop.php?id=$id'>$name</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">

                            <!-- CODE Categories -->
                            <form action="#" method="POST">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>


                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text d-flex justify-content-center">
                                <a href="tel:+962787823264">
                                    <h5 class="mt-1">+962787823264</h5>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- CODE shop  -->

                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="http://localhost/ecommerce/shop.php" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->

    <!-- CODE categories  -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    <?php
                    foreach ($categories as $category) {
                        $name = $category['name'];
                        $image = $category['image'];
                        $id = $category['id'];

                        echo " <div class='col-lg-3'>
                        <div class='categories__item set-bg' data-setbg='$image'>
                            <h5><a href='http://localhost/ecommerce/shop.php?id=$id'>$name</a></h5>
                        </div>
                    </div>";
                    }
                    ?>


                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">

                        <!-- Filter CODE -->
                        <ul>
                            <li class="active" data-filter=".fruits">Fruits</li>
                            <li data-filter=".snacks">Snacks</li>
                            <li data-filter=".meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="row featured__filter">
                <?php
                foreach ($products as $product) {
                    $name = $product['name'];
                    $image = $product['image'];
                    $price = $product['price'];
                    $id = $product['id'];
                    $catId = $product['category_id'];
                    $sql = "SELECT * FROM categories where id = $catId";
                    $stmt = $conn->query($sql);
                    $cat = $stmt->fetch(PDO::FETCH_ASSOC);
                    $catName = $cat['name'];



                    echo " <div class='col-lg-3 col-md-4 col-sm-6 mix $catName '>
                    <div class='featured__item'>
                        <div class='featured__item__pic set-bg' data-setbg='img/featured/feature-1.jpg'>
                            <ul class='featured__item__pic__hover'>
                                <li><a href='http://localhost/addtocart.php?id=$id'><i class='fa fa-shopping-cart'></i></a></li>
                            </ul>
                        </div>

                        <div class='featured__item__text'>
                            <h6><a href='http://localhost/addtocart.php?id=$id'>$name</a></h6>
                            <h5>$price jd</h5>
                        </div>
                    </div>
                </div>";
                }

                ?>


            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>New Arrivals</h4>
                        <div class="latest-product__slider owl-carousel">

                            <?php
                            $sql = "SELECT * FROM products order by id DESC";
                            $stmt = $conn->query($sql);
                            $latestProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $count = 0;

                            // code img
                            for ($cols = 0; $cols < 3; $cols++) {
                                echo " <div class='latest-prdouct__slider__item'>";
                                for ($i = 0; $i < 3; $i++) {
                                    $itemName = $latestProducts[$count]['name'];
                                    $itemPrice = $latestProducts[$count]['price'];
                                    $id = $latestProducts[$count]['id'];
                                    echo
                                    " <a href='http://localhost/addtocart.php?id=$id' class='latest-product__item'>
                                    <div class='latest-product__item__pic'>
                                        <img src='img/latest-product/lp-1.jpg'>
                                    </div>
                                    <div class='latest-product__item__text'>
                                        <h6>$itemName</h6>
                                        <span>$itemPrice jd</span>
                                    </div>
                                </a>";
                                    $count++;
                                }
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Today's Offers</h4>
                        <div class="latest-product__slider owl-carousel">

                            <?php

                            // select sale products 
                            $sql = "SELECT * FROM products where discount>0";
                            $stmt = $conn->query($sql);
                            $discountProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $count = 0;
                            // code img
                            $groups = count($discountProducts);
                            for ($$cols = $groups; $cols >= 0; $cols -= 3) {
                                global $catId;
                                echo "<div class='product__discount__item '>";
                                for ($i = 0; $i < 3; $i++) {
                                    $itemCount = $discountProducts[$count];
                                    $item = $itemCount['name'];
                                    $discount = $itemCount['discount'];
                                    $itemPrice = $itemCount['price'];
                                    $id = $itemCount['id'];
                                    $newPrice = (float) $itemPrice  * (100 - $discount) / 100;
                                    $catId = $itemCount['category_id'];
                                    $cat = '';
                                    foreach ($categories as $category) {
                                        if ($category['id'] == $catId)
                                            $cat = $category['name'];
                                    }
                                    echo "  <div class='d-flex mb-3'>
                                    <div class='product__discount__item__pic set-bg '
                                    style='width:110px; height:110px;'  data-setbg='img/product/discount/pd-1.jpg'>
                                            <div class='product__discount__percent'>-$discount%</div>
                                            <ul class='product__item__pic__hover'>
                                                <li><a href='http://localhost/addtocart.php?id=$id'><i class='fa fa-shopping-cart'></i></a></li>
                                            </ul>
                                        </div>
                                        <div class='product__discount__item__text ms-4'>
                                            <span>$cat</span>
                                            <h5><a href='#'>$item</a></h5>
                                            <div class='product__item__price'>$newPrice jd <span>$itemPrice jd</span></div>
                                        </div>
                                        
                                    </div>";
                                    $count++;
                                }
                                echo "</div>";
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Stay Healthy</h4>
                        <div class="latest-product__slider owl-carousel">

                            <?php
                            $catId = 0;
                            foreach ($categories as $category) {
                                if ($category['name'] == 'fruits')
                                    $catId = $category['id'];
                            }


                            $sql = "SELECT * FROM products where category_id = $catId ";
                            $stmt = $conn->query($sql);
                            $fruits = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $count = 0;
                            $groups = count($fruits);

                            // code img
                            for ($cols = $groups; $cols > 0; $cols -= 3) {
                                echo " <div class='latest-prdouct__slider__item'>";
                                for ($i = 0; $i < 3; $i++) {
                                    $itemName = $fruits[$count]['name'];
                                    $itemPrice = $fruits[$count]['price'];
                                    $id = $fruits[$count]['id'];
                                    echo
                                    " <a href='http://localhost/shop-details.php?id=$id' class='latest-product__item'>
                                    <div class='latest-product__item__pic'>
                                        <img src='img/latest-product/lp-1.jpg'>
                                        
                                    </div>
                                    
                                    <div class='latest-product__item__text'>
                                        <h6>$itemName</h6>
                                        <span>$itemPrice jd</span>
                                    </div>
                                </a>";
                                    $count++;
                                }
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->



    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html">
                                <h3>Dokkaneh</h3>
                            </a>
                        </div>
                        <ul>
                            <li>Address: Az-Zarqa, Jordan</li>
                            <li>Phone: +962 78 782 3261</li>
                            <li>Email: support@dokkaneh.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <div class="footer__widget__social">
                            <h4 class="mb-4">Follow us on social media</h4>

                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="./ogani-master/js/jquery-3.3.1.min.js"></script>
    <script src="./ogani-master/js/bootstrap.min.js"></script>
    <script src="./ogani-master/js/jquery.nice-select.min.js"></script>
    <script src="./ogani-master/js/jquery-ui.min.js"></script>
    <script src="./ogani-master/js/jquery.slicknav.js"></script>
    <script src="./ogani-master/js/mixitup.min.js"></script>
    <script src="./ogani-master/js/owl.carousel.min.js"></script>
    <script src="./ogani-master/js/main.js"></script>

    <script src="./signup/js/app.logout.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</body>

</html>