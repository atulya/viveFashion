<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inquiry</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-unlink"></i>
                Total Unread count: <span class="unread_count"><?php echo $unread_count; ?></span>
            </div>
            <div class="card-body">
                <span class="message"></span>

                <?php echo $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($inquiries AS $inquiry) { ?>
                                <?php $is_read = empty($inquiry['is_read']) ? 'Mark as Read' : 'Read'; ?>
                                <tr class="info" id="row_<?php echo $inquiry['inquiry_id']; ?>">
                                    <td><?php echo $inquiry['name']; ?></td>
                                    <td><?php echo $inquiry['email']; ?></td>
                                    <td><?php echo $inquiry['mobile']; ?></td>
                                    <td><?php echo $inquiry['added_on']; ?></td>
                                    <td>
                                        <a href="#" onclick="viewInquiry(<?php echo $inquiry['inquiry_id']; ?>)" title="View"><li class="fa fa-eye"></li></a>
                                        <a href="#" onclick="deleteRecord('inquiry', <?php echo $inquiry['inquiry_id']; ?>)" title="Delete"><li class="fa fa-trash-o"></li></a>
                                        <a href="#" onclick="markAsRead(<?php echo $inquiry['inquiry_id']; ?>)" title="<?php echo $is_read; ?>"><li class="fa fa-check-square-o"></li><span id="inq_<?php echo $inquiry['inquiry_id']; ?>"><?php echo $is_read; ?></span></a>
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
<?php $this->view('admin/inquiry/info-modal'); ?>