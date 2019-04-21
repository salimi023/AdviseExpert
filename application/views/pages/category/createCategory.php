<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">                       

    <!-- Main content -->
    <section class="content">        
        <!-- right column -->
        <div class="col-md-6">
        <span id="validationStatus" class="baseData"></span>
        <span id="baseUrl" class="baseData"><?php echo base_url(); ?></span>
          
          <!-- general form elements disabled -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h1>Új kategória felvétele</h1>
              <p><small>A <span class="asterisk">*</span>-al jelölt mezők kitöltése kötelező!</small></p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label for="catTitle">Címe:<span class="asterisk">*</span></label>
                  <input id="catTitle" name="catTitle" type="text" class="form-control valid" />
                  <span class="alertMsg">Kérem, adja meg a címet!</span>
                </div>               
                <!-- textarea -->
                <div class="form-group">
                  <label for="catDesc">Leírása:</label>
                  <textarea id="catDesc" name="catDesc" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input name="catStatus" id="catStatus" type="checkbox">
                      Aktív
                    </label>
                  </div>
                </div>                
              </form>
              <div class="box-footer">
                    <button name="catSave" id="catSave" class="btn btn-primary send" data-action="save">Mentés</button>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->              
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper --> 
<script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/category.js"></script>       