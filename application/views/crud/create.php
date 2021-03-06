<h3><?= $title ?></h3>

<br><br><br>

<h3 align="center">CRUD using Codeigniter</h3>

<!-- FORM -->
<?php echo form_open('crud_controller/store'); ?>

    <!-- DISPLAY SUCCESS MESSAGE IF RECORD IS CREATED SUCCESSFULLY. -->
    <?php if($this->uri->segment(2) == "inserted"): ?>
        <p class="text-success">User Added Successfully.</p>
    <?php endif; ?>

    <!-- DISPLAY SUCCESS MESSAGE IF RECORD IS UPDATED SUCCESSFULLY. -->
    <?php if($this->uri->segment(2) == "updated"): ?>
        <p class="text-success">User Updated Successfully.</p>
    <?php endif; ?>

    <!-- DISPLAY SUCCESS MESSAGE IF RECORD IS DELETED SUCCESSFULLY. -->
    <?php if($this->uri->segment(2) == "deleted"): ?>
        <p class="text-danger">User deleted.</p>
    <?php endif; ?>

    <?php if(isset($user_data)): ?>
        <?php foreach($user_data->result() as $row): ?>
            <!-- FIRST NAME-->
            <div class="form-group">
                <?php echo form_label('Enter First name:'); ?>
                <?php echo form_input('first_name',$row->first_name,'placeholder="Please enter first name"class="form-control"'); ?>
                <span class="text-danger"><?php echo form_error("first_name") ?></span>
            </div>

            <!-- LAST NAME -->
            <div class="form-group">
                <?php echo form_label('Enter Last name:'); ?>
                <?php echo form_input('last_name',$row->last_name,'placeholder="Please enter first name"class="form-control"'); ?>
                <span class="text-danger"><?php echo form_error("last_name") ?></span>
            </div>

            <!-- SUBMIT FORM -->
            <div class="form-group">
                <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>">
                <?php echo form_submit('formupdate','Update','class="btn btn-info"'); ?>
            </div>

        <?php endforeach; ?>
    <?php else: ?>

    <!-- FIRST NAME-->
    <div class="form-group">
        <?php echo form_label('Enter First name:'); ?>
        <?php echo form_input('first_name','','placeholder="Please enter first name"class="form-control"'); ?>
        <span class="text-danger"><?php echo form_error("first_name") ?></span>
    </div>

    <!-- LAST NAME -->
    <div class="form-group">
        <?php echo form_label('Enter Last name:'); ?>
        <?php echo form_input('last_name','','placeholder="Please enter first name"class="form-control"'); ?>
        <span class="text-danger"><?php echo form_error("last_name") ?></span>
    </div>

    <!-- SUBMIT FORM -->
    <div class="form-group">
        <?php echo form_submit('formsubmit','Submit','class="btn btn-info"'); ?>
    </div>
    <?php endif; ?>

<!-- FORM CLOSE-->
<?php echo form_close(); ?><br><br>

<!-- READ DATA FROM DATABASE -->
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>
        <?php if($users->num_rows() > 0 ): ?>
            <?php foreach($users->result() as $row): ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->first_name; ?></td>
                    <td><?php echo $row->last_name; ?></td>
                    <td>
                        <!-- EDIT --><a href="<?php echo base_url(); ?>crud_controller/update/<?php echo $row->id; ?>" class="btn btn-info">Edit</a>
                        <!-- DELETE --><a href="#" class="delete_btn btn btn-danger" id="<?php echo $row->id; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No Data Found</td>
            </tr>
        <?php endif; ?>
    </table>
</div>




    
