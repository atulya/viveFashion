<div id="addMenu" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span id="operation">Add</span> Menu</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="add_menu" action="<?php echo base_url('admin/menus/save'); ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Menu name:</label>
                        <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Menu name">
                        <input type="hidden" name="menu_id" value="0">
                    </div>
                    <button type="submit" class="btn btn-default">Save</button>
                </form>
            </div>
        </div>

    </div>
</div>