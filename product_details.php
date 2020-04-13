<?php require_once 'inc/header.php'; ?>

<?php
  if(isset($_GET['productid'])){
    $productDetails = $userClass->get_product_details($_GET['productid']);
    $categorydetails = $userClass->get_category_id($productDetails->product_category);
    $vendorDetails = $userClass->userDetails($productDetails->userid);
    $vendorBizDetails = $userClass->bizDetails($productDetails->userid);

    $productPack0 = $productDetails->pack0;
    $productPack1 = $productDetails->pack1;
    $productPack2 = $productDetails->pack2;
    $productPack3 = $productDetails->pack3;
    $productPack4 = $productDetails->pack4;
    $productPack5 = $productDetails->pack5;
    $productPack6 = $productDetails->pack6;
    $productPack7 = $productDetails->pack7;
    $productPack8 = $productDetails->pack8;

    $images = [];

    for($x = 0; $x < 7; $x++)
    {
      if($productDetails->{"img".$x})
      {
        $images[] = "seller/productimg/".$productDetails->productid."/".$productDetails->{"img".$x};
      }
    }

    // $productPack0 = explode("+", $productPack0);
    // $productPack1 = explode("+", $productPack1);
    // $productPack2 = explode("+", $productPack2);
    // $productPack3 = explode("+", $productPack3);
    // $productPack4 = explode("+", $productPack4);
    // $productPack5 = explode("+", $productPack5);
    // $productPack6 = explode("+", $productPack6);
    // $productPack7 = explode("+", $productPack7);
    // $productPack8 = explode("+", $productPack8);

    // $productPacks = [$productPack0[0], $productPack1[0], $productPack2[0], $productPack3[0], $productPack4[0], $productPack5[0], $productPack6[0], $productPack7[0], $productPack8[0]];
    $productPacks = [$productPack0, $productPack1, $productPack2, $productPack3, $productPack4, $productPack5, $productPack6, $productPack7, $productPack8];
   }else{
    echo '<script> location.replace("index.php"); </script>';
   }
?>

<section id="breadcrumbs" class=" breadcrumbbg">
  <div class="breadcrumbwrapper">
    <div class="container">
      <nav>
        <ol class="breadcrumb">
          <li>
            <a href="index.php" title="Back to the frontpage">
              <span itemprop="name">Home</span>
            </a>
          </li>
          <li>
            <a href="category_list.php?categoryid=<?php echo $categorydetails->catid; ?>" title="Category List">
              <span itemprop="name"><?php echo $productDetails->product_category; ?></span>
            </a>
          </li>
          <li class="active">
            <span><span itemprop="name"><?php echo $productDetails->product_title; ?></span></span>
          </li>
        </ol>
      </nav>
    </div>
  </div>
</section>
<div class="container positon-sidebar">
  <div class="row">
    <div class="col-sidebar sidebar-fixed col-lg-3">
      <span id="close-sidebar" class="btn-fixed d-lg-none"><i class="fa fa-times"></i></span>
        <div class="block block-category spaceBlock">
            <h3 class="block-title">
                Categories
            </h3>
            <div class="widget-content">
                <ul class="toggle-menu list-menu">
                    <?php $userClass->get_all_category_list(); ?>
                </ul>
            </div>
        </div>
      <!-- <div class="block sidebar-html">
        <h3 class="block-title"><strong><span>Custom Services</span></strong></h3>
        <div class="widget-content">
          <div class="rte-setting">
              <div class="services-sidebar">
                  <ul>
                      <li>
                          <div class="service-content">
                              <div class="service-icon" style="font-size: 30px;">
                                  <em class="fa fa-truck"></em>
                              </div>

                              <div class="service-info">
                                  <h4><a href="#" title="Free Delivery">Free Delivery</a></h4>
                                  <p>From $59.89</p>
                              </div>
                          </div>
                      </li>

                      <li>
                          <div class="service-content">
                              <div class="service-icon" style="font-size: 30px;">
                                  <em class="fa fa-support"></em>
                              </div>

                              <div class="service-info">
                                  <h4><a href="#" title="Support 24/7">Support 24/7</a></h4>
                                  <p>Online 24 hours</p>
                              </div>
                          </div>
                      </li>

                      <li>
                          <div class="service-content">
                              <div class="service-icon" style="font-size: 30px;">
                                  <em class="fa fa-refresh"></em>
                              </div>

                              <div class="service-info">
                                  <h4><a href="#" title="Free return">Free return</a></h4>
                                  <p>365 a day</p>
                              </div>
                          </div>
                      </li>

                      <li>
                          <div class="service-content">
                              <div class="service-icon" style="font-size: 25px; position: relative; top: 4px;">
                                  <em class="fa fa-cc-paypal"></em>
                              </div>

                              <div class="service-info">
                                  <h4><a href="#" title="payment method">payment method</a></h4>
                                  <p>Secure payment</p>
                              </div>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
        </div>
      </div> -->
      <div class="block sidebar-banner spaceBlock banners">
        <div>
          <a href="/collections/furniture" title="">
            <img class="img-responsive lazyload" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0051/3130/4995/t/2/assets/icon-loadings.svg?466" alt="files/sidebar-banner.png" data-src="//cdn.shopify.com/s/files/1/0051/3130/4995/files/sidebar-banner.png?v=1566793019" />
          </a>
        </div>
      </div>
    </div>
    <div class="sidebar-overlay"></div>
    <div class="col-main col-lg-9 col-12">
      <a href="javascript:void(0)" class="open-sidebar d-lg-none"><i class="fa fa-bars"></i> Sidebar</a>
      <div id="shopify-section-product-template" class="shopify-section main-product">
        <script src="//cdn.shopify.com/s/files/1/0051/3130/4995/t/2/assets/jquery.elevateZoom.min.js?466" type="text/javascript"></script>
        <script src="//cdn.shopify.com/s/assets/themes_support/option_selection-fe6b72c2bbdd3369ac0bfefe8648e3c889efca213baefd4cfb0dd9363563831f.js" type="text/javascript"></script>
        <div id="ProductSection-product-template" class="product-template__containe product" itemscope itemtype="http://schema.org/Product">
        <meta itemprop="name" content="Altra Blackburn Storage  Bookcase">
        <meta itemprop="url" content="https://rt-aashop-demo.myshopify.com/products/altra-blackburn-storage-bookcase">
        <meta itemprop="image" content="//cdn.shopify.com/s/files/1/0051/3130/4995/products/5_da5c7bb1-0802-4590-a6ea-35a460703e06_800x.jpg?v=1566544529">
        <div class="product-single ">
          <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 col-12  horizontal">
              <div class=" product-media thumbnais-bottom">
                <div class="product-photo-container slider-for horizontal slick-initialized slick-slider">
                  <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 2076px;">
                      <div class="thumb slick-slide" data-slick-index="0" aria-hidden="true" style="transition: opacity 500ms ease 0s; width: 346px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0;">
                        <a class="fancybox" rel="gallery1" href="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_1024x.png?v=1566616461">
                          <img id="product-featured-image-11504765861923" class="product-featured-img" src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_1024x1024.png?v=1566616461" alt="shoes" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_1024x1024.png?v=1566616461">
                        </a>
                      </div>
                    <div class="thumb slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" style="width: 346px; position: relative; left: -346px; top: 0px; z-index: 999; opacity: 1;">
                      <a class="fancybox" rel="gallery1" href="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_1024x.png?v=1566616462">
                        <img id="product-featured-image-11504766517283" class="product-featured-img" src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_1024x1024.png?v=1566616462" alt="shoes" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_1024x1024.png?v=1566616462">
                      </a>
                    </div>
                  </div>
                </div>
                </div>
                <div class="slider-nav horizontal slick-initialized slick-slider" id="gallery_01"><div class="slick-prev slick-arrow" style="display: block;"><i class="fa fa-angle-left"></i></div>
                  <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1424px; transform: translate3d(-445px, 0px, 0px);"><div class="item slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_1024x1024.png?v=1566616464" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_1024x1024.png?v=1566616464">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_100x100.png?v=1566616464" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_1024x1024.png?v=1566616466" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_1024x1024.png?v=1566616466">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_100x100.png?v=1566616466" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_1024x1024.png?v=1566616469" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_1024x1024.png?v=1566616469">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_100x100.png?v=1566616469" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_1024x1024.png?v=1566616471" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_1024x1024.png?v=1566616471">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_100x100.png?v=1566616471" alt="shoes">
                    </a>
                  </div><div class="item slick-slide" data-slick-index="0" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_1024x1024.png?v=1566616461" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_1024x1024.png?v=1566616461">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_100x100.png?v=1566616461" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_1024x1024.png?v=1566616462" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_1024x1024.png?v=1566616462">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_100x100.png?v=1566616462" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_1024x1024.png?v=1566616464" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_1024x1024.png?v=1566616464">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_100x100.png?v=1566616464" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_1024x1024.png?v=1566616466" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_1024x1024.png?v=1566616466">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_100x100.png?v=1566616466" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_1024x1024.png?v=1566616469" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_1024x1024.png?v=1566616469">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_100x100.png?v=1566616469" alt="shoes">
                    </a>
                  </div><div class="item slick-slide" data-slick-index="5" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_1024x1024.png?v=1566616471" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_1024x1024.png?v=1566616471">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_100x100.png?v=1566616471" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_1024x1024.png?v=1566616461" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_1024x1024.png?v=1566616461">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product5_caf5557d-dd2f-4860-8954-0f609e16226e_100x100.png?v=1566616461" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_1024x1024.png?v=1566616462" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_1024x1024.png?v=1566616462">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product6_136c87fc-08af-42cd-acf9-c93e134bf78a_100x100.png?v=1566616462" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_1024x1024.png?v=1566616464" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_1024x1024.png?v=1566616464">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product7_6fd4113e-3d1a-411a-ac04-01b523707fbb_100x100.png?v=1566616464" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_1024x1024.png?v=1566616466" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_1024x1024.png?v=1566616466">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_7b571be1-af8d-4c3f-accc-7a8560638ec7_100x100.png?v=1566616466" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_1024x1024.png?v=1566616469" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_1024x1024.png?v=1566616469">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product9_1fb8b52b-95dc-48a0-9ace-d3792ca81531_100x100.png?v=1566616469" alt="shoes">
                    </a>
                  </div><div class="item slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" style="width: 89px;">
                    <a class="thumb" href="javascript:void(0)" data-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_1024x1024.png?v=1566616471" data-zoom-image="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_1024x1024.png?v=1566616471">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product10_100x100.png?v=1566616471" alt="shoes">
                    </a>
                  </div></div></div>
                <div class="slick-next slick-arrow" style="display: block;"><i class="fa fa-angle-right"></i></div></div>
              </div>
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-12 product-single__detail grid__item ">
              <div class="product-single__meta">
                <h1 itemprop="name" class="product-single__title"><?php echo $productDetails->product_title; ?></h1>
                <div class="custom-reviews a-left hidden-xs d-flex justify-content-between">
                  <span class="shopify-product-reviews-badge" data-id="1871372910627"></span>
                </div>
                <div class="product-info">
                  <p class="product-single__alb instock"><label>Availability</label>: <?php if($productDetails->productavailability == 'In Stock'){ echo '<i class="fa fa-check-square-o"></i> ' . $productDetails->productavailability; }else{ echo '<i class="fa fa-times-o"></i> ' . $productDetails->productavailability; } ?></p>
                  <p class="product-single__type"><label>Product Category</label>:  <a href="category_list.php?categoryid=<?php echo $categorydetails->catid; ?>" title="Category List"><?php echo $productDetails->product_category; ?></a></p>
                  <p itemprop="brand" class="product-single__vendor"><label>Vendor</label>: <a href="seller_details.php?sellerid=<?php echo $vendorBizDetails->userid; ?>" title="Home2"><?php echo ucfirst($vendorBizDetails->bizname).'[  '.Ucfirst($vendorDetails->username).' ]'; ?></a></p>
                </div>
                <div class="clearfix"  >
                  <meta itemprop="priceCurrency" content="USD">
                  <link itemprop="availability" href="http://schema.org/InStock">
                </div>
                <div>
                    <div class="product-options-bottom">
                      <div class="product-form__item product-form__item--quantity pt-1">
                        <label for="Quantity" class="quantity-selector">Pack Type</label>
                        <div class="form_qty">
                          <select class="form-control">
                            <option>Choose...</option>
                            <?php
                              foreach($productPacks as $productPack){
                                $productPack22 = explode("+", $productPack);
                                if($productPack22[0] == 0){}else{ echo '<option>'.$productPack22[0].'</option>';}
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="product-form__item product-form__item--quantity">
                        <label for="Quantity" class="quantity-selector">Qty:</label>
                        <div class="form_qty">
                          <input type="text" id="qty" name="quantity" value="1" min="1" class="quantity-selector">
                          <div class="inline">
                            <div class="increase items" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++; updatePricing(); return false;"></div>
                            <div class="reduced items" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--; updatePricing(); return false;"></div>
                          </div>
                        </div>
                      </div>
                      <div class="product-form__item product-form__item--submit">
                        <button type="submit" name="add" id="AddToCart-product-template" class="btn product-form__cart-submit product-form__cart-submit--small">
                          <span id="AddToCartText-product-template">
                            Add to cart
                          </span>
                        </button>
                      </div>
                    </div>
                    <input type="hidden" name="form_type" value="product"><input type="hidden" name="utf8" value="✓">
                    <div data-shopify="payment-button" class="shopify-payment-button"><div>
                  </div>
                </div>
                <div class="add-to-wishlist">
                  <div class="default-wishbutton-headphone loading">
                    <a class="add-in-wishlist-js " href="#"><i class="fa fa-heart-o"></i><span class="tooltip-label">Add to wishlist</span></a>
                  </div>
                </div>
                <div class="clearfix product-price">
                  <p class="price-box product-single__price-product-template">
                    <h4>TOTAL:
                        <span id="ProductPrice-product-template">
                        <span class='money text-danger'>$47.00</span>
                      </span>
                    </h4>

                  </p>
                </div>
            </div>
            <div class="clearfix error-message"></div>
                <div class="simpAsk-container" id="simpAskQuestion">
                  <div class="simpAsk-title-container">
                    <h2>QUESTIONS & ANSWERS</h2>
                    <div class="simpAsk-error-msg" style="display:none"></div>
                    <div class="simpAsk-success-msg" style="display:none"></div>
                  </div>
                  <div class="simp-ask-question-header">
                        <div class="simpAskQuestion-Qcontent">
                          <h5>Interested in this product?</h5>
                          <p>Contact seller to purchase in large quantity.</p>
                        </div>
                        <a href="javascript:void(0)" class="simpAskQuestionForm-btnOpen btn button">
                        Message Seller <i class="fa fa-envelope"></i>
                      </a>
                  </div>
                  <div class="simpAskForm-container" id="simpAskForm_container" style="display:none;">
                    <form method="post" action="" id="askQuestion" class="">
                    <input type="hidden" value="contact" name="form_type"/>
                          <div class="">
                                  <input type="hidden" name="simpAskAction" value="askQuestion">
                                  <input type="hidden" id="simpAskProductId" name="simpAskProductId" value="1871372910627">
                                  <textarea required="" style="resize:none; min-height:86px;" name="question" placeholder="Type your question here" title="Please Enter Your Question."></textarea>
                                <input required="" type="text" name="name" value="" placeholder="Your Name" title="Please Enter Your Name here." class="simpAsk-fifty-percent fleft">
                                  <input required="" type="email" name="email" value="" placeholder="Your Email" title="Please Enter Your Email." class="simpAsk-fifty-percent fright">
                          <div class="simpAskSubmitForm">
                            <input class="button button-primary btn btn-primary btn btn--fill btn--color" type="submit" name="submit" value=" Submit">
                            <a href="javascript:void(0)" class="simpAskForm-cancel-btn button">Cancel</a>
                            <div class="clear"></div>
                          </div>
                          </div>
                    </form>
                  </div>
                </div>
                <div class="product-wrap">
                  <div class="wrap__social social_share_detail clearfix">
                    <label class="">Share:</label>
                    <ul>
                      <div class="addthis_inline_share_toolbox"></div>
                      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-529be2200cc72db5"></script>
                    </ul>
                  </div>
                  <!-- <div class="wrap__brand">
                    <label class="">Guaranteed safe checkout:</label>
                    <div class="wrap__brand_content">
                      <img src="//cdn.shopify.com/s/files/1/0051/3130/4995/files/payment.png?v=1566634119" alt="files/payment.png" />
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="panel-group detail-bottom">
            <div class="tab-hozizoltal">
              <ul class="nav nav-tabs font-ct">
                <li class="nav-item"><a class="nav-link active" href="#tabs1" data-toggle="tab">Product Details</a></li>
                <li class="nav-item"><a class="nav-link" href="#tabs2" data-toggle="tab">Shipping &amp; Returns</a></li>
                <li class="nav-item"><a class="nav-link" href="#tabs3" data-toggle="tab">Time &amp; Delivery</a></li>
                <li class="nav-item"><a class="nav-link" href="#tabs4" data-toggle="tab">Reviews</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs1">
                  <div class="rte description">
                    <label  class="d-none">Quick Overview</label>
                    <?php echo html_entity_decode($productDetails->product_description); ?>
                  </div>
                </div>
                <div class="tab-pane" id="tabs2">
                  <?php echo $vendorBizDetails->returnpolicy; ?>
                </div>
                <div class="tab-pane" id="tabs3">
                <?php echo $vendorBizDetails->timedelivery; ?>
                </div>
                <div class="tab-pane" id="tabs4">
                  <div id="shopify-product-reviews" data-id="1871372910627"><style scoped>.spr-container { padding: 24px; border-color: #ECECEC;}.spr-review, .spr-form {border-color: #ECECEC;}</style>
                  <div class="spr-container">
                    <div class="spr-header">
                      <h2 class="spr-header-title">Customer Reviews</h2><div class="spr-summary">
                          <span class="spr-summary-caption">No reviews yet</span><span class="spr-summary-actions">
                          <a href='#' class='spr-summary-actions-newreview' onclick='SPR.toggleForm();return false'>Write a review</a>
                        </span>
                      </div>
                    </div>
                    <div class="spr-content">
                      <div class='spr-form' id='form_1871372910627' style='display: none'></div>
                      <div class='spr-reviews' id='reviews_1871372910627' style='display: none'></div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
<!-- <section class="section-related">
  <div id="related" class="related-products">
    <h3 class="detail-title font-ct"><strong><span>Related Products</span></strong></h3>
  <div class="products-listing grid ss-carousel ss-owl">
    <div class="product-layout owl-carousel" data-nav="true" data-margin="20" data-lazyLoad="true" data-column1="	3" data-column2="	3" data-column3="	3" data-column4="	2" data-column5="	2">
      <div class="">
        <div class="product-item" data-id="product-1873558405155">
          <div class="product-item-container grid-view-item   ">
            <div class="left-block">
              <div class="product-image-container product-image">
                <a class="grid-view-item__link image-ajax" href="/products/3-piece-suit">
                  <img class="img-responsive s-img lazyload" data-sizes="auto" src="//cdn.shopify.com/s/files/1/0051/3130/4995/t/2/assets/product-loading.svg?466" data-src="//cdn.shopify.com/s/files/1/0051/3130/4995/products/product8_fa39984c-ec58-40fc-b5d7-53f930f7368d_large_crop_center.png?v=1566616573" alt="3 piece suit" />
                </a>
              </div>
              <div class="box-labels"></div>
              <div class="button-link">
                <div class="add-to-wishlist">
                    <div class="default-wishbutton-3-piece-suit loading"><a class="add-in-wishlist-js " href="3-piece-suit"><i class="fa fa-heart-o"></i><span class="tooltip-label">Add to wishlist</span></a></div>
                  <div class="loadding-wishbutton-3-piece-suit loading" style="display: none; pointer-events: none"><a class="add_to_wishlist" href="3-piece-suit"><i class="fa fa-circle-o-notch fa-spin"></i></a></div>
                    <div class="added-wishbutton-3-piece-suit loading" style="display: none;"><a class="added-wishlist  add_to_wishlist" href="/pages/wishlist"><i class="fa fa-heart"></i><span class="tooltip-label">View Wishlist</span></a></div>
                </div>
                <div class="btn-button add-to-cart action  ">
                  <form action="/cart/add" method="post" class="variants" data-id="AddToCartForm-1873558405155" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="15567062237219" />
                    <a class="btn-addToCart grl btn_df" href="javascript:void(0)" title="Add to cart"><i class="fa fa-shopping-basket"></i><span class="">Add to cart</span></a>
                  </form>
                </div>
                <div class="quickview-button">
                  <a class="quickview iframe-link d-none d-xl-block btn_df" href="javascript:void(0)" data-variants_id="15567062237219" data-toggle="modal" data-target="#myModal" data-id="3-piece-suit" title="Quick View"><i class="fa fa-search"></i><span class="hidden">Quick View</span></a>
                </div>
              </div>
            </div>
            <div class="right-block">
              <div class="caption">
                <h4 class="title-product text-truncate"><a class="product-name" href="/products/3-piece-suit">3 piece suit</a></h4>
                <div class="custom-reviews">
                  <span class="shopify-product-reviews-badge" data-id="1873558405155"></span>
                </div>
                <div class="price">
                  <span class="visually-hidden">Regular price</span>
                  <span class="price-new"><span class=money>$47.00</span></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section> -->
</div>
</div>
<script>
  var slider = function() {
    if (!$('.slider-for').hasClass('slick-initialized') && !$('.slider-nav').hasClass('slick-initialized')) {
      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: '<div class="slick-next"><i class="fa fa-angle-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left"></i></div>',
        fade: true,
        accessibility:false,
        verticalSwiping: false,
        arrows : false,

        asNavFor: '.slider-nav'
      });

      $('.slider-nav').slick({
        infinite: true,
        slidesToShow: 4,


        slidesToScroll: 1,
        asNavFor: '.slider-for',
        verticalSwiping: false,
        dots: false,

        accessibility:false,
        focusOnSelect: true,


        nextArrow: '<div class="slick-next"><i class="fa fa-angle-right"></i></div>',
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left"></i></div>',


        responsive: [
        {
        breakpoint: 1200,
        settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
                             },

                             {
                             breakpoint: 1024,
                             settings: {
                             slidesToShow: 5,
                             slidesToScroll: 1
                             }
                             },

                             {
                             breakpoint: 768,
                             settings: {
                             slidesToShow: 4,
                             slidesToScroll: 1,
                             dots: false
                             }
                             },
                             {
                             breakpoint: 321,
                             settings: {
                             slidesToShow: 3,
                             slidesToScroll: 2,
                             dots: false
                             }
                             },

                             ]

                             });
    }
  };

  $(window).load(function() {
    slider();
    if ($(window).width() >= 992 && $('.zoomContainer').length === 0) {
      $(".fancybox").fancybox();
      var zoomOptions = {
        cursor: "crosshair",
        galleryActiveClass: 'active',
        imageCrossfade: false,
        scrollZoom: false,

        onImageSwapComplete: function() {
          $(".zoomWrapper div").hide();
        },
        loadingIcon: window.loading_url
      };
      $(".slider-for .slick-current img").elevateZoom(zoomOptions);

      $(".slider-for ").on("beforeChange", function(event, slick, currentSlide, nextSlide) {
        $.removeData(currentSlide, "elevateZoom");
        $(".zoomContainer").remove();
      });
      $(".slider-for ").on("afterChange", function() {
        $(".slider-for  .slick-current img").elevateZoom(zoomOptions);
      });
    }
  });

  var timer;
  var winW = $(window).width();

  $(window).on('resize.refreshSlick', function() {
    clearTimeout(timer);
    timer = setTimeout(function() {
      var curW = $(window).width();
      if (curW >= 768 && winW < 768) {
        $('.slider-for').slick('unslick');
        $('.slider-nav').slick('unslick');
        $('.slider-nav').find('.slick-list').removeAttr('style');
        $('.slider-nav').find('.slick-track').removeAttr('style');
        $('.slider-nav').find('.slick-slide').removeAttr('style');
        $('.slider-nav').find('button.slick-arrow').remove();

        slider();
      }
      winW = curW;
    }, 500);
  });

  $(".tab-vertical>ul>li").on('click', function () {
    $(".tab-vertical>ul>li").removeClass("active");
    $(this).addClass("active");
  });

</script>
<script>

  function updatePricing() {
    var regex = /([0-9]+[.|,][0-9]+[.|,][0-9]+)/g;
    var unitPriceTextMatch = jQuery('.product .product-price__price span.money').text().match(regex);

    if (!unitPriceTextMatch) {
      regex = /([0-9]+[.|,][0-9]+)/g;
      unitPriceTextMatch = jQuery('.product .product-price__price span.money').text().match(regex);
    }

    if (unitPriceTextMatch) {
      var unitPriceText = unitPriceTextMatch[0];
      var unitPrice = unitPriceText.replace(/[.|,]/g,'');
      var quantity = parseInt(jQuery('#qty').val());
      var totalPrice = unitPrice * quantity;

      var totalPriceText = Shopify.formatMoney(totalPrice, window.money_format);
      regex = /([0-9]+[.|,][0-9]+[.|,][0-9]+)/g;
      if (!totalPriceText.match(regex)) {
        regex = /([0-9]+[.|,][0-9]+)/g;
      }
      totalPriceText = totalPriceText.match(regex)[0];

      var regInput = new RegExp(unitPriceText, "g");
      var totalPriceHtml = jQuery('.product .product-price__price span.money').html().replace(regInput ,totalPriceText);

      jQuery('.product .total-price span.money').html(totalPriceHtml);
    }
  }
  jQuery('#qty').on('change', updatePricing);
  var selectCallback = function(variant, selector) {
    var addToCart = jQuery('#AddToCart-product-template'),
        productPrice = jQuery('.product .product-price__price span.money'),
        comparePrice = jQuery('span#ComparePrice-product-template');
    if (variant) {
      if (variant.available) {
        addToCart.removeClass('disabled').removeAttr('disabled').val('Add to Cart');
      } else {
        addToCart.val(window.inventory_text.sold_out).addClass('disabled').attr('disabled', 'disabled');
      }
      productPrice.html(Shopify.formatMoney(variant.price, "<span class=money>${{amount}}</span>"));
        if (variant.compare_at_price > variant.price) {
          comparePrice.html(Shopify.formatMoney(variant.compare_at_price, "<span class=money>${{amount}}</span>"));
        }
      updatePricing();
      Currency.convertAll(window.shop_currency, jQuery('select[name=currencies] option:selected').val(), 'span.money', 'money_format');
    }
    /* VARIANT IMAGE */
    if (variant && variant.featured_image) {
      var originalImage = $("img[id|='product-featured-image']");
      var newImage = variant.featured_image;
      var element = originalImage[0];
      Shopify.Image.switchImage(newImage, element, function (newImageSizedSrc, newImage, element) {
        //         $(element).data('zoom-image', newImageSizedSrc).elevateZoom({
        //           gallery: 'slider-nav',
        //           galleryActiveClass: 'active',
        //         });

        jQuery('.slider-nav img').each(function() {
          var grandSize = jQuery(this).attr('src');
          grandSize = grandSize.replace('100x100','1024x1024');
          if (grandSize == newImageSizedSrc) {
            jQuery(this).closest('.item').trigger('click');
            return false;
          }
        });
      });
    }
  };

  jQuery(function($) {
    $('.selector-wrapper').hide();
    $('.single-option-selector:eq(0)').val("Default Title").trigger('change');
  });
</script>
<script type="application/json" id="ProductJson-product-template">
    {"id":1871372910627,"title":"Altra Blackburn Storage  Bookcase","handle":"altra-blackburn-storage-bookcase","description":"\u003cp\u003eCurabitur egestas malesuada volutpat. Nunc vel vestibulum odio, ac pellentesque lacus. Pellentesque dapibus nunc nec est imperdiet, a malesuada sem rutrum. Sed quam odio, porta a finibus quis, sagittis aliquet leo. Nunc ornare metus urna, eu luctus velit placerat ut. Cras at porttitor lectus. Ut dapibus aliquam nibh, in imperdiet libero tincidunt sit amet. Morbi sodales fermentum nibh nec facilisis. Morbi pharetra varius velit, eget varius libero finibus quis. Quisque auctor varius lectus, lacinia rhoncus velit posuere vel. Cras condimentum tincidunt urna, sed vehicula ipsum dapibus et. Pellentesque pharetra ultrices varius. Sed viverra nec purus ut ornare.\u003c\/p\u003e\n\u003ch3\u003ePhasellus elementum:\u003c\/h3\u003e\n\u003cul\u003e\n\u003cli\u003eAenean auctor sem ac ex efficitur\u003c\/li\u003e\n\u003cli\u003eNon mattis odio bibendum\u003c\/li\u003e\n\u003cli\u003eSed vitae enim at tortor finibus\u003c\/li\u003e\n\u003cli\u003eInteger facilisis eleifend vehicula\u003c\/li\u003e\n\u003cli\u003eIn hac habitasse platea dictumst\u003c\/li\u003e\n\u003c\/ul\u003e\n\u003cp\u003eSed molestie orci sem, at semper est molestie ac. Suspendisse cursus feugiat erat, eu posuere massa. Nullam posuere nibh non eros lobortis tempus. Maecenas dignissim elementum massa, vel accumsan urna elementum in. Suspendisse at dui euismod, rhoncus eros non, imperdiet ipsum. Vestibulum vehicula vel turpis et vestibulum. Ut porta et ex maximus malesuada.\u003c\/p\u003e","published_at":"2019-08-23T03:15:21-04:00","created_at":"2019-08-23T03:15:21-04:00","vendor":"Home2","type":"Nikes","tags":["0 - $99","Black","deal 2021\/9\/9","Under$69","White"],"price":4700,"price_min":4700,"price_max":4700,"available":true,"price_varies":false,"compare_at_price":5200,"compare_at_price_min":5200,"compare_at_price_max":5200,"compare_at_price_varies":false,"variants":[{"id":15555941433379,"title":"Default Title","option1":"Default Title","option2":null,"option3":null,"sku":"","requires_shipping":true,"taxable":true,"featured_image":null,"available":true,"name":"Altra Blackburn Storage  Bookcase","public_title":null,"options":["Default Title"],"price":4700,"weight":0,"compare_at_price":5200,"inventory_management":null,"barcode":""}],"images":["\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/5_da5c7bb1-0802-4590-a6ea-35a460703e06.jpg?v=1566544529","\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/4_1e85f24a-06d4-4374-af6e-370b53f532c4.jpg?v=1566544529","\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/3_e82190ee-2dcf-4a62-9efc-34ca28563526.jpg?v=1566544529","\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/1_b769264d-dbd7-4821-99dd-2ba255d0909a.jpg?v=1566544529","\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/2_03d30479-758b-4d93-b151-59837ac1480f.jpg?v=1566544529"],"featured_image":"\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/5_da5c7bb1-0802-4590-a6ea-35a460703e06.jpg?v=1566544529","options":["Title"],"media":[{"alt":null,"id":1902221000739,"position":1,"preview_image":{"aspect_ratio":1.0,"height":600,"width":600,"src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/5_da5c7bb1-0802-4590-a6ea-35a460703e06.jpg?v=1569379442"},"aspect_ratio":1.0,"height":600,"media_type":"image","src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/5_da5c7bb1-0802-4590-a6ea-35a460703e06.jpg?v=1569379442","width":600},{"alt":null,"id":1902220935203,"position":2,"preview_image":{"aspect_ratio":1.0,"height":600,"width":600,"src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/4_1e85f24a-06d4-4374-af6e-370b53f532c4.jpg?v=1569379442"},"aspect_ratio":1.0,"height":600,"media_type":"image","src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/4_1e85f24a-06d4-4374-af6e-370b53f532c4.jpg?v=1569379442","width":600},{"alt":null,"id":1902220967971,"position":3,"preview_image":{"aspect_ratio":1.0,"height":600,"width":600,"src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/3_e82190ee-2dcf-4a62-9efc-34ca28563526.jpg?v=1569379442"},"aspect_ratio":1.0,"height":600,"media_type":"image","src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/3_e82190ee-2dcf-4a62-9efc-34ca28563526.jpg?v=1569379442","width":600},{"alt":null,"id":1902221033507,"position":4,"preview_image":{"aspect_ratio":1.0,"height":600,"width":600,"src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/1_b769264d-dbd7-4821-99dd-2ba255d0909a.jpg?v=1569379442"},"aspect_ratio":1.0,"height":600,"media_type":"image","src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/1_b769264d-dbd7-4821-99dd-2ba255d0909a.jpg?v=1569379442","width":600},{"alt":null,"id":1902221066275,"position":5,"preview_image":{"aspect_ratio":1.0,"height":600,"width":600,"src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/2_03d30479-758b-4d93-b151-59837ac1480f.jpg?v=1569379442"},"aspect_ratio":1.0,"height":600,"media_type":"image","src":"https:\/\/cdn.shopify.com\/s\/files\/1\/0051\/3130\/4995\/products\/2_03d30479-758b-4d93-b151-59837ac1480f.jpg?v=1569379442","width":600}],"content":"\u003cp\u003eCurabitur egestas malesuada volutpat. Nunc vel vestibulum odio, ac pellentesque lacus. Pellentesque dapibus nunc nec est imperdiet, a malesuada sem rutrum. Sed quam odio, porta a finibus quis, sagittis aliquet leo. Nunc ornare metus urna, eu luctus velit placerat ut. Cras at porttitor lectus. Ut dapibus aliquam nibh, in imperdiet libero tincidunt sit amet. Morbi sodales fermentum nibh nec facilisis. Morbi pharetra varius velit, eget varius libero finibus quis. Quisque auctor varius lectus, lacinia rhoncus velit posuere vel. Cras condimentum tincidunt urna, sed vehicula ipsum dapibus et. Pellentesque pharetra ultrices varius. Sed viverra nec purus ut ornare.\u003c\/p\u003e\n\u003ch3\u003ePhasellus elementum:\u003c\/h3\u003e\n\u003cul\u003e\n\u003cli\u003eAenean auctor sem ac ex efficitur\u003c\/li\u003e\n\u003cli\u003eNon mattis odio bibendum\u003c\/li\u003e\n\u003cli\u003eSed vitae enim at tortor finibus\u003c\/li\u003e\n\u003cli\u003eInteger facilisis eleifend vehicula\u003c\/li\u003e\n\u003cli\u003eIn hac habitasse platea dictumst\u003c\/li\u003e\n\u003c\/ul\u003e\n\u003cp\u003eSed molestie orci sem, at semper est molestie ac. Suspendisse cursus feugiat erat, eu posuere massa. Nullam posuere nibh non eros lobortis tempus. Maecenas dignissim elementum massa, vel accumsan urna elementum in. Suspendisse at dui euismod, rhoncus eros non, imperdiet ipsum. Vestibulum vehicula vel turpis et vestibulum. Ut porta et ex maximus malesuada.\u003c\/p\u003e"}
</script>
</div>
    </div>
  </div>
</div>
<script>
  $(".open-sidebar").click(function(e){

    $(".sidebar-overlay").toggleClass("show");
    $(".sidebar-fixed").toggleClass("active");
  });
  $( ".open-fiter" ).click(function() {
    $('.sidebar-fixed').slideToggle(200);
    $(this).toggleClass('active');
  });
  $(".sidebar-overlay").click(function(e){

    $(".sidebar-overlay").toggleClass("show");
    $(".sidebar-fixed").toggleClass("active");
  });
  $('#close-sidebar').click(function() {
    $('.sidebar-overlay').removeClass('show');
    $('.sidebar-fixed').removeClass('active');

  });
</script>
</div>
<?php require_once 'inc/footer.php'; ?>