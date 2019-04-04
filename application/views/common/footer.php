<footer class="footer_area clearfix">
    <div class="container">
        <div class="row">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area d-flex mb-30">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="#"><img src="<?php echo base_url(); ?>assets/img/core-img/vivefab.png" height="80px" width="80px" alt=""></a>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area mb-30">
                    <ul class="footer_widget_menu">
                        <li><a href="/">Home</a></li>
                        <?php foreach ($menus AS $menu) { ?>
                            <li>
                                <a href="<?php echo base_url('products/' . $menu['id'] . '/0'); ?>"><?php echo $menu['name']; ?></a>
                            </li>
                        <?php } ?>
                        <li><a href="/about">About us</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row align-items-end">
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_heading mb-30">
                        <h6>Subscribe</h6>
                    </div>
                    <div class="subscribtion_form">
                        <form action="#" method="post">
                            <input type="email" name="mail" class="mail" placeholder="Your email here">
                            <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <!--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>-->
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>

    </div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="<?php echo base_url(); ?>assets/js/jquery/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.js"></script>
<!-- Popper js -->
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<!-- Classy Nav js -->
<script src="<?php echo base_url(); ?>assets/js/classy-nav.min.js"></script>
<!-- Active js -->
<script src="<?php echo base_url(); ?>assets/js/active.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LdJaIYUAAAAANxfLk6r5AQ0gSLVcCakJwvV-WkY"></script>
<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6LdJaIYUAAAAANxfLk6r5AQ0gSLVcCakJwvV-WkY', {action: 'homepage'}).then(function(token) {
        $("#g-recaptcha-response").val(token);
      });
  });
  </script>
<script>
    $(document).ready(function () {
        $("#call_me").validate({
            rules: {
                full_name: "required",
                phone_number: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                full_name: {
                    required: "Please enter full name."
                },
                phone_number: {
                    required: "Please enter phone number.",
                    minlength: "Phone number must be in 10 digits.",
                    maxlength: "Phone number must be in 10 digits."
                },
                email: {
                    required: "Please enter email address.",
                    email: "Invalid email format."
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '<?php echo base_url('product/call_me'); ?>',
                    method: 'POST',
                    async: false,
                    data: $(form).serialize(),
                    beforeSend: function () {
                        $("#call_me_button").prop('disabled', true); // disable button
                    },
                    success: function (response) {
                        $("#ajax_message").html(response);
                        $(form).trigger("reset");
                        $("#call_me_button").prop('disabled', false);
                    }
                });
            }
        });
        $('.input').keypress(function (e) {
            if (e.which == 13) {
                var search_val = $(this).val();
                window.location.href = '<?php echo base_url('search/'); ?>' + search_val;
                return false;
            }
        });
    });
</script>
</body>

</html>