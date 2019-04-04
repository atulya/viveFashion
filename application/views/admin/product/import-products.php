<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Import</li>
            <li class="breadcrumb-item active">Products</li>
            <button onclick="history.back()" class="pull-right"><li class="fa fa-arrow-circle-o-left"></li> Back</button>
        </ol>
        <div class="card mb-3">
            <div class="card-body">
                <div class="container">
                    <?php echo $this->session->flashdata('message'); ?>
                    <form id="add_product" enctype="multipart/form-data" action="<?php echo base_url('admin/import/products'); ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select main menu<span style="color:red">*</span></label>
                            <select name="menu_id" id="menu_id" class="form-control menu-select">
                                <option value="">Select Menu</option>
                                <?php foreach ($menus AS $menu) { ?>
                                    <option value="<?php echo $menu['menu_id']; ?>"><?php echo $menu['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select sub menu</label>
                            <select name="sub_menu_id" id="sub_menu_id" class="form-control">
                                <option value="">Select Sub-menu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select images</label>
                            <input type="file" name="import_file" id="images" class="form-control" multiple="true" accept=".csv">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>