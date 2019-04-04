<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header row">
                <div class="col-md-6">
                    <i class="fa fa-table"></i>
                    List of products
                </div>
                <div class="col-md-6">
                    <div class=" pull-right">
                        <a href="<?php echo base_url('admin/products/add'); ?>" class="btn btn-primary">Add Product</a>
                    </div>
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
                                <th>Manufactured by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Manufactured by</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($records AS $product) { ?>
                                <tr id="row_<?php echo $product['product_id']; ?>">
                                    <td>
                                        <?php echo $product['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $product['manufactured_by']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/products/edit/' . $product['product_id']); ?>" title="Edit product">Edit</a> | 
                                        <a href="#" onclick="deleteRecord('product', <?php echo $product['product_id']; ?>)" title="Delete product">Delete</a>
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