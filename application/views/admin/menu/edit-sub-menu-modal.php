<div id="editSubMenu" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Sub Menu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="edit_sub_menu" action="<?php echo base_url('admin/sub_menu/save/'.$main_menu_id); ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Sub Menu name:</label>
                        <input type="text" class="form-control" name="sub_menu_name" id="sub_menu_name" placeholder="Sub Menu name">
                        <input type="hidden" name="menu_id" value="0">
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                </form>
            </div>
        </div>

    </div>
</div>