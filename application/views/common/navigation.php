<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="/"><img src="<?php echo base_url(); ?>assets/img/core-img/vivefab.png" alt="Vive Fashion World" width="130px" style="margin-top: 50px"></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <?php foreach($menus AS $menu) { ?>
                                <li>
                                    <a href="<?php echo base_url('products/'.$menu['permalink']); ?>"><?php echo $menu['name']; ?></a>
                                    <?php if(!empty($menu['sub_menus'])) { ?>
                                        <ul class="dropdown">
                                            <?php foreach($menu['sub_menus'] AS $sub_menu) { ?>
                                                <li><a href="<?php echo base_url('products/'.$sub_menu['permalink']); ?>"><?php echo $sub_menu['name']; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                            <li><a href="/about">About us</a></li>
                            <li><a href="/services">Services</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="get">
                        <input type="search" name="search" class="input" placeholder="Type for search">
                        <button type="button" id="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                     </form>
                </div>
            </div>

        </div>
    </header>