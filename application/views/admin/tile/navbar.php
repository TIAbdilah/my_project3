<!-- navbar -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                    
            <!--<a class="brand" href="<?php echo base_url() ?>"><?php echo $title; ?></a>-->
                    
            <div class="nav-collapse">
                <img src="<?php echo base_url() ?>/assets/img/banner.png"/>
                <ul class="nav pull-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $this->session->userdata('username').'('.$this->session->userdata('role').')'?> <b class="caret"></b>
                             <!--<i class="icon-user"></i> admin <b class="caret"></b>-->
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
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li><a href="<?php echo base_url() ?>"><i class="icon-list-alt"></i><span>Seranai Tugas</span> </a> </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Master</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('master/pegawai') ?>">Pegawai</a></li>    
                        <li><a href="<?php echo site_url('master/narasumber') ?>">Narasumber</a></li>
                        <li><a href="<?php echo site_url('master/anggaran') ?>">Anggaran</a></li>                        
                        <li><a href="<?php echo site_url('master/akun') ?>">Akun</a></li>
                        <li><a href="<?php echo site_url('master/kegiatan') ?>">Kegiatan</a></li>
                        <li><a href="<?php echo site_url('master/biaya_akomodasi') ?>">Uang Harian</a></li>
                        <li><a href="<?php echo site_url('master/biaya_penginapan') ?>">Biaya Penginapan</a></li>
                        <li><a href="<?php echo site_url('master/biaya_sewa') ?>">Biaya Sewa</a></li>
                        <li><a href="<?php echo site_url('master/biaya_tiket') ?>">Biaya Tiket</a></li>
                        <li><a href="<?php echo site_url('master/biaya_transport_dlm_kota') ?>">Biaya Transportasi Dalam Kota</a></li>
                        <li><a href="<?php echo site_url('master/biaya_diklat') ?>">Biaya Diklat</a></li>
                        <li><a href="<?php echo site_url('master/biaya_representatif') ?>">Biaya Representatif</a></li>
                        <li><a href="<?php echo site_url('master/unit') ?>">Unit</a></li>
                        <li><a href="<?php echo site_url('master/kota_tujuan') ?>">Kota Tujuan</a></li>
                        <li><a href="<?php echo site_url('master/barang') ?>">Barang</a></li>               
                    </ul>
                </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Pengajuan</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() ?>transaksi/perjalanan_dinas">Perjalanan Dinas</a></li>
                        <li><a href="<?php echo base_url() ?>transaksi/panjar">Uang Muka Perjalanan Dinas</a></li>                        
                        <!--<li><a href="<?php echo base_url() ?>transaksi/bukti_perjalanan_dinas">Bukti Perjalanan Dinas</a></li>-->
                        <!--<li><a href="<?php echo base_url() ?>transaksi/pengeluaran_riil">Pengeluaran Riil</a></li>-->
                        <li><a href="<?php echo base_url() ?>transaksi/pengajuan_barang">Barang/Jasa</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Verifikasi</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() ?>">Verifikasi Pengajuan</a></li>
                        <li><a href="<?php echo base_url() ?>">Verifikasi e-satker</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Laporan</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url() ?>">Perjalanan Dinas</a></li>
                        <li><a href="<?php echo base_url() ?>">Barang dan Jasa</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Utilitas</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">                        
                        <li><a href="<?php echo site_url('master/users') ?>">Pengguna</a></li>         
                        <li><a href="<?php echo site_url('master/role') ?>">Role</a></li>         
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /container --> 
    </div>
    <!-- /subnavbar-inner --> 
</div>
<!-- subnavbar -->