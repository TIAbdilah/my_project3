<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="<?php echo base_url() . '/assets/' ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() . '/assets/' ?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url() . '/assets/' ?>css/font-awesome.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="<?php echo base_url() . '/assets/' ?>css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url() . '/assets/' ?>css/pages/signin.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!--headers-->
        <?php $this->load->view('public/tpl/header'); ?>
        <!--end headers-->

        <div class="account-container">

            <div class="content clearfix">

                <form action="<?php echo base_url('login/process_signup'); ?>" method="post">

                    <h1>Pendaftaran Pengguna</h1>		

                    <div class="login-fields">
                        <div class="alert alert-info">
                            <?php
                            if ($this->session->flashdata('passwordsalah') != ''):
                                echo $this->session->flashdata('passwordsalah');
                            endif;
                            ?>
                            <span class="alert-error"><?php echo validation_errors(); ?></span>
                        </div>

                        <div class="field">
                            <label class="control-label" for="inpIdJenisPengguna">Role</label>
                            <div class="controls" >
                                <select class="input-xlarge" name="inpIdJenisPengguna">
                                    <option>Pilih Jenis Pengguna</option>
                                    <?php
                                    foreach ($SIList_role as $row) {
                                        echo "<option value=\"" . $row->id_role . "\">" . $row->nama_role . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> <!-- /field -->

                        <div class="field">
                        <label class="control-label" for="inpIdPegawai">Nama Pegawai</label>
                            <div class="controls">
                                <select class="input-xlarge" name="inpIdPegawai">
                                    <option>Pilih Nama  Pegawai</option>
                                    <?php
                                    foreach ($SIList_pegawai as $row_1) {
                                        echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> <!-- /password -->
                         <div class="control-group">
                            <label class="control-label" for="inpAlamat">Alamat</label>
                            <div class="controls">
                                <input type="text" id="inpAlamat" name="inpAlamat" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inpEmail">Email</label>
                            <div class="controls">
                                <input type="text" id="inpEmail" name="inpEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inpUsername">Username</label>
                            <div class="controls">
                                <input type="text" id="inpUsername" name="inpUsername" placeholder="Username">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inpPassword">Password</label>
                            <div class="controls">
                                <input type="password" id="inpPassword" name="inpPassword" placeholder="Password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inpPassword2">Konfirmasi Password</label>
                            <div class="controls">
                                <input type="password" id="inpPassword2" name="inpPassword2" placeholder="Ketik Lagi Password">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inpTelp">Telp</label>
                            <div class="controls">
                                <input type="text" id="inpTelp" name="inpTelp" placeholder="Telp">
                            </div>
                        </div>

                    </div> <!-- /login-fields -->

                    <div class="login-actions">

                       

                        <button class="button btn btn-success btn-large">Daftar</button>

                    </div> <!-- .actions -->

                </form>


            </div> <!-- /content -->

        </div> <!-- /account-container -->



        <div class="login-extra">
            <a href="#">Reset Password</a>
        </div> <!-- /login-extra -->


        <script src="<?php echo base_url() . '/assets/' ?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url() . '/assets/' ?>js/bootstrap.js"></script>

        <script src<?php echo base_url() . '/assets/' ?>js/signin.js"></script>

    </body>

</html>
