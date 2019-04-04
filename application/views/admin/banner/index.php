<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Banner</li>
            <button onclick="history.back()" class="pull-right"><li class="fa fa-arrow-circle-o-left"></li> Back</button>
        </ol>
        <div class="card mb-3">
            <div class="card-body">
                <div class="container">
                    <?php echo $this->session->flashdata('message'); ?>
                    <form id="add_product" enctype="multipart/form-data" action="<?php echo base_url('admin/banner/update'); ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?php if(isset($row)){ echo $row['title']; } ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select image</label>
                            <input type="file" name="banner_image" id="images" class="form-control" accept=".png,.jpeg,.jpg">
                        </div>
                        <input type="hidden" name="image_name" value="<?php if(isset($row)){ echo $row['image_name']; } ?>">
                        <div class="form-group">
                            <?php if(!empty($row['image_name'])): ?>
                            <img src="<?php echo base_url('uploads/banner/'.$row['image_name']); ?>" style="height: 400px; width: 400px;">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>