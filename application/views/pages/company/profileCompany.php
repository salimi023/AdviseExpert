<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">          
            <!-- Main content -->
            <section class="content container-fluid">
                <?php
                foreach($this->companyData as $comp) {
                    echo "<h1><strong>{$comp->compName}</strong> - adatlap</h1>
                    <table class=\"table\">
                    <tr>
                    <td><strong>E-mail:</strong></td><td><a href=\"mailto:{$comp->compEmail}\">{$comp->compEmail}</a></td>                    
                    </tr>
                    <tr>
                    <td><strong>Cím:</strong></td><td>{$comp->compAddress}</td>                    
                    </tr>
                    <tr>
                    <td><strong>Kategória:</strong></td><td>{$this->category}</td>                    
                    </tr>
                    <tr>
                    <td><strong>Státusz:</strong></td><td>{$this->status}</td>                    
                    </tr>
                    <tr>
                    <td><strong>Felvétel időpontja:</strong></td><td>{$comp->compDate}</td>                    
                    </tr>
                    <tr>
                    <td><strong>Kapcsolattartók:</strong></td>
                    <td>";
                    foreach($this->contactData as $contact) {
                        echo "<p>{$contact->contName}</p>";
                    }                                           
                    echo '</td></tr></table><br />';                                                           
                }
                ?>
                <a href="<?php echo base_url(); ?>index.php/company/company" class="btn btn-warning" role="button">Vissza</a>              

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->        