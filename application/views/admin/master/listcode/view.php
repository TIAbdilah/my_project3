<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('admin/tpl/headtag'); ?>
    </head>
    <body>
        <!-- navbar -->
        <?php $this->load->view('admin/tpl/navbar'); ?>
        <!-- /navbar -->
        <!-- main -->
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div class="widget widget-table action-table">
                                <div class="widget-header"> <i class="icon-th-list"></i>
                                    <h3>View Data</h3>
                                </div>
                                <!-- /widget-header -->
                                <div class="widget-content"><br>
                                    <form class="bs-docs-example form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label" for="inpKodeUnit">Kode Unit</label>
                                            <div class="controls">
                                                <strong><?php echo $row->kode_unit?></strong>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inpAkun">Akun</label>
                                            <div class="controls">
                                                <strong><?php echo $row->akun?></strong>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inpJenisBelanja">Jenis Belanja</label>
                                            <div class="controls">
                                                <strong><?php echo $row->jenis_belanja?></strong>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inpPagu">Pagu</label>
                                            <div class="controls">
                                                <strong><?php echo $row->pagu?></strong>
                                            </div>
                                        </div>                                       
                                    </form>
                                </div>
                                <!-- /widget-content --> 
                            </div>
                        </div>
                        <!-- /span12 --> 
                    </div>
                    <!-- /row --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /main-inner --> 
        </div>
        <!-- /main -->
        <!-- footer --> 
        <?php $this->load->view('admin/tpl/footer'); ?>
        <!-- /footer --> 
        <!-- Le javascript
        ================================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script src="<?php echo base_url() . '/assets/' ?>js/jquery-1.7.2.min.js"></script> 
        <script src="<?php echo base_url() . '/assets/' ?>js/excanvas.min.js"></script> 
        <script src="<?php echo base_url() . '/assets/' ?>js/chart.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url() . '/assets/' ?>js/bootstrap.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url() . '/assets/' ?>js/full-calendar/fullcalendar.min.js"></script>

        <script src="js/base.js"></script> 
        
    </body>
</html>
