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

                <form action="<?php echo base_url('login/process_login'); ?>" method="post">

                    <h1>Login</h1>		

                    <div class="login-fields">
                        <div class="alert alert-info">
                            <?php
                            if ($this->session->flashdata('berhasil') != ''):
                                echo $this->session->flashdata('berhasil');
                            endif;
                            ?>
                            <?php
                            if ($this->session->flashdata('message') != ''):
                                echo $this->session->flashdata('message');
                            endif;
                            ?>
                            <span class="alert-error"><?php echo validation_errors(); ?></span>
                        </div>

                        <div class="field">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
                        </div> <!-- /password -->

                    </div> <!-- /login-fields -->

                    <div class="login-actions">

                        <span class="login-checkbox">
                            <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                            <label class="choice" for="Field">Keep me signed in</label>
                        </span>

                        <button class="button btn btn-success btn-large">Masuk</button>

                    </div> <!-- .actions -->

                </form>
                        <a href="<?php echo base_url('login/signup');?>"><button class="button btn btn-success btn-large">Daftar</button></a>


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
