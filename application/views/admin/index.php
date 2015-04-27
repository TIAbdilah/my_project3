<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="<?php echo base_url() . '/assets/' ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/pages/dashboard.css" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/jquery-ui.css" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/jquery.dataTables.css" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/jquery.dataTables.min.css" rel="stylesheet">
        <link  href="<?php echo base_url() . '/assets/' ?>css/bootstrap-datepicker.min.css" rel="stylesheet">
        <style>
            body .modal-admin{
                width: 80%;
                margin-left: -40%;
            }

            #divs div {
                display:none;
            }
        </style>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
    </head>
    <body>
        <!-- navbar -->
        <?php $this->load->view('admin/tile/navbar'); ?>
        <!-- /navbar -->
        <!-- main -->
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">

                            <?php
                            if (!empty($page)) {
                                $this->load->view($page);
                            } ?>

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
        <?php $this->load->view('admin/tile/footer'); ?>
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
        <script src="<?php echo base_url() . '/assets/' ?>js/jquery.js"></script>
        <script src="<?php echo base_url() . '/assets/' ?>js/jquery-1.10.2.js"></script>
        <script src="<?php echo base_url() . '/assets/' ?>js/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() . '/assets/' ?>js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url() . '/assets/' ?>js/perhitungan.js"></script>
        <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $('#example').DataTable({
                    info: false
                });
            });</script>

        <!-- script buat transaksi perjalnan dinas (temp) -->


    </body>
</html>
