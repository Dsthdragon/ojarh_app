<?php
require_once 'api/config/Database.php';
require_once 'api/models/Controller.php';
$db = getDB();
$userClass = new Users($db);
if(isset($_SESSION['userid']))
	{
		$userid=$_SESSION['userid'];
		$userDetails = $userClass->userDetails($_SESSION['userid']);
	}
?>

<!doctype html>
<!--[if IE 9]>
<html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Basic page -->

    <meta name="viewport" content="width=device-width,user-scalable=1">
    <meta name="theme-color" content="#7796a8">
    <link rel="canonical" href="https://ojarh.com">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo_120x@3x.png?466" type="image/x-icon"/>
    <!-- Title and description -->
    <title>
        OJARH.com - home of wholesalers...
    </title>
    <meta name="description"
          content="">
    <!-- Script -->
    <link rel="icon" href="assets/images/logo_120x@3x.png">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/css/theme-config.scss.css?466" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="assets/css/theme-style.scss.css?466" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="assets/css/theme-sections.scss.css?466" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="assets/css/theme-responsive.scss.css?466" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="assets/css/animate.css?466" rel="stylesheet" type="text/css"
          media="all"/>
    <link href="assets/css/owl.carousel.min.css?466" rel="stylesheet"
          type="text/css" media="all"/>
    <link href="assets/css/jquery.fancybox.css?466" rel="stylesheet"
          type="text/css" media="all"/>

    <!-- /snippets/social-meta-tags.liquid -->
    <meta property="og:site_name" content="RT AaShop demo">
    <meta property="og:url" content="https://rt-aashop-demo.myshopify.com/">
    <meta property="og:title" content="Aashop - Creative Drag &amp; Drop Multipurpose Shopify Theme">
    <meta property="og:type" content="website">
    <meta property="og:description"
          content="">


    <meta name="twitter:site" content="@smartaddons">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Aashop - Creative Drag &amp; Drop Multipurpose Shopify Theme">
    <meta name="twitter:description"
          content="">

    <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/5131304995/digital_wallets/dialog">
    <script id="shopify-features" type="application/json">
        {
            "accessToken": "c227cfd494728708c39f85b8f84953b5",
            "betas": [],
            "domain": "rt-aashop-demo.myshopify.com",
            "predictiveSearch": true,
            "shopId": 5131304995,
            "smart_payment_buttons_url": "https:\/\/cdn.shopify.com\/shopifycloud\/payment-sheet\/assets\/latest\/spb.en.js",
            "dynamic_checkout_cart_url": "https:\/\/cdn.shopify.com\/shopifycloud\/payment-sheet\/assets\/latest\/dynamic-checkout-cart.en.js"
        }</script>
    <script integrity="sha256-6LRkPKq7iEM0KHCD+fcDYMQJ0xf6KyB1NPgT0P7xsMc=" crossorigin="anonymous"
            data-source-attribution="shopify.loadfeatures" defer="defer"
            src="assets/js/load_feature-e8b4643caabb884334287083f9f70360c409d317fa2b207534f813d0fef1b0c7.js">
    </script>
    <script integrity="sha256-qzPTa4Ven/Yc2yyXr9BKZWCTXSrPTCnbGdWsxA7YCw0="
            data-source-attribution="shopify.dynamic-checkout" defer="defer"
            src="assets/js/features-ab33d36b855e9ff61cdb2c97afd04a6560935d2acf4c29db19d5acc40ed80b0d.js"
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" media="screen"
          href="assets/css/styles.css?466">
    <script id="sections-script" data-sections="home-slider,homepage-product-carousel,ss-tools,ss-facebook-message"
            defer="defer" src="assets/js/scripts.js?466"></script>

            <style type="text/css">
  #simpAskQuestion{clear: both; margin:20px auto 0; max-width:1200px; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
  #simpAskQuestion.simpAsk-container h2{display:inline-block; vertical-align:middle; margin:7px 0 7px!important; float:none !important;}
  #simpAskQuestion .simpAsk-title-container{margin-bottom:10px!important;}
  #simpAskQuestion .simpAskForm-container{padding:10px !important; margin-bottom:10px!important;background:#fafafa;}
  #simpAskQuestion .simpAskForm-container p{margin:0 0 10px !important;}
  #simpAskQuestion .simpAskForm-container form{margin:0 !important;}
  #simpAskQuestion #askQuestion textarea{margin-bottom:10px!important; width:100%!important; padding:10px !important; border:1px solid #ECEBEB!important; overflow:auto; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;background:#fff;}
  #simpAskQuestion #askQuestion input.simpAsk-fifty-percent{width:49.40%!important; padding:10px!important; border:1px solid #ECEBEB!important; -webkit-appearance:none; margin:0 0 10px!important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;background:#ffffff;}
  #simpAskQuestion #askQuestion input.fleft{float:left!important;}
  #simpAskQuestion #askQuestion input.fright{float:right!important;}
  #simpAskQuestion .button, #simpAskQuestion a.btn ,#simpAskQuestion input.btn{-webkit-box-shadow:none; -moz-box-shadow:none; box-shadow:none; display:inline-block; border:none; padding:5px 15px; text-transform:none; width:auto; border-radius:3px;}
  #simpAskQuestion .simpAskSubmitForm{clear:both;}
  #simpAskQuestion #askQuestion input, #simpAskQuestion textarea{-webkit-appearance:none; vertical-align:top; display:inline-block;}
  #simpAskQuestion .simpAsk-error-msg{ background-color: #de4343;color: #fff;padding: 5px;box-shadow: none;margin-top: 10px;}
  #simpAskQuestion .simpAsk-success-msg{     background-color: #61b832;color: #fff;padding: 5px;box-shadow: none;margin-top: 10px;}
  #simpAskQuestion .simpAskSubmitForm .simpAskForm-cancel-btn.button{display:inline-block; cursor:pointer; background:0 0; color:initial; padding:5px 15px;}
  #simpAskQuestion .simpAskSubmitForm .simpAskForm-cancel-btn.button:hover{text-decoration:underline;}
  #simpAskQuestion .simpAskForm-container p.simpAskForm-title{font-weight:700;padding-left:4px!important;}
  #simpAskQuestion .qa-display{border-left:1px solid #000;padding-left:8px!important; line-height:12px!important;-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
  #simpAskQuestion .simpAsk-title-container a.simpAskQuestionForm-btnOpen{float:right; cursor:pointer; margin-top: 9px;}
  .simpAskQuestion-btn{-webkit-box-shadow:none; -moz-box-shadow:none; box-shadow:none; display:inline-block; border:none; margin:0;padding:7px 20px!important; color:#000; text-transform:none; background:#ddd; width:auto;}
  .simpAskQuestion-btn:hover{color:#fff;}
  .accordionSimpQA{padding:0px!important; display:inline-block !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
  .accordionSimpQA ul{margin:0; padding:0; list-style:none; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
  .accordionSimpQA ul li{margin:0 !important; padding:0 !important; width:100% !important; float:left !important; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
  .accordionSimpQA ul li p{font-weight:normal !important; margin:0 0 7px !important; line-height:18px !important; padding-left:20px; position:relative; }
  .accordionSimpQA ul li p.simpQuestionHolder{font-weight:bold !important;}
  .accordionSimpQA ul li p.simpActionHolder{ margin:0 0 20px !important; text-align:right !important;}
  .accordionSimpQA ul li p.simpQuestionHolder:before{content:"Q"; font-weight:700; font-size: 16px; position:absolute; left:0; top:1px;}
  .accordionSimpQA ul li p.simpAnswerHolder:before{content:"A"; font-weight:700; font-size: 16px; position:absolute; left:0; top:1px;}
  .accordionSimpQA ul li p.simpAnswerHolder{margin-bottom: 20px !important;}

  .simp-ask-question-header{background-color: #fafafa; padding: 30px;position: relative;}
    .simpAskQuestion-Qcontent{width: 275px; display: inline-block;}
    .simp-ask-question-header .simpAskQuestionForm-btnOpen{position: absolute; top: 50%; right: 24px; margin-top: -18px;}
    .simpAskQuestion-Qcontent h3{margin:0;}
    .simpAskQuestion-Qcontent p{font-size: 0.9em; margin: 0 !important;}
    @font-face {
    font-family: 'simpqafonticons';
    src: url('data:application/octet-stream;base64,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') format('woff'),
        url('data:application/octet-stream;base64,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') format('truetype');
  }
    [class^="icon-simp-"]:before, [class*=" icon-simp-"]:before {
    font-family: "simpqafonticons";
    font-style: normal;
    font-weight: normal;
    speak: none;
    display: inline-block;
    text-decoration: inherit;
    width: 1em;
    margin-right: .2em;
    text-align: center;
    font-variant: normal;
    text-transform: none;
    line-height: 1em;
    margin-left: .2em;
  }
  .icon-simp-help:before { content: '\e800'; }
  .icon-simp-help-circled:before { content: '\e801'; }
  .icon-simp-ok:before { content: '\e802'; }
  .icon-simp-cancel:before { content: '\e803'; }
  @media screen and (max-width:768px){
    .simp-ask-question-header .simpAskQuestionForm-btnOpen {position:inherit;top: 0;right: 0; margin-top: 0;}
  }
  @media screen and (max-width:480px){
    #simpAskQuestion .simpAsk-title-container a.simpAskQuestionForm-btnOpen{float:initial;}
    #simpAskQuestion .simpAsk-container .h2,#simpAskQuestion .simpAsk-container h2{display:block;}
    #simpAskQuestion #askQuestion input.simpAsk-fifty-percent{width:100%!important;margin-bottom:10px!important}
    #simpAskQuestion #askQuestion input.simpAsk-fifty-percent{width:100% !important;}
  }

</style>
</head>
<body class="template-index">
<div id="wrapper" class="page-wrapper wrapper-full effect_10">
    <!--   Loading Site
    <div id="loadingSite">
        <div class="cssload-loader">
            <span class="block-1"></span>
            <span class="block-2"></span>
            <span class="block-3"></span>
            <span class="block-4"></span>
            <span class="block-5"></span>
            <span class="block-6"></span>
            <span class="block-7"></span>
            <span class="block-8"></span>
            <span class="block-9"></span>
            <span class="block-10"></span>
            <span class="block-11"></span>
            <span class="block-12"></span>
            <span class="block-13"></span>
            <span class="block-14"></span>
            <span class="block-15"></span>
            <span class="block-16"></span>
        </div>
    </div> -->
    <header id="header" class="header header-style1">
        <div class="sidebar-top d-none d-lg-block">
            <div class="container">
                <a href="#" class="site-header-banner-image">
                    <img src="assets/images/top_banner_1170x.webp?v=1566613123"
                         srcset="assets/images/top_banner_1170x.webp?v=1566613123"
                         alt="RT AaShop demo">
                </a>
            </div>
        </div>
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="header-top-left col-xl-7 col-lg-7 d-none d-lg-block">
                        <div class="welcome-msg d-none d-lg-block">
                            Welcome to OJARH.com, Home of Wholesalers, Importers, and Brand Owners.
                        </div>
                    </div>
                    <div class="header-top-right no__at col-xl-5 col-lg-5 col-sm-12 col-12">
                        <div id="menu-menu-top-right">
                            <div class="toplink-item language no__at">
                                <!-- language start -->
                                <div class="language-theme ">
                                    <button class="btn btn-primary dropdown-toggle" type="button">English
                                        <i class="fa fa-angle-down"></i></button>
                                    <ul class="dropdown-menu dropdown-content">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                    </ul>
                                </div>
                                <!-- language end -->
                            </div>
                            <div class="toplink-item checkout currency">
                                <div class="currency-wrapper">
                                    <label class="currency-picker__wrapper">
                                        <select class="currency-picker" name="currencies"
                                                style="display: inline; width: auto; vertical-align: middle; margin-top: -25px !important;">
                                            <option value="NAIRA" selected="selected">NAIRA</option>
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                        </select>
                                    </label>
                                    <div class="pull-right currency-Picker">
                                        <a class="dropdown-toggle" href="#" title="NAIRA">NAIRA</a>
                                        <ul class="drop-left dropdown-content">
                                            <li><a href="#" title="NAIRA" data-value="NAIRA">NAIRA</a></li>
                                            <li><a href="#" title="USD" data-value="USD">USD</a></li>
                                            <li><a href="#" title="EUR" data-value="EUR">EUR</a></li>
                                            <li><a href="#" title="YUAN" data-value="YUAN">YUAN</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="toplinks-wrapper">
                        </ul>
                        <div class="telephone d-none d-lg-block">
                            <i class="fa fa-phone-square"></i> Hotline:
                            <a href="tel:0129%20925%209901" style="color: #ffffff !important;">0129 925
                                9901</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-center">
            <div class="container">
                <div class="row">
                    <div class="navbar-logo col-xl-2 col-lg-2 d-none d-lg-block">
                        <div class="site-header-logo title-heading" itemscope itemtype="http://schema.org/Organization">
                            <a href="index.php" itemprop="url" class="site-header-logo-image">
                                <img src="assets/images/logo_149x.png?v=1566553564"
                                     srcset="assets/images/logo_149x.png?v=1566553564"
                                     alt="Ojarh.com"
                                     itemprop="logo">
                            </a>
                        </div>
                    </div>
                    <div class="bottom2 col-xl-7 col-lg-8 d-none d-lg-block mx-auto" style="padding-top: 20px !important;">
                        <div class="header-search">
                            <div class="search-header-w">
                                <div class="btn btn-search-mobi hidden">
                                    <i class="fa fa-search"></i>
                                </div>
                                <div class="form_search">
                                    <form class="formSearch" action="/search" method="get">
                                        <input type="hidden" name="type" value="product">
                                        <input class="form-control" type="search" name="q" value=""
                                               placeholder="Enter keywords here... " autocomplete="off"/>
                                        <button class="btn btn-search btn-danger" type="submit"
                                                style="font-size: 12px; font-weight: bold;">
                                            <span class="btnSearchText d-none ">GO OJARH</span>
                                            GO OJARH
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if(!empty($_SESSION['userid']) && !empty($_SESSION['role'])){
                    ?>
                    <div class="middle-right col-xl-3 col-lg-2 d-none d-lg-block pt-lg-3">
                        <div class="minicart-header">
                            <a href="/cart" class="site-header__carts shopcart dropdown-toggle">
                            <span class="cart_ico">
                                <img width="52" class="rounded-circle"
                                     src="seller/images/avatars/avatar.jpg" alt="">
                            </span>
                                <span class="cart_info">
                                    <span class="cart-title"><span class="title-cart"><?php echo ucfirst($userDetails->username); ?></span>
                                </span>
                            </span>
                            </a>
                            <?php if($_SESSION['role'] == 'Seller'){ ?>
                                <div class="block-content dropdown-content" style="display: none;">
                                    <div class="no-items">
                                        <p class="text-continue btn"><a href="seller/index.php">Dashboard</a></p>
                                        <p class="text-continue btn"><a href="seller/messaging.php">Message</a></p>
                                        <p class="text-continue btn"><a href="seller/personal_setting.php">Setting</a></p>
                                        <p class="text-continue btn"><a href="api/controllers/logout.php">Sign Out</a></p>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="block-content dropdown-content" style="display: none;">
                                    <div class="no-items">
                                        <p class="text-continue btn"><a href="buyer/index.php">Dashboard</a></p>
                                        <p class="text-continue btn"><a href="buyer/messaging.php">Message</a></p>
                                        <p class="text-continue btn"><a href="buyer/personal_setting.php">Setting</a></p>
                                        <p class="text-continue btn"><a href="api/controllers/logout.php">Sign Out</a></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } else {?>
                    <div class="middle-right col-xl-3 col-lg-2 d-none d-lg-block" style="padding-top: 20px !important;">
                        <div class="my-account">
                            <div class="s-login">
                                <a href="signin.php">
                                    <button class="btn btn-danger btn-lg"><small>Login</small></button>
                                </a>
                                <a href="signup.php">
                                    <button class="btn btn-ouline-warning btn-lg"><small>Register</small></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="header-mobile d-lg-none">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="logo-mobiles">
                        <div class="site-header-logo title-heading" itemscope itemtype="http://schema.org/Organization">

                            <a href="#" itemprop="url" class="site-header-logo-image">
                                <img src="assets/images/logo_120x@3x.png?v=1566553564"
                                     srcset="assets/images/logo_120x@3x.png?v=1566553564"
                                     alt="RT AaShop demo"
                                     itemprop="logo">
                            </a>

                        </div>
                    </div>
                    <div class="group-nav">
                        <div class="group-nav__ico group-nav__menu">
                            <div class="mob-menu">
                                <i class="material-icons">&#xE8FE;</i>
                            </div>
                        </div>
                        <div class="group-nav__ico group-nav__search no__at">
                            <div class="btn-search-mobi dropdown-toggle">
                                <i class="material-icons">&#xE8B6;</i>
                            </div>
                            <div class="form_search dropdown-content" style="display: none;">
                                <form class="formSearch" action="/search" method="get">
                                    <input type="hidden" name="type" value="product">
                                    <input class="form-control" type="search" name="q" value=""
                                           placeholder="Enter keywords here... " autocomplete="off"/>
                                    <button class="btn btn-search" type="submit"
                                            style="font-size: 12px; font-weight: bold;">
                                        <span class="btnSearchText hidden">GO OJARH</span>
                                        GO OJARH
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="group-nav__ico group-nav__account no__at">
                            <a href="#" class="dropdown-toggle">
                                <i class="material-icons">&#xE7FF;</i>
                            </a>
                            <ul class="dropdown-content dropdown-menu sn">
                                <li class="s-login"><i class="fa fa-user"></i><a href="signin.php"
                                                                                 class="customer_login_link">Login</a>
                                </li>
                                <li><a href="/pages/wishlist" title="My Wishlist"><i class="fa fa-heart"></i>My Wishlist</a>
                                </li>
                                <li><a href="/account/addresses" title=""><i class="fa fa-book"></i>Order History</a>
                                </li>
                                <li><a href="/checkout" title="Checkout"><i class="fa fa-external-link-square" aria-hidden="true"></i>Checkout</a></li>
                                <li><a href="#" title="buy on credit"><i class="fa fa-address-card-o"></i>Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="group-nav__ico group-nav__cart no__at">
                            <?php if (isset($_SESSION['userid']) && isset($_SESSION['role'])) {
                                ?>
                                <div class="minicart-header">
                                    <a href="/cart" class="site-header__carts shopcart dropdown-toggle">
                                        <span class="cart_ico" style="padding-left: 20px;"><img width="42" class="rounded-circle" src="seller/images/avatars/1.jpg" alt=""></span><br>
                                        <span class="cart_info"><span class="cart-title"><span class="title-cart"><?php echo ucfirst($userDetails->username); ?></span></span></span>
                                    </a>
                                     <?php if($_SESSION['role'] == 'Seller'){ ?>
                                        <div class="block-content dropdown-content" style="display: none;">
                                            <div class="no-items">
                                                <p class="text-continue btn"><a href="seller/index">Dashboard</a></p>
                                                <p class="text-continue btn"><a href="seller/message">Message</a></p>
                                                <p class="text-continue btn"><a href="seller/Setting">Setting</a></p>
                                                <p class="text-continue btn"><a href="api/controllers/logout">Sign Out</a></p>
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="block-content dropdown-content" style="display: none;">
                                            <div class="no-items">
                                                <p class="text-continue btn"><a href="index">Dashboard</a></p>
                                                <p class="text-continue btn"><a href="buyer/message">Message</a></p>
                                                <p class="text-continue btn"><a href="buyer/Setting">Setting</a></p>
                                                <p class="text-continue btn"><a href="api/controllers/logout">Sign Out</a></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php } else { ?>
                                <div class="my-account">
                                    <div class="s-login">
                                        <a href="signin.php">
                                            <button class="btn btn-outline-success btn-sm">Login</button>
                                        </a>
                                        <a href="signup.php">
                                            <button class="btn btn-ouline-warning btn-sm">Register</button>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="vertical_menu col-xl-2 col-lg-3">
                        <div id="shopify-section-ss-vertical-menu" class="shopify-section">
                            <div class="widget-verticalmenu">
                                <div class="vertical-content">
                                    <div class="navbar-vertical">
                                        <button style="background: rgba(0,0,0,0)" type="button" id="show-verticalmenu"
                                                class="navbar-toggles">
                                            <i class="fa fa-bars"></i>
                                            <span class="title-nav">All Categories</span>
                                        </button>
                                    </div>
                                    <div class="vertical-wrapper" style="background: url(assets/images/no-image-2048-5e88c1b20e087fb7bbe9a3771824e743c244f437e4f8ba93bbf7b11b53f7824c.gif)">
                                        <div class="menu-remove d-block d-lg-none">
                                            <div class="close-vertical"><i class="material-icons">&#xE14C;</i></div>
                                        </div>
                                        <ul class="vertical-group">
                                            <?php $userClass->sub_main_state(); ?>
                                            <!-- <li class="vertical-item level1 toggle-menu vertical_drop css_parent">
                                                <a class="menu-link" href="/collections/pet-supplies">
                                                    <span class="icon_items"><i class="fa fa-sun-o"></i></span>
                                                    <span class="menu-title">Pet Supplies</span>
                                                    <span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                                </a>
                                                <ul class="vertical-drop drop-css drop-lv1 sub-menu" style="width:220px; ">
                                                    <li class="vertical-item sub-dropdown toggle-menu">
                                                        <a class="menu-link" href="/collections/frontpage" title="">Clothing<span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                                        <ul class="vertical-drop drop-lv2 dropdown-content sub-menu">
                                                            <li class="vertical-item level2 "><a href="/collections/electronics-computer" title="">Electronics& Computer</a></li>
                                                            <li class="vertical-item level2 "><a href="/collections/fashion" title="">Fashion</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="vertical-item sub-dropdown toggle-menu">
                                                        <a class="menu-link" href="/collections/fashion" title="">Fashion<span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                                        <ul class="vertical-drop drop-lv2 dropdown-content sub-menu">
                                                            <li class="vertical-item level2 "><a href="/collections/home-garden-tools" title="">Home, Garden & Tools</a></li>
                                                            <li class="vertical-item level2 "><a href="/collections/electronics-computer" title="">Electronics & Computer</a></li>
                                                            <li class="vertical-item level2 "><a href="/collections/frontpage" title="">Clothing</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="vertical-item sub-dropdown toggle-menu">
                                                        <a class="menu-link" href="/collections/hot-deal" title="">Hot deal<span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                                        <ul class="vertical-drop drop-lv2 dropdown-content sub-menu">
                                                            <li class="vertical-item level2 "><a href="/collections/sports-outdoors" title="">Sports & Outdoors</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li> -->
                                            <li class="last all_cate">
                                                <a href="search_result.php?categoryid=" title="More Categories">More Categories</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="vertical-screen d-block d-lg-none">&nbsp;</div>
                        </div>
                    </div>
                    <div class="horizontal_menu col-xl-7 col-lg-8">
                        <div id="shopify-section-ss-mainmenu" class="shopify-section">
                            <div class="main-megamenu d-none d-lg-block">
                                <nav class="main-wrap">
                                    <ul class="main-navigation nav hidden-tablet hidden-sm hidden-xs">
                                        <li class="ss_menu_lv1 menu_item">
                                            <a href="/pages/about-us" title="">
                                                <span class="ss_megamenu_title">Dispute Center</span>
                                            </a>
                                        </li>
                                        <li class="ss_menu_lv1 menu_item">
                                            <a href="/pages/contact-us" title="">
                                                <span class="ss_megamenu_title">International Market</span>
                                            </a>
                                        </li>
                                        <li class="ss_menu_lv1 menu_item">
                                            <a href="/blogs/news" title="">
                                                <span class="ss_megamenu_title">Local Market</span>
                                            </a>
                                        </li>
                                        <li class="ss_menu_lv1 menu_item menu_item_drop arrow">
                                            <a href="#" title=""><span class="ss_megamenu_title">Agents</span></a>
                                            <div class="ss_megamenu_dropdown megamenu_dropdown width-custom right">
                                                <ul class="tt-megamenu-submenu">
                                                    <li><a href="all_agents.php"><span style="font-size: 15px;" class="text-danger"><strong>All Agents</strong></span></a></li>
                                                    <li><a data-toggle="modal" data-target=".registerAgent" style="cursor: pointer;"><span style="font-size: 16px;" class="text-danger"><strong>Become and Agents</strong></span></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="navigation-mobile mobile-menu d-block d-lg-none">
                                <div class="logo-nav">
                                    <a href="#" class="site-header-logo-image">
                                        <img src="assets/images/logo_161x.png?v=1566553564"
                                             srcset="assets/images/logo_161x.png?v=1566553564"
                                             alt="RT AaShop demo">
                                    </a>
                                    <div class="menu-remove">
                                        <div class="close-megamenu"><i class="material-icons">clear</i></div>
                                    </div>
                                </div>
                                <ul class="site_nav_mobile active_mobile">
                                    <li class="menu-item toggle-menu active ">
                                        <a href="#" title="" class="ss_megamenu_title">
                                            Home
                                            <span class="caret"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                        </a>
                                        <div class="sub-menu">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">
                                                    <div class="mega-page">
                                                        <div class="feature-layout">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                                                     style="text-align: center; padding: 0 10px 15px;">
                                                                    <a href="https://rt-aashop-demo.myshopify.com/?preview_theme_id=42559406115"
                                                                       class="image-link" target="_self">
                                                                        <div class="thumbnail">
                                                                            <img class="img-responsive lazyload"
                                                                                 data-sizes="auto"
                                                                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                 data-src="assets/images/home1.png?301"
                                                                                 alt=""> <span
                                                                                    class="btn">View More</span>
                                                                        </div>
                                                                        <h3 class="caption">Home 1</h3>
                                                                    </a></div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                                                     style="text-align: center; padding: 0 10px 15px;">
                                                                    <a href="https://rt-aashop-demo.myshopify.com/?preview_theme_id=42559471651"
                                                                       class="image-link" target="_self">
                                                                        <div class="thumbnail">
                                                                            <img class="img-responsive lazyload"
                                                                                 data-sizes="auto"
                                                                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                 data-src="assets/images/home2.png?301"
                                                                                 alt=""> <span
                                                                                    class="btn">View More</span>
                                                                        </div>
                                                                        <h3 class="caption">Home 2</h3>
                                                                    </a></div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                                                     style="text-align: center; padding: 0 10px 15px;">
                                                                    <a href="https://rt-aashop-demo.myshopify.com/?preview_theme_id=42559504419"
                                                                       class="image-link" target="_self">
                                                                        <div class="thumbnail">
                                                                            <img class="img-responsive lazyload"
                                                                                 data-sizes="auto"
                                                                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                 data-src="assets/images/home3.png?301"
                                                                                 alt=""> <span
                                                                                    class="btn">View More</span>
                                                                        </div>
                                                                        <h3 class="caption">Home 3</h3>
                                                                    </a></div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                                                     style="text-align: center; padding: 0 10px 15px;">
                                                                    <a href="https://rt-aashop-demo.myshopify.com/?preview_theme_id=42641850403"
                                                                       class="image-link" target="_self">
                                                                        <div class="thumbnail">
                                                                            <img class="img-responsive lazyload"
                                                                                 data-sizes="auto"
                                                                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                 data-src="assets/images/boxed.png?301"
                                                                                 alt=""> <span
                                                                                    class="btn">View More</span>
                                                                        </div>
                                                                        <h3 class="caption">Boxed</h3>
                                                                    </a></div>
                                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
                                                                     style="text-align: center; padding: 0 10px 15px;">
                                                                    <a href="https://rt-aashop-demo.myshopify.com/?preview_theme_id=42641817635"
                                                                       class="image-link" target="_self">
                                                                        <div class="thumbnail">
                                                                            <img class="img-responsive lazyload"
                                                                                 data-sizes="auto"
                                                                                 src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                                                 data-src="assets/images/rtl.png?301"
                                                                                 alt=""> <span
                                                                                    class="btn">View More</span>
                                                                        </div>
                                                                        <h3 class="caption">RTL</h3>
                                                                    </a></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </li>


                                    <li class="menu-item toggle-menu ">
                                        <a href="#" title="" class="ss_megamenu_title">
                                            Features
                                            <span class="caret"><i class="fa fa-angle-down"
                                                                   aria-hidden="true"></i></span>
                                        </a>
                                        <div class="sub-menu">
                                            <div class="row">
                                                <div class="col-lg-12 col-12">

                                                    <div class="mega-page">
                                                        <div class="row shop_page">
                                                            <div class="col-lg-3 col-12">
                                                                <div class="megatitle"><a
                                                                            href="https://rt-aashop-demo.myshopify.com/collections"
                                                                            class="title-shoppage">COLLECTION STYLES</a>
                                                                </div>
                                                                <ul class="tt-megamenu-submenu">
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/collections/frontpage/?preview_theme_id=42559406115"><span>With Left Sidebar</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/collections/frontpage/?preview_theme_id=42559471651"><span>With Right Sidebar</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/collections/frontpage/?preview_theme_id=42559504419"><span>Without Sidebar</span></a>
                                                                    </li>
                                                                    <!-- <li><a href="https://rt-aashop-demo.myshopify.com/colleactions/frontpage/?preview_theme_id=37077286975"><span>With Scrolling</span></a></li>
                                                                    <li><a href="https://rt-aashop-demo.myshopify.com/collections/frontpage/?preview_theme_id=37208129599"><span>With Loadmore</span></a></li>
                                                                    <li><a href="https://rt-aashop-demo.myshopify.com/collections/frontpage/?view=list"><span>Collection List</span></a></li> -->
                                                                    <li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3 col-12">
                                                                <div class="megatitle"><a
                                                                            href="https://rt-aashop-demo.myshopify.com/products/all"
                                                                            class="title-shoppage">PRODUCT STYLES</a>
                                                                </div>
                                                                <ul class="tt-megamenu-submenu">
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/boudin-cowaute/?preview_theme_id=42559406115"><span>Product Left Sidebar</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/boudin-cowaute/?preview_theme_id=42559471651"><span>Product Right Sidebar</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/boudin-cowaute/?preview_theme_id=42559504419"><span>Product Without Sidebar</span></a>
                                                                    </li>
                                                                    <!-- <li><a href="https://rt-aashop-demo.myshopify.com/products/boudin-cowaute/?preview_theme_id=37077286975"><span>Product Scroll Media</span></a></li> -->
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/boudin-cowaute/?preview_theme_id=42559406115"><span>Tabs Vertical</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/boudin-cowaute/?preview_theme_id=42559471651"><span>Tabs Horizontal</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3 col-12">
                                                                <div class="megatitle"><a
                                                                            href="https://rt-aashop-demo.myshopify.com/products/copy-of-cotton-linen-cardigan"
                                                                            class="tt-title-submenu">PRODUCT TYPES</a>
                                                                </div>
                                                                <ul class="tt-megamenu-submenu">
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/3-piece-suit"><span>Simple Product</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/audio-theater"><span>Varians Product</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/capicola-brisket"><span>New Product</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/copy-of-pastrami-meatloaf-pance"><span>Sale Product</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="https://rt-aashop-demo.myshopify.com/products/copy-of-doner-ham-nulla"><span>Sold Out Product</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-lg-3 col-12">
                                                                <div class="megatitle"><a
                                                                            href="https://rt-aashop-demo.myshopify.com/pages/about"
                                                                            class="tt-title-submenu">PAGE OTHERS</a>
                                                                </div>
                                                                <ul class="tt-megamenu-submenu">
                                                                    <li>
                                                                        <a href="#"><span>Cart</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><span>Track Order</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><span>Order History</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><span>Checkout</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="signin.php"><span>Account</span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="signup.php"><span>Register</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-item toggle-menu ">
                                        <a href="#" title="" class="ss_megamenu_title">
                                            Shop
                                            <span class="caret"><i class="fa fa-angle-down"
                                                                   aria-hidden="true"></i></span>
                                        </a>
                                        <div class="sub-menu">
                                            <div class="row">
                                                <div class="col-lg-12 col-12 spaceMega">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a class="megatitle" href="/collections/frontpage" title="">
                                                                Clothing<span class="caret"><i class="fa fa-angle-down"
                                                                                               aria-hidden="true"></i></span>
                                                            </a>
                                                            <ul class="sub-menu">
                                                                <li class="menu-item ">
                                                                    <a href="/collections/electronics-computer"
                                                                       title="">Electronics & Computer</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/hot-deal" title="">Hot
                                                                        deal</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/sports-outdoors" title="">Sports
                                                                        & Outdoors</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/sports-outdoors" title="">Sports
                                                                        & Outdoors</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/electronics-computer"
                                                                       title="">Electronics & Computer</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-12">
                                                            <a class="megatitle" href="/collections/fashion" title="">
                                                                Fashion<span class="caret"><i class="fa fa-angle-down"
                                                                                              aria-hidden="true"></i></span>
                                                            </a>
                                                            <ul class="sub-menu">
                                                                <li class="menu-item ">
                                                                    <a href="/collections/sport" title="">sport</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/electronics-computer"
                                                                       title="">Electronics & Computer</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/home-garden-tools" title="">Home,
                                                                        Garden & Tools</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/home-garden-tools-1" title="">Home,
                                                                        garden & tools</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/sports-outdoors" title="">Sports
                                                                        & Outdoors</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-12">
                                                            <a class="megatitle" href="/collections/sport" title="">
                                                                sport<span class="caret"><i class="fa fa-angle-down"
                                                                                            aria-hidden="true"></i></span>
                                                            </a>
                                                            <ul class="sub-menu">
                                                                <li class="menu-item ">
                                                                    <a href="/collections/electronics-computer"
                                                                       title="">Electronics & Computer</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/home-garden-tools" title="">Home,
                                                                        Garden & Tools</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/frontpage"
                                                                       title="">Clothing</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/sports-outdoors" title="">Sports
                                                                        & Outdoors</a>
                                                                </li>
                                                                <li class="menu-item ">
                                                                    <a href="/collections/sports-outdoors" title="">Sports
                                                                        & Outdoors</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col_banner col-lg-4 col-12 spaceMega">
                                                    <div class="first">
                                                        <a href="/collections/electronics">
                                                            <img class="img-responsive" alt="RT AaShop demo"
                                                                 src="assets/images/image-1.png?v=1566640561"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col_banner col-lg-4 col-12 spaceMega">
                                                    <div class="first">
                                                        <a href="/collections/cameras-photo">
                                                            <img class="img-responsive" alt="RT AaShop demo"
                                                                 src="assets/images/image-2.png?v=1566640568"/>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col_banner col-lg-4 col-12 spaceMega">
                                                    <div class="first">
                                                        <a href="/collections/new-arrivals">
                                                            <img class="img-responsive" alt="RT AaShop demo"
                                                                 src="assets/images/image-3.png?v=1566640581"/>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-item ">
                                        <a href="/pages/about-us" title="">
                                            <span class="ss_megamenu_title">About Us</span>
                                        </a>
                                    </li>
                                    <li class="menu-item ">
                                        <a href="/pages/contact-us" title="">
                                            <span class="ss_megamenu_title">Contact Us</span>
                                        </a>
                                    </li>
                                    <li class="menu-item ">
                                        <a href="/blogs/news" title="">
                                            <span class="ss_megamenu_title">News</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-screen d-block d-lg-none">&nbsp;</div>
                        </div>
                    </div>

                    <div class="bottom3 row d-none d-xl-block">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="minicart-header">
                                        <a href="#" class="site-header__carts shopcart dropdown-toggle">
                                            <span class="cart_info">
                                              <span class="cart-title" title="Your Wishlist"><i
                                                          class="fa fa-cart-plus fa-2x"
                                                          style="color: #ffffff !important; padding-top: 5px;"></i></span>
                                            </span>
                                        </a>

                                        <div class="block-content dropdown-content" style="display: none;">

                                            <div class="block-inner has-items" style="display: block;">
                                                <div class="head-minicart">
                                                    <span class="label-products">Your Products</span>
                                                </div>

                                                <ol id="minicart-sidebar" class="mini-products-list">

                                                    <li class="item" data-product_id="15567029436451">
                                                    </li>

                                                    <div id="cart_items"></div>

                                                </ol>

                                                <div class="bottom-action actions">
                                                    <div class="button-wrapper">
                                                        <a href="/checkout" class="link-button btn-checkout" title="Checkout">Checkout</a>
                                                        <div style="clear:both;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="minicart-header">
                                        <a href="/blog" class="site-header__carts shopcart dropdown-toggle">
                                            <span class="cart_info">
                                                  <span class="cart-title" title="Our Blog" style="color: #ffffff !important; font-size: 14px !important; padding-top: 10px;">Blog</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="minicart-header">
                                        <a href="contact.php" class="site-header__carts shopcart">
                                            <span class="cart_info">
                                                  <span class="cart-title" title="Contact OJARH.com" style="color: #ffffff !important; font-size: 14px !important; padding-top: 10px;">Contact</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="quick-view"></div>
    <div class="page-container" id="PageContainer">
        <div class="main-content" id="MainContent">

