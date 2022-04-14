<br><br><br>

<h3><?= $title ?></h3>

<form method="post" id="upload_form" enctype="multipart/form-data">
    <input type="file" name="image_file" id="image_file"><br><br>

    <input type="submit" value="Upload" id="upload" name="upload" class="btn btn-info">
</form><br><br>

<div id="upload_image" class="row">
    <!-- UPLOADED IMAGE PLACED HERE -->
    <?php echo $image_data; ?>
</div>
