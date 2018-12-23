<?php $this->view('admin/common/header'); ?>
<body class="bg-dark">

    <div class="container">

        <div class="card card-login mx-auto mt-5">
            <div class="card-header">
                <?php echo PROJECT_NAME; ?>
            </div>
            <div class="card-body">
                <?php echo $this->session->flashdata('message'); ?>
                <form autocomplete="off" action="<?php echo base_url('admin/login/authenticate'); ?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="required" autofocus>
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
                        <?php echo form_error('password'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/popper/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>