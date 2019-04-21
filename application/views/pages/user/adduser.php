<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">           

    <!-- Main content -->
    <section class="content">        
        <!-- right column -->
        <div class="row">
        <div class="col-md-6">
        <span id="validationStatus" class="baseData"></span>
        <span id="baseUrl" class="baseData"><?php echo base_url(); ?></span>
          
          <!-- general form elements disabled -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h1>Új felhasználó felvétele</h1>
              <p><small>A <span class="asterisk">*</span>-al jelölt mezők kitöltése kötelező!</small></p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label for="userName">Név:<span class="asterisk">*</span></label>
                  <input id="userName" name="userName" type="text" class="form-control valid" />
                  <span class="alertMsg">Kérem, adja meg a nevét!</span>
                </div>
                <div class="form-group">
                  <label for="userEmail">E-mail:<span class="asterisk">*</span></label>
                  <input id="userEmail" name="userEmail" type="email" class="form-control valid" />
                  <span class="alertMsg">Kérem, adjon meg egy érvényes e-mail címet!</span>
                </div>
                <div class="form-group">
                  <label for="userPass">Jelszó:<span class="asterisk">*</span></label>
                  <input id="userPass" name="userPass" type="password" class="form-control valid" />
                  <span class="alertMsg">Kérem, adjon meg egy jelszót!</span>
                </div>
                <div class="form-group">
                  <label for="userPassConf">Jelszó megerősítése:<span class="asterisk">*</span></label>
                  <input id="userPassConf" name="userPassConf" type="password" class="form-control valid" />
                  <span class="alertMsg">Kérem, adja meg újra a jelszót!</span>
                </div>                                             
              </form>
              <div class="box-footer">
                    <button name="userSave" id="userSave" class="btn btn-primary send" data-action="save">Mentés</button>
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
<script src="<?php echo base_url(); ?>assets/js/user.js"></script>           