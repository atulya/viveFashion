<div class="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Business</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>
                List of businesses
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User</th>
								<th>Available Offers</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>User</th>
								<th>Available Offers</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $count = count($records); ?>
                            <?php for ($i = 0; $i < $count; $i++) { ?>
                                <tr>
                                    <td><?php echo $records[$i]['name'].' ('.$records[$i]['category'].')'; ?></td>
                                    <td><?php echo $records[$i]['user']; ?></td>
									<td><?php echo $records[$i]['count']; ?></td>
                                    <td>
										<a href="<?php echo base_url('cpanel/business/edit/' . $records[$i]['id']); ?>" title="Edit"><li class="fa fa-edit"></li></a>
										| <a onclick="blockBusiness(<?php echo $records[$i]['id']; ?>, this)" title="<?php echo ($records[$i]['is_deleted'] == 0) ? 'Want to block?' : 'Want to unblock?'; ?>"><li class="fa <?php echo ($records[$i]['is_deleted'] == 0) ? 'fa-unlock' : 'fa-lock'; ?>"></li></a>
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