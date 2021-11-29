</div>
</div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url()?>assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?php echo base_url()?>assets/admin/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(250, 0).slideUp(250, function(){
                $(this).remove();
            });
        }, 4000);
    }); 

</script>
<script>
initSample();
$(document).ready( function(data){
  $.ajax({
    url : "notif.php"
    method : "POST";
    dataType:"json";
    success:function(data);
  })
});
</script>
</body>
</html>
