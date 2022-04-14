    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

    <!-- JQUERY SCRIPT FOR PARTICULAR PAGE -->
    <script>
        $(document).ready(function(){

            // DELETE RECORD USING JQUERY
            $('.delete_btn').click(function(){
                var id = $(this).attr('id');

                if(confirm("Are you sure you want to delete this record?")){
                    window.location = "<?php echo base_url(); ?>crud_controller/delete/"+id;
                } else {
                    return false;
                }
            })
        });
    </script>

    <!-- SCRIPT TO UPLOAD IMAGE USING AJAX -->
    <script>
        // SCRIPT TO UPLOAD IMAGE FILE USING AJAX
        $(document).ready(function(){
            $('#upload_form').on('submit',function(e){
                e.preventDefault();

                if($('#image_file').val() == ''){
                    alert('Please select an image file.');
                } else {
                    $.ajax({
                        url:"<?php echo base_url(); ?>upload_controller/ajax_image_upload",
                        method:"POST",
                        data:new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data){
                            // console.log(data);
                            alert('Image Uploaded Successfully.');
                            // $('#upload_image').html(data);
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
</div>
</body>
</html>