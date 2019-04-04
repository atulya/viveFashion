<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="<?php echo base_url(); ?>assets/img/core-img/bag.svg" alt=""> <span>3</span></a>
    </div>

</div>
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(<?php echo base_url(); ?>assets/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2><?php echo $search_name; ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-12 col-lg-12">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p><span><?php echo $product_count; ?></span> products found</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Single Product -->
                        <?php foreach ($products AS $product): ?>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <a href="<?php echo base_url('product/' . $product['permalink']); ?>">
                                            <?php $image = !empty($product['image_name']) ? base_url('uploads/products/' . $product['image_name']) : 'https://via.placeholder.com/255x348.png'; ?>
                                            <img src="<?php echo $image; ?>" alt="<?php echo $product['name']; ?>">
                                        </a>
                                        <!-- Hover Thumb -->
                                        <!--img class="hover-img" src="img/product-img/product-2.jpg" alt=""-->
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <a href="<?php echo base_url('product/' . $product['permalink']); ?>">
                                            <h6><?php echo $product['name']; ?></h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination mt-50 mb-70">
                        <?php echo $this->pagination->create_links(); ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>