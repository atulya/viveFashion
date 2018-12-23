<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Menu Links</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header row">
                <div class="col-md-6">
                    <i class="fa fa-table"></i>
                    List of sub menus
                </div>
            </div>
            <div class="card-body">
                <span class="message"></span>
                <?php echo $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($records AS $menu) { ?>
                                <tr id="row_<?php echo $menu['menu_id']; ?>">
                                    <td>
                                        <?php echo $menu['name']; ?>
                                        <input type="hidden" name="menu_<?php echo $menu['menu_id']; ?>" value="<?php echo $menu['name']; ?>">
                                    </td>
                                    <td>
                                        <a href="#" onclick="editSubMenu(<?php echo $menu['menu_id']; ?>)" title="Edit menu">Edit</a> | 
                                        <a href="#" onclick="deleteRecord('menu', <?php echo $menu['menu_id']; ?>)" title="Delete menu">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center pull-right">
                    <ul class="pagination">
                        <?php echo $this->pagination->create_links(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->view('admin/menu/edit-sub-menu-modal'); ?>