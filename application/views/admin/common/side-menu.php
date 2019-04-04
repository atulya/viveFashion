<body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="#" height="35px" width="150px"><?php echo PROJECT_NAME; ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="<?php echo base_url('admin/menus'); ?>">
                        <i class="fa fa-fw fa-medium"></i>
                        <span class="nav-link-text">
                            Menu management</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="<?php echo base_url('admin/products'); ?>">
                        <i class="fa fa-fw fa-product-hunt"></i>
                        <span class="nav-link-text">
                            Product management</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="<?php echo base_url('admin/inquiry'); ?>">
                        <i class="fa fa-fw fa-envelope"></i>
                        <span class="nav-link-text">
                            Inquiries (<span class="unread_count"><?php echo $unread_count; ?></span>)</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="<?php echo base_url('admin/import'); ?>">
                        <i class="fa fa-fw fa-expand"></i>
                        <span class="nav-link-text">
                            Import products</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="<?php echo base_url('admin/banner'); ?>">
                        <i class="fa fa-fw fa-image"></i>
                        <span class="nav-link-text">
                            Banner</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input type="text" class="form-control" id="tags" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('admin/logout'); ?>">
                        <i class="fa fa-fw fa-sign-out"></i>
                        Logout</a>
                </li>
            </ul>
        </div>
    </nav>