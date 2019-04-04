<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Business</li>
            <li class="breadcrumb-item active"><?php echo (isset($row)) ? 'Update' : 'Add'; ?></li>
            <button onclick="history.back()" class="pull-right"><li class="fa fa-arrow-circle-o-left"></li> Back</button>
        </ol>
        <div class="card mb-3">
            <div class="card-body">
                <div class="container">
                    <?php echo $this->session->flashdata('message'); ?>
                    <form id="add_product" enctype="multipart/form-data" action="<?php echo base_url('admin/products/save'); ?>" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo isset($row) ? $row['product_id'] : 0; ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select main menu<span style="color:red">*</span></label>
                            <select name="menu_id" id="menu_id" class="form-control menu-select">
                                <option value="">Select Menu</option>
                                <?php foreach ($menus AS $menu) { ?>
                                    <option value="<?php echo $menu['menu_id']; ?>" <?php if(isset($row)) { if($row['menu_id'] == $menu['menu_id']) { echo 'selected'; } } ?>><?php echo $menu['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select sub menu</label>
                            <select name="sub_menu_id" id="sub_menu_id" class="form-control">
                                <option value="">Select Sub-menu</option>
                                <?php if(isset($sub_menus)) { foreach ($sub_menus AS $menu) { ?>
                                    <option value="<?php echo $menu['menu_id']; ?>" <?php if(isset($row)) { if($row['sub_menu_id'] == $menu['menu_id']) { echo 'selected'; } } ?>><?php echo $menu['name']; ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product name<span style="color:red">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php if(isset($row)) { echo $row['name']; } ?>">
                            <span class="small">Make your product is unique.</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description<span style="color:red">*</span></label>
                            <textarea class="ckeditor" name="editor1"><?php if(isset($row)) { echo $row['description']; } ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Manufactured by</label>
                            <input type="text" name="manufactured_by" id="manufactured_by" class="form-control" value="<?php if(isset($row)) { echo $row['manufactured_by']; } ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select images</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple="true" accept="image/jpeg,image/jpg,image/png">
                            <span class="small">You can upload multiple images by pressing Ctrl key.</span>
                        </div>
                        <?php if(isset($images)) { $i = 0; foreach($images AS $image) { ?>
                        <div class="form-group" id="image_<?php echo ++$i; ?>">
                            <label><button type="button" onclick="deleteImage(<?php echo $i; ?> ,'<?php echo $image['image_name']; ?>')">Delete</button></label>
                            <img src="<?php echo base_url('uploads/products/'.$image['image_name']); ?>" class="image-size" alt="Responsive image">
                        </div>
                        <?php } } ?>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>