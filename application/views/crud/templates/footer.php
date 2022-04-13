    <script src="<?php echo base_url() ?>assets/js/jquery.min.css"></script>

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
</div>
</body>
</html>