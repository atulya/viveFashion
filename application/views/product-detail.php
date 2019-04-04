<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
    </div>

    <div class="cart-content d-flex">

    </div>
</div>
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            <?php foreach ($images AS $image): ?>
                <img src="<?php echo base_url('uploads/products/' . $image['image_name']); ?>" alt="<?php echo $row['name']; ?>">
            <?php endforeach; ?>
        </div>
        <?php if (count($images) == 1): ?>
            <img src="<?php echo base_url('uploads/products/' . $images[0]['image_name']); ?>" alt="<?php echo $row['name']; ?>">
        <?php endif; ?>
        <?php if (empty($images)): ?>
            <img src="https://via.placeholder.com/1080x1026.png" alt="Demo Image">
        <?php endif; ?>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <span>mango</span>
        <h2><?php echo $row['name']; ?></h2>
        <h2>Manufactured by: <?php echo $row['manufactured_by']; ?></h2>
        <!-- <p class="product-price"><span class="old-price">$65.00</span> $49.00</p> -->
        <p class="product-desc"><?php echo $row['description']; ?></p>

        <!-- Form -->

        <!-- special form -->

        <div class="col-12 col-md-12">
            <div class="row">
                <span id="ajax_message"></span>
                <div class="checkout_details_area mt-20 clearfix">
                    <form id="call_me" action="#" method="post">
                        <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="full_name">Full Name <i>*</i></label>
                                <input type="text" class="form-control" name="full_name" id="first_name" value="" >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <i>*</i></label>
                                <input type="number" class="form-control" name="phone_number" id="phone_number" min="0" value="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <i>*</i></label>
                                <input type="email" class="form-control" name="email" id="email_address" value="">
                            </div>
                            <input type="hidden" class="form-control" name="g-recaptcha-response" id="g-recaptcha-response">
                            <div class="col-12">
                                <button type="submit" class="btn essence-btn" id="call_me_button">Call me</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- special form ends-->

    </div>
</section>