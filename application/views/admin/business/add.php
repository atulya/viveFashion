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
                    <form enctype="multipart/form-data" action="<?php echo (!isset($row)) ? base_url('cpanel/business/insert') : base_url('cpanel/business/update'); ?>" method="POST">
                        <input type="hidden" name="business_id" value="<?php if(isset($row)){ echo $row->id; } ?>">
                        <?php if(!isset($row)){ ?>
						<div class="form-group">
                            <label for="exampleInputEmail1">Select Owner<span style="color:red">*</span></label>
							<select class="form-control" name="user">
								<?php foreach($owners as $record){ ?>
								<option value="<?php echo $record['id']; ?>"><?php echo $record['name'].'('.$record['mobile'].')'; ?></option>
								<?php } ?>
							</select>
                        </div>
						<?php } ?>
						<div class="form-group">
                            <label for="exampleInputEmail1">Name<span style="color:red">*</span></label>
							<input type="text" name="name" class="form-control" placeholder="Enter name" value="<?php if(set_value('name')){ echo set_value('name'); }elseif(isset($row)){ echo $row->name; } ?>">
                            <?php echo form_error('name'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Select Category<span style="color:red">*</span></label>
							<select class="form-control" name="category">
								<?php foreach($category as $record){ ?>
								<option value="<?php echo $record['id']; ?>"  <?php if(isset($row)){ if($row->category == $record['id']){ echo 'selected'; } } ?>><?php echo $record['name']; ?></option>
								<?php } ?>
							</select>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Established on<span style="color:red">*</span></label>
                            <input type="text" name="established_on" class="form-control" id="datepicker" placeholder="Enter established on" value="<?php if(set_value('established_on')){ echo set_value('established_on'); }elseif(isset($row)){ echo $row->established_on; } ?>">
                            <?php echo form_error('established_on'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Register no<span style="color:red">*</span></label>
                            <input type="text" name="register_no" class="form-control" placeholder="Enter register no" value="<?php if(set_value('register_no')){ echo set_value('register_no'); }elseif(isset($row)){ echo $row->register_no; } ?>">
                            <?php echo form_error('register_no'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Business picture</label>
                            <input type="file" name="business_gallery" class="form-control" accept="image/*">
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Location/Address<span style="color:red">*</span></label>
                            <input type="text" name="location" class="form-control" placeholder="Enter location" value="<?php if(set_value('location')){ echo set_value('location'); }elseif(isset($row)){ echo $row->location; } ?>">
                            <?php echo form_error('location'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Area<span style="color:red">*</span></label>
                            <input type="text" name="area" class="form-control" placeholder="Enter area" value="<?php if(set_value('area')){ echo set_value('area'); }elseif(isset($row)){ echo $row->area; } ?>">
                            <?php echo form_error('area'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Latitude<span style="color:red">*</span></label>
                            <input type="text" name="lat" class="form-control" placeholder="Enter latitude" value="<?php if(set_value('lat')){ echo set_value('lat'); }elseif(isset($row)){ echo $row->lat; } ?>">
                            <?php echo form_error('lat'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Longitude<span style="color:red">*</span></label>
                            <input type="text" name="lng" class="form-control" placeholder="Enter longitude" value="<?php if(set_value('lng')){ echo set_value('lng'); }elseif(isset($row)){ echo $row->lng; } ?>">
                            <?php echo form_error('lng'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Start time<span style="color:red">*</span></label>
                            <input type="text" name="start_time" class="form-control timepicker" placeholder="Enter start time" value="<?php if(set_value('start_time')){ echo set_value('start_time'); }elseif(isset($row)){ echo $row->start_time; } ?>">
                            <?php echo form_error('start_time'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Close time<span style="color:red">*</span></label>
                            <input type="text" name="close_time" class="form-control timepicker" placeholder="Enter close time" value="<?php if(set_value('close_time')){ echo set_value('close_time'); }elseif(isset($row)){ echo $row->close_time; } ?>">
                            <?php echo form_error('close_time'); ?>
                        </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">URL</label>
                            <input type="url" name="url" class="form-control" placeholder="Enter url" value="<?php if(set_value('url')){ echo set_value('url'); }elseif(isset($row)){ echo $row->url; } ?>">
                            <?php echo form_error('url'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>