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
              <h1>Új cég felvétele</h1>
              <p><small>A <span class="asterisk">*</span>-al jelölt mezők kitöltése kötelező!</small></p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label for="compName">Név:<span class="asterisk">*</span></label>
                  <input id="compName" name="compName" type="text" class="form-control valid">
                  <span class="alertMsg">Kérem, adja meg a nevet!</span>
                </div>
                <div class="form-group">
                  <label for="compEmail">E-mail:<span class="asterisk">*</span></label>
                  <input id="compEmail" name="compEmail" type="email" class="form-control valid">
                  <span class="alertMsg">Kérem, adjon meg egy érvényes e-mail címet!</span>
                </div>
                <div class="form-group">
                  <label for="compAddress">Cím:<span class="asterisk">*</span></label>
                  <input id="compAddress" name="compAddress" type="text" class="form-control valid">
                  <span class="alertMsg">Kérem, adja meg a címet!</span>
                </div>
                <div class="form-group">
                  <label for="compCat">Kategória:<span class="asterisk">*</span></label>
                  <select id="compCat" name="compCat" class="form-control valid">
                    <option value="" selected>Kérem, válasszon</option>
                    <?php
                    foreach($this->catData as $cat) {
                      echo "<option value=\"{$cat->catId}\">{$cat->catTitle}</option>";
                    }
                    ?>                                                                               
                  </select>
                  <span class="alertMsg">Kérem, adja meg a kategóriát!</span>
                </div>
                <div class="form-group">
                  <label for="compStat">Státusz:<span class="asterisk">*</span></label>
                  <select id="compStat" name="compStat" class="form-control valid">
                    <option value="" selected>Kérem, válasszon</option>
                    <option value="0">Aktív</option>
                    <option value="1">Inaktív</option>
                    <option value="2">Archivált</option>                    
                  </select>
                  <span class="alertMsg">Kérem, adja meg a státuszt!</span>
                </div>
                <div class="form-group">
                  <label>Kapcsolattartók:<span class="asterisk">*</span></label>
                  <span class="alertMsg">Kérem, adjon meg legalább egy kapcsolattartót!</span>                  
                  <input id="compCont1" name="compCont1" type="text" class="form-control valid contact" placeholder="Név" /><br />                  
                  <input id="compCont2" name="compCont2" type="text" class="form-control contact" placeholder="Név" /><br />
                  <input id="compCont3" name="compCont3" type="text" class="form-control contact" placeholder="Név" />                                    
                </div>
                <div class="form-group">
                  <label for="compDate">Felvétel dátuma:<span class="asterisk">*</span></label>                  
                  <input id="compDate" name="compDate" type="date" class="form-control valid" />
                  <span class="alertMsg">Kérem, adja meg a dátumot!</span>                  
                </div>                                                            
              </form>
              <div class="box-footer">
                  <button name="compSave" id="compSave" class="btn btn-primary send" data-action="save">Mentés</button>
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
<script src="<?php echo base_url(); ?>assets/js/company.js"></script>         