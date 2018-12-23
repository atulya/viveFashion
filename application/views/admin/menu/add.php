<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Category</li>
            <li class="breadcrumb-item active"><?php echo (isset($row)) ? 'Update' : 'Add'; ?></li>
            <button onclick="history.back()" class="pull-right"><li class="fa fa-arrow-circle-o-left"></li> Back</button>
        </ol>
        <div class="card mb-3">
            <div class="card-body">
                <div class="container">
                    <?php echo $this->session->flashdata('message'); ?>
                    <form action="<?php echo (!isset($row)) ? base_url('cpanel/category/insert') : base_url('cpanel/category/update'); ?>" method="POST">
                        <input type="hidden" name="category_id" value="<?php echo isset($row) ? $row->id : 0; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter category name" value="<?php
                            if (isset($row)) {
                                echo $row->name;
                            }
                            ?>">
                                   <?php echo form_error('name'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select ICON<span style="color:red">*</span></label>
                            <select class="form-control" name="icon">
                                <option value="">Select ICON</option>
                                <option value="icon-adjust" <?php if(isset($row)){ if($row->icon == 'icon-adjust'){ echo 'selected'; } } ?>>icon-adjust</option>
                                <option value="icon-asterisk" <?php if(isset($row)){ if($row->icon == 'icon-asterisk'){ echo 'selected'; } } ?>>icon-asterisk</option>
                            </select>
                            <?php echo form_error('icon'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description"><?php
                                if (set_value('description')) {
                                    echo set_value('description');
                                } elseif (isset($row)) {
                                    echo $row->description;
                                }
                                ?></textarea>
                            <?php echo form_error('description'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>