<br><br><br>

<h3><?= $title ?></h3>

<!-- FORM FOR LOGIN -->
<?php echo form_open('login_controller/login_validation'); ?>

<!-- FIRST NAME-->
<div class="form-group">
    <?php echo form_label('Enter Username:'); ?>
    <?php echo form_input('username','','placeholder="Please enter username"class="form-control"'); ?>
    <span class="text-danger"><?php echo form_error("username") ?></span>
</div>

<!-- LAST NAME -->
<div class="form-group">
    <?php echo form_label('Enter Password:'); ?>
    <?php echo form_password('password','','placeholder="Please enter password"class="form-control"'); ?>
    <span class="text-danger"><?php echo form_error("password") ?></span>
</div>

<!-- DISPLAY ERROR MESSAGE IF USER ENTERS WRONG CREDENTIALS -->
<?php echo '<p class="text-danger">'.$this->session->flashdata('error').'</p>'; ?>

<!-- SUBMIT FORM -->
<div class="form-group">
    <?php echo form_submit('login','Login','class="btn btn-info"'); ?>
</div>


<!-- FORM CLOSE-->
<?php echo form_close(); ?><br><br>