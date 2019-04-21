<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">          

            <!-- Main content -->
            <section class="content container-fluid">

            <div class="row">
        <div class="col-xs-12">          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><h1>Cégek - Keresés</h1>
              <p class="lead">A cégek adatlapjának megtekintéséhez kattinston a cég nevére.</p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                if(count($this->searchResult) > 0) { 
                    echo $this->table->generate(); 
                }
                else {
                    echo '<div class="alert alert-danger" role="alert">Nincs ilyen nevű cég az adatbázisban!</div>';
                }
                ?>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery 3 -->
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<!-- page script -->
<script>      
    $('#searchTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })  
</script>