<!-- navbar -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> 
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </a>
            <a class="brand" href="<?php echo base_url() ?>">ESatker</a>
            <div class="nav-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url() ?>">
                            <i class="icon-home"></i>&nbsp;Beranda
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="icon-list-alt"></i>&nbsp;Master <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('master/pegawai') ?>">Pegawai</a></li>    
                            <li><a href="<?php echo site_url('master/narasumber') ?>">Narasumber</a></li>                            
                            <li><a href="<?php echo site_url('master/barang') ?>">Barang</a></li>               
                            <li><a href="<?php echo site_url('master/unit') ?>">Unit</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('master/anggaran') ?>">Anggaran</a></li>                        
                            <li><a href="<?php echo site_url('master/akun') ?>">Akun</a></li>
                            <li><a href="<?php echo site_url('master/kegiatan') ?>">Kegiatan</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('master/kota_tujuan') ?>">Kota Tujuan</a></li>
                            <li><a href="<?php echo site_url('master/biaya_akomodasi') ?>">Biaya Uang Harian</a></li>
                            <li><a href="<?php echo site_url('master/biaya_penginapan') ?>">Biaya Penginapan</a></li>
                            <li><a href="<?php echo site_url('master/biaya_sewa') ?>">Biaya Sewa</a></li>
                            <li><a href="<?php echo site_url('master/biaya_tiket') ?>">Biaya Tiket</a></li>
                            <li><a href="<?php echo site_url('master/biaya_transport_dlm_kota') ?>">Biaya Transportasi Dalam Kota</a></li>
                            <li><a href="<?php echo site_url('master/biaya_diklat') ?>">Biaya Diklat</a></li>
                            <li><a href="<?php echo site_url('master/biaya_representatif') ?>">Biaya Representatif</a></li>
                            <li><a href="<?php echo site_url('master/biaya_narasumber') ?>">Biaya Narasumber</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="icon-folder-open"></i>&nbsp;Pengajuan <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo base_url() ?>transaksi/perjalanan_dinas">Perjalanan Dinas</a></li>
                            <li><a href="<?php echo base_url() ?>transaksi/panjar">Uang Muka Perjalanan Dinas</a></li>                        
                            <!--<li><a href="<?php echo base_url() ?>transaksi/bukti_perjalanan_dinas">Bukti Perjalanan Dinas</a></li>-->
                            <!--<li><a href="<?php echo base_url() ?>transaksi/pengeluaran_riil">Pengeluaran Riil</a></li>-->
                            <li><a href="<?php echo base_url() ?>transaksi/pengajuan_barang">Barang</a></li>
                            <li><a href="<?php echo base_url() ?>transaksi/pengajuan_jasa">Jasa</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="icon-print"></i>&nbsp;Laporan <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('report/rekap_perdin_pegawai/view') ?>">Rekap Perjalanan Dinas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="icon-cogs"></i>&nbsp;Utilitas <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('master/users') ?>">Pengguna</a></li>         
                            <li><a href="<?php echo site_url('master/role') ?>">Role</a></li> 
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">
                    <li class="not_link dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>&nbsp;
                            <?php echo $this->session->userdata('username') . ' [' . $this->session->userdata('kode_role') . ']'?> 
                            <b class="caret"></b>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url() ?>login/process_logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /navbar-inner --> 
</div>
<!-- !navbar -->

<!-- subnavbar -->
<div class="subnavbar">
    <div class="container">
        <!--<center>-->
            <img height="5%" src="<?php echo base_url() . '/assets/' ?>img/banner.png" />
            <span class="pull-right">
                <img height="5%" src="<?php echo base_url() . '/assets/' ?>img/banner-right.png" />
            </span>            
        <!--</center>-->
        <!--/container-->  
    </div>
</div>
<!-- subnavbar -->