<h3><?= $title ?></h3>

<br><br><br>

<h3 align="center">Insert Data using Codeigniter</h3>

<!-- FORM -->
<?php echo form_open('crud_controller/store'); ?>

    <!-- DISPLAY SUCCESS MESSAGE IF RECORD IS CREATED SUCCESSFULLY. -->
    <?php if($this->uri->segment(2) == "inserted"): ?>
        <p class="text-success">User Added Successfully.</p>
    <?php endif; ?>

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

<!-- FORM CLOSE-->
<?php echo form_close(); ?>

    
