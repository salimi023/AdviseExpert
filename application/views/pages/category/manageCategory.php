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
              <h1>Kategória kezelése</h1>
              <p><small>A <span class="asterisk">*</span>-al jelölt mezők kitöltése kötelező!</small></p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label for="catTitle">Címe:<span class="asterisk">*</span></label>
                  <input id="catTitle" name="catTitle" type="text" class="form-control valid" value="<?php echo $this->catTitle; ?>" required>
                  <span class="alertMsg">Kérem, adja meg a címet!</span>
                </div>               
                <!-- textarea -->
                <div class="form-group">
                  <label for="catDesc">Leírás</label>
                  <textarea id="catDesc" name="catDesc" class="form-control" rows="3"><?php echo $this->catDesc; ?></textarea>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input name="catStatus" id="catStatus" type="checkbox" <?php echo($this->catStat == 1) ? 'checked' : ''; ?>>
                      Aktív
                    </label>
                  </div>
                </div>                
              </form>
              <div class="box-footer">
                    <button name="catUpdate" id="catUpdate" class="btn btn-primary send" data-cat_id="<?php echo $this->catId; ?>" data-action="update">Módosítás</button>
                    <button name="catDelete" id="catDelete" class="btn btn-danger send" data-cat_id="<?php echo $this->catId; ?>" data-action="delete">Törlés</button>
                    <a href="<?php echo base_url(); ?>index.php/category/category" class="btn btn-warning" role="button">Vissza</a> 
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