</div> <!-- container-fluid -->
</div>
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Puskemas Bluto.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Puskemas Bluto
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="<?php echo base_url('public/assets/');?>libs/jquery/jquery.min.js" ></script>
<script src="<?php echo base_url('public/assets/');?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/node-waves/waves.min.js"></script>

<!-- Required datatable js -->
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->

<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>js/pages/datatables.init.js"></script>
<script src="<?php echo base_url('public/assets/');?>js/app.js"></script>

<!-- <script src="<?php echo base_url('public/assets/');?>js/pages/form-advanced.init.js"></script> -->
<script src="<?php echo base_url('public/assets/');?>libs/select2/js/select2.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs/@chenfengyuan/datepicker/datepicker.min.js"></script>

<script src="<?php echo base_url('public/assets/');?>libs/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url('public/assets/');?>libs\jquery.repeater\jquery.repeater.min.js"></script>
 <script src="<?php echo base_url('public/assets/');?>js\pages\task-create.init.js"></script>        

<script src="<?php echo base_url('public/assets/');?>libs/dropzone/min/dropzone.min.js"></script>


<script>
    $(document).ready(function(){
        $('#myModal').on('shown.bs.modal', function () {
            $('#selectSantri').select2();
            $('#selectTingkat').select2();
            $('#select2').select2();
        });
    });
</script>
</body>

</html>
