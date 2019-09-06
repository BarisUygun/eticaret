<!DOCTYPE html>
<!--
    ustora by freshdesignweb.com
    Twitter: https://twitter.com/freshdesignweb
    URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-ticaret</title>
    <link rel="icon" href="../../asset/img/e.png">

    <?php
    //TODO: BURASI RATING
    ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/asset/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/asset/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/asset/css/owl.carousel.css">
    <link rel="stylesheet" href="/asset/css/style.css">
    <link rel="stylesheet" href="/asset/css/responsive.css">

    <!-- php5 shim and Respond.js for IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/php5shiv/3.7.2/php5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <style>
        body {
            background-image: url("/asset/img/background.jpg");

        }

        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }

        #menu-oge:hover {
            background-color: rgb(70, 70, 70);
        }

        #menu-oge:visited {
            background-color: rgb(50, 50, 50);
            border-color: rgb(255, 255, 255);
        }
    </style>

</head>
<body>

<div class="header-area" style="background-color: black;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <?php
                        if (isLogged()) {
                            ?>

                            <li>
                                <div class="dropdown" style="background-color: rgb(0,0,0)">
                                    <a style="background-color: rgb(0,0,0);color:rgb(255,255,255)"
                                       class="btn btn-secondary dropdown-toggle" type="" id="dropdownMenuButton"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i style="color:rgb(255,255,255)" class="fa fa-user"></i> Hesabım
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="profile" class="dropdown-item">Profil</a>
                                        <a class="dropdown-item" href="/favoriler">Favoriler</a>
                                        <a class="dropdown-item" href="/yorumlar">Yorumlar</a>
                                    </div>
                                </div>


                            <li><a style="color:rgb(255,255,255)" href="/cart"><i class="fa fa-user"></i> Sepetim</a>
                            </li>
                            <li><a style="color:rgb(255,255,255)" href="/siparislerim"><i class="fa fa-user"></i>
                                    Siparişlerim</a></li>
                            <li><a style="color:rgb(255,255,255)" href="/logout"><i class="fa fa-user"></i> Çıkış</a>
                            </li>

                            <?php
                        } else { ?>
                            <li><a style="color:rgb(255,255,255)" href="/login"><i class="fa fa-user"></i> Giriş</a>
                            </li>

                            <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                        style="color:rgb(255,255,255)" class="key">currency :</span><span
                                        style="color:rgb(255,255,255)" class="value">USD </span><b
                                        style="color:rgb(255,255,255)" class="caret"></b></a>
                            <ul class="dropdown-menu" style="color:rgb(255,255,255)">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                        style="color:rgb(255,255,255)" class="key">language :</span><span
                                        style="color:rgb(255,255,255)" class="value">English </span><b
                                        style="color:rgb(255,255,255)" class="caret"></b></a>
                            <ul class="dropdown-menu" style="color:rgb(255,255,255)">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End header area -->

<div class="site-branding-area" style="">
    <div class="container">


        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <a href="/"><img src="/asset/img/eticaret.png" style="width: 30%; margin-top: 25px"></a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item" style="margin: 25px;">
                    <a style="color: rgb(255,255,255)" id="cart_top" href="/cart">Sepet - <span
                                style="color: rgb(255,255,255)"
                                class="cart-amunt"><?php echo $_SESSION['total_price']; ?> ₺</span>
                        <i class="fa fa-shopping-cart"></i> <span class="product-count">
                            <?php echo $_SESSION['total_product']; ?>
                        </span>
                    </a>
                </div>
            </div>


        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area" style="background-color: transparent">
    <div class="container">
        <div class="row" style="background-color: rgb(51,51,51);">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" style="background-color:black;">
                <ul class="nav nav-tabs">
                    <li><a id="menu-oge" style="color:rgb(255,255,255)" href="/">Ana Sayfa</a></li>
                    <li class="nav-item dropdown">
                        <a id="menu-oge" style="color:rgb(255,255,255)" class="nav-link dropdown-toggle" href="#"
                           id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            Kategoriler
                        </a>
                        <div id="menu-oge" style="background-color: rgb(70,70,70);" class="dropdown-menu"
                             aria-labelledby="navbarDropdown">
                            <?php foreach (Kategoriler::getAll() AS $header_kategori) { ?>
                                <a style="    color: rgb(255,255,255);
    width: 100%;
    display: block;
    padding: 5px 10px;" class="dropdown-item"
                                   href="/category/<?php echo $header_kategori['slug'] ?>"><?php echo $header_kategori['name'] ?></a>
                                <div class="dropdown-divider"></div>
                            <?php } ?>
                        </div>
                    </li>
                    <li><a id="menu-oge" style="color:rgb(255,255,255)" href="/iletisim">İletişim</a></li>

                    <li style="margin-left: 20px">
                        <div>
                            <div>
                                <input onkeydown="search(this)" id="arama" minlength="4"
                                       style="color: rgb(255,255,255);background-color: rgb(0,0,0)" type="text"
                                       placeholder="Ara">
                                <a id="search" style="color: rgb(255,255,255);background-color: transparent"
                                   class="btn btn-primary">Ara</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> <!-- End mainmenu area -->


<script type="text/javascript">
    $(document).ready(function () {
        $("#search").click(function () {
            var search = document.getElementById("arama");
            var parameter = search.value;
            var link = "/search?id=" + parameter;
            if(parameter.length>3) {
                document.getElementById("search").href = link;
            }
        });
    });

</script>











