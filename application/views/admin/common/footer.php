<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small><?php echo PROJECT_NAME; ?></small>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Logout Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery-3.1.1.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.validate.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/common.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url(); ?>assets/admin/js/sb-admin.min.js"></script>
<script>
    $(document).ready(function () {
        $('select[name=menu_id]').on('change', function () {
            var menu_id = $(this).val();
            $('#sub_menu_id').empty();
            $('#sub_menu_id').append($('<option>', {
                value: '0',
                text: 'Select Sub-menu'
            }));
            $.post(base_url + 'common/search_sub_menu', {menu_id: menu_id}, function (data) {
                $.each(data, function (index, value) {
                    $('#sub_menu_id').append($('<option>', {
                        value: value['menu_id'],
                        text: value['name']
                    }));
                });
            }, 'json');
        });
        $('#add_menu_button').on('click', function () {
            $("#operation").html('Add');
            $("#addMenu").modal('show');
        });
        $("#add_menu").validate({
            rules: {
                menu_name: "required"
            },
            messages: {
                menu_name: "Please enter menu name."
            }
        });
        $("#add_sub_menu").validate({
            rules: {
                sub_menu_name: "required"
            },
            messages: {
                sub_menu_name: "Please enter sub menu name."
            },
            submitHandler: function (form) {
                $.ajax({
                    url: base_url + 'menus/save_sub_menu',
                    method: 'POST',
                    async: false,
                    data: $(form).serialize(),
                    success: function (response) {
                        $("#addSubMenu").modal('hide');
                        $(".message").html(response);
                        $(form).trigger("reset");
                    }
                });
            }
        });
        $("#add_product").validate({
            rules: {
                name: "required",
                editor1: "required",
                menu_id: "required"
            },
            messages: {
                name: {
                    required: "Please enter product name."
                },
                editor1: {
                    required: "Please enter product description."
                },
                menu_id: {
                    required: "Please select the Menu."
                }
            }
        });
        $("#edit_sub_menu").validate({
            rules: {
                sub_menu_name: "required"
            },
            messages: {
                sub_menu_name: "Please enter sub menu name."
            }
        });
        CKEDITOR.replace('editor1');
    });
    function editMenu(menu_id) {
        var menu_name = $("input[name=menu_" + menu_id + "]").val();
        $("#operation").html('Update');
        $("input[name=menu_id]").val(menu_id);
        $("input[name=menu_name]").val(menu_name);
        $("#addMenu").modal('show');
    }
    function addSubMenu(menu_id) {
        $("input[name=menu_id]").val(menu_id);
        $("#addSubMenu").modal('show');
    }
    function deleteRecord(type, record_id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: base_url + 'common/delete',
                method: 'POST',
                async: false,
                data: {record_id: record_id, type: type},
                success: function (response) {
                    if (type == 'inquiry') {
                        getUnreadInquiry();
                    }
                    $(".message").html(response);
                    $("#row_" + record_id).remove();
                }
            });
        }
    }
    function getUnreadInquiry() {
        $.ajax({
            url: base_url + 'inquiry/getUnreadCount',
            method: 'GET',
            async: false,
            success: function (response) {
                $(".unread_count").html(response);
            }
        });
    }
    function editSubMenu(menu_id) {
        var menu_name = $("input[name=menu_" + menu_id + "]").val();
        $("input[name=menu_id]").val(menu_id);
        $("input[name=sub_menu_name]").val(menu_name);
        $("#editSubMenu").modal('show');
    }
    function deleteImage(id, image_name) {
        if (confirm('Are you sure?')) {
            $.ajax({
                url: base_url + 'products/delete_image',
                method: 'POST',
                async: false,
                data: {image_name: image_name},
                success: function (response) {
                    $("#image_" + id).remove();
                }
            });
        }
    }
    function viewInquiry(inquiry_id) {
        $.ajax({
            url: base_url + 'inquiry/get_info',
            method: 'POST',
            async: false,
            dataType: "json",
            data: {inquiry_id: inquiry_id},
            success: function (response) {
                $("#name").html(response['name']);
                $("#email").html(response['email']);
                $("#mobile").html(response['mobile']);
                $("#product_name").html(response['product_name']);
                $("#date").html(response['added_on']);
                $("#infoModal").modal('show');
            }
        });
    }
    function markAsRead(inquiry_id) {
        $.ajax({
            url: base_url + 'inquiry/mark_as_read',
            method: 'POST',
            async: false,
            dataType: "json",
            data: {inquiry_id: inquiry_id},
            success: function (response) {
                console.log(response);
                getUnreadInquiry();
                $('#inq_' + inquiry_id).html('Read');
            }
        });
    }
</script>
</body>

</html>