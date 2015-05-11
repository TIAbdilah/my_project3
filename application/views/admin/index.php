<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link href="<?php echo base_url() . '/assets/' ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() . '/assets/' ?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">-->
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
                            }
                            ?>

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
        <script src="<?php echo base_url() . '/assets/' ?>js/bootstrap-tab.js"></script>
        <script src="<?php echo base_url() . '/assets/' ?>js/perhitungan.js"></script>
        <script src="<?php echo base_url() . '/assets/' ?>js/fnFakeRowspan.js"></script>

        <script type="text/javascript" language="javascript" class="init">

            $(function () {
                var $divs1 = $('#divs1 > div');
                var $divs2 = $('#divs2 > div');
                var $divs3 = $('#divs3 > div');
                $divs1.hide();
                $divs2.hide();
                $divs3.hide();
                $('input[type=radio]').on('change', function () {
                    $divs1.hide();
                    $divs2.hide();
                    $divs3.hide();
                    $divs1.eq($('input[type=radio]').index(this)).show();
                    $divs2.eq($('input[type=radio]').index(this)).show();
                    $divs3.eq($('input[type=radio]').index(this)).show();
                });
            });
            $(function () {
                $('#myTab a:first').tab('show');
                $('#myTab a').click(function (e) {
                    e.preventDefault();
                    $(this).tab('show');
                })
            });

            $(document).ready(function () {

                $('#example').dataTable({
                    info: false
                });

                $('.inpTanggal').datepicker({
                    format: "dd-mm-yyyy",
                    todayHighlight: true
                });

                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getDetailPegawai",
                        data: {id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inGolongan").html(data[0]);
                            $("#inStatusPeg").html(data[1]);
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getSubtotalBiaya",
                        data: {nama_kota: $('#inKotaUangHarian1').val(),
                            id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangHarian1").attr("value", data[0] * $('#inLamaHari').val());
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getSubtotalBiaya",
                        data: {nama_kota: $('#inKotaUangHarian2').val(),
                            id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangHarian2").attr("value", data[0] * $('#inLamaHari').val());
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getSubtotalBiaya",
                        data: {nama_kota: $('#inKotaUangHarian3').val(),
                            id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangHarian3").attr("value", data[0] * $('#inLamaHari').val());
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaRepresentatif",
                        data: {nama_kota: $('#inKotaUangHarian1').val(),
                            id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalRepresentatif1").attr("value", data[0]);
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaRepresentatif",
                        data: {nama_kota: $('#inKotaUangHarian2').val(),
                            id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalRepresentatif2").attr("value", data[0]);
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaRepresentatif",
                        data: {nama_kota: $('#inKotaUangHarian3').val(),
                            id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalRepresentatif3").attr("value", data[0]);
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaDiklat",
                        data: {nama_kota: $('#inKotaUangDiklat1').val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalDiklat1").attr("value", data[0] * $('#inLamaHari').val());
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaDiklat",
                        data: {nama_kota: $('#inKotaUangDiklat2').val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalDiklat2").attr("value", data[0] * $('#inLamaHari').val());
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaDiklat",
                        data: {nama_kota: $('#inKotaUangDiklat3').val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalDiklat3").attr("value", data[0] * $('#inLamaHari').val());
                        }
                    });
                });
                //deleted from calculating in load time
//                $("#inNamaPegawai").change(function () {
//
//                    $.ajax({
//                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getSubtotalPenginapan",
//                        data: {nama_kota: $('#inKotaUangHarian1').val(),
//                            golongan: $('#inGolongan').text()},
//                        type: "POST",
//                        dataType: "json",
//                        success: function (data) {
//                            $("#inSubtotalUangPenginapan1").attr("value", data[0] * ($('#inLamaHari').val() - 1));
//                        }
//                    });
//                });
                $("#inJenisPenginapan1").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaHotelNonHotel",
                        data: {id: $(this).val(),
                            nama_kota: $('#inPenginapan1').val(),
                            golongan: $('#inGolongan').text()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangPenginapan1").attr("value", data[0] * ($('#inLamaHari').val() - 1));
                        }
                    });
                });
                $("#inJenisPenginapan2").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaHotelNonHotel",
                        data: {id: $(this).val(),
                            nama_kota: $('#inPenginapan2').val(),
                            golongan: $('#inGolongan').text()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangPenginapan2").attr("value", data[0] * ($('#inLamaHari').val() - 1));
                        }
                    });
                });
                $("#inJenisPenginapan3").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaHotelNonHotel",
                        data: {id: $(this).val(),
                            nama_kota: $('#inPenginapan3').val(),
                            golongan: $('#inGolongan').text()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangPenginapan3").attr("value", data[0] * ($('#inLamaHari').val() - 1));
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/populateTransport",
                        data: {
                            kota_asal1: $('#inKotaAsal1').val(),
                            kota_tujuan1: $('#inKotaTujuan1').val(),
                            kota_asal2: $('#inKotaAsal2').val(),
                            kota_tujuan2: $('#inKotaTujuan2').val(),
                            kota_asal3: $('#inKotaAsal3').val(),
                            kota_tujuan3: $('#inKotaTujuan3').val(),
                            kota_asal4: $('#inKotaAsal4').val(),
                            kota_tujuan4: $('#inKotaTujuan4').val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#idJenisTransportUtama1").html(data[0]);
                            $("#idJenisTransportUtama2").html(data[1]);
                            $("#idJenisTransportUtama3").html(data[2]);
                            $("#idJenisTransportUtama4").html(data[3]);
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/populateSewa",
                        data: {
                            kota_tujuan1: $('#inKotaTujuan1').val(),
                            kota_tujuan2: $('#inKotaTujuan2').val(),
                            kota_tujuan3: $('#inKotaTujuan3').val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inJenisSewa1").html(data[0]);
                            $("#inJenisSewa2").html(data[1]);
                            $("#inJenisSewa3").html(data[2]);
                        }
                    });
                });
                $("#idJenisTransportUtama1").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/calculateTransport",
                        data: {id: $(this).val(),
                            kota_asal: $('#inKotaAsal1').val(),
                            kota_tujuan: $('#inKotaTujuan1').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inSubtotalTransportUtama1").val(data);
                        }
                    });
                });
                $("#idJenisTransportUtama2").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/calculateTransport",
                        data: {id: $(this).val(),
                            kota_asal: $('#inKotaAsal2').val(),
                            kota_tujuan: $('#inKotaTujuan2').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inSubtotalTransportUtama2").val(data);
                        }
                    });
                });
                $("#idJenisTransportUtama3").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/calculateTransport",
                        data: {id: $(this).val(),
                            kota_asal: $('#inKotaAsal3').val(),
                            kota_tujuan: $('#inKotaTujuan3').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inSubtotalTransportUtama3").val(data);
                        }
                    });
                });
                $("#idJenisTransportUtama4").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/calculateTransport",
                        data: {id: $(this).val(),
                            kota_asal: $('#inKotaAsal4').val(),
                            kota_tujuan: $('#inKotaTujuan4').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inSubtotalTransportUtama4").val(data);
                        }
                    });
                });
                $("#inJenisSewa1").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/calculateSewa",
                        data: {id: $(this).val(),
                            kota_tujuan: $('#inKotaTujuan1').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inSubtotalSewa1").val(data);
                        }
                    });
                });
                $("#inJenisSewa2").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/calculateSewa",
                        data: {id: $(this).val(),
                            kota_tujuan: $('#inKotaTujuan2').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inSubtotalSewa2").val(data);
                        }
                    });
                });
                $("#inJenisSewa3").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/calculateSewa",
                        data: {id: $(this).val(),
                            kota_tujuan: $('#inKotaTujuan3').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inSubtotalSewa3").val(data);
                        }
                    });
                });
                $("#inTransPendukung").keyup(function () {

                    var total = $('#inTransPendukung').val();
                    $('#inSubtotalTransportPendukung').val(total);
                });
                $("#inTransPendukung").blur(function () {

                    var total = $('#inTransPendukung').val();
                    $('#inSubtotalTransportPendukung').val(total);
                });
                $("#inTransPendukung2").keyup(function () {

                    var total = $('#inTransPendukung2').val();
                    $('#inSubtotalTransportPendukung2').val(total);
                });
                $("#inTransPendukung2").blur(function () {

                    var total = $('#inTransPendukung2').val();
                    $('#inSubtotalTransportPendukung2').val(total);
                });
                $("#inTransPendukung3").keyup(function () {

                    var total = $('#inTransPendukung3').val();
                    $('#inSubtotalTransportPendukung3').val(total);
                });
                $("#inTransPendukung3").blur(function () {

                    var total = $('#inTransPendukung3').val();
                    $('#inSubtotalTransportPendukung3').val(total);
                });
                $("#inTransPendukung").keyup(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/hitungTotal",
                        data: {a: $('#inSubtotalUangHarian1').val(),
                            a2: $('#inSubtotalUangHarian2').val(),
                            a3: $('#inSubtotalUangHarian3').val(),
                            b: $('#inSubtotalUangPenginapan1').val(),
                            b2: $('#inSubtotalUangPenginapan2').val(),
                            b3: $('#inSubtotalUangPenginapan3').val(),
                            c: $('#inSubtotalTransportUtama1').val(),
                            c2: $('#inSubtotalTransportUtama2').val(),
                            c3: $('#inSubtotalTransportUtama3').val(),
                            c4: $('#inSubtotalTransportUtama4').val(),
                            d: $('#inSubtotalTransportPendukung').val(),
                            d2: $('#inSubtotalTransportPendukung2').val(),
                            d3: $('#inSubtotalTransportPendukung3').val(),
                            e: $('#inSubtotalPengeluaranRiil').val(),
                            e2: $('#inSubtotalPengeluaranRiil2').val(),
                            e3: $('#inSubtotalPengeluaranRiil3').val(),
                            f: $('#inSubtotalRepresentatif1').val(),
                            f2: $('#inSubtotalRepresentatif2').val(),
                            f3: $('#inSubtotalRepresentatif3').val(),
                            g: $('#inSubtotalDiklat1').val(),
                            g2: $('#inSubtotalDiklat2').val(),
                            g3: $('#inSubtotalDiklat3').val(),
                            h: $('#inSubtotalSewa1').val(),
                            h2: $('#inSubtotalSewa2').val(),
                            h3: $('#inSubtotalSewa3').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inTotalBiaya").val(data);
                        }

                    });
                });
                $("#inPengeluaranRiil").keyup(function () {

                    var total = $('#inPengeluaranRiil').val();
                    $('#inSubtotalPengeluaranRiil').val(total);
                });
                $("#inPengeluaranRiil").blur(function () {

                    var total = $('#inPengeluaranRiil').val();
                    $('#inSubtotalPengeluaranRiil').val(total);
                });
                $("#inPengeluaranRiil2").keyup(function () {

                    var total = $('#inPengeluaranRiil2').val();
                    $('#inSubtotalPengeluaranRiil2').val(total);
                });
                $("#inPengeluaranRiil2").blur(function () {

                    var total = $('#inPengeluaranRiil2').val();
                    $('#inSubtotalPengeluaranRiil2').val(total);
                });
                $("#inPengeluaranRiil3").keyup(function () {

                    var total = $('#inPengeluaranRiil3').val();
                    $('#inSubtotalPengeluaranRiil3').val(total);
                });
                $("#inPengeluaranRiil3").blur(function () {

                    var total = $('#inPengeluaranRiil3').val();
                    $('#inSubtotalPengeluaranRiil3').val(total);
                });
                $("#inPengeluaranRiil").keyup(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/hitungTotal",
                        data: {a: $('#inSubtotalUangHarian1').val(),
                            a2: $('#inSubtotalUangHarian2').val(),
                            a3: $('#inSubtotalUangHarian3').val(),
                            b: $('#inSubtotalUangPenginapan1').val(),
                            b2: $('#inSubtotalUangPenginapan2').val(),
                            b3: $('#inSubtotalUangPenginapan3').val(),
                            c: $('#inSubtotalTransportUtama1').val(),
                            c2: $('#inSubtotalTransportUtama2').val(),
                            c3: $('#inSubtotalTransportUtama3').val(),
                            c4: $('#inSubtotalTransportUtama4').val(),
                            d: $('#inSubtotalTransportPendukung').val(),
                            d2: $('#inSubtotalTransportPendukung2').val(),
                            d3: $('#inSubtotalTransportPendukung3').val(),
                            e: $('#inSubtotalPengeluaranRiil').val(),
                            e2: $('#inSubtotalPengeluaranRiil2').val(),
                            e3: $('#inSubtotalPengeluaranRiil3').val(),
                            f: $('#inSubtotalRepresentatif1').val(),
                            f2: $('#inSubtotalRepresentatif2').val(),
                            f3: $('#inSubtotalRepresentatif3').val(),
                            g: $('#inSubtotalDiklat1').val(),
                            g2: $('#inSubtotalDiklat2').val(),
                            g3: $('#inSubtotalDiklat3').val(),
                            h: $('#inSubtotalSewa1').val(),
                            h2: $('#inSubtotalSewa2').val(),
                            h3: $('#inSubtotalSewa3').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inTotalBiaya").val(data);
                        }

                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/hitungTotal",
                        data: {a: $('#inSubtotalUangHarian1').val(),
                            b: $('#inSubtotalUangPenginapan1').val(),
                            c: $('#inSubtotalTransportUtama1').val(),
                            d: $('#inSubtotalTransportPendukung').val(),
                            e: $('#inSubtotalPengeluaranRiil').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inTotalBiaya").val(data);
                        }

                    });
                });
                $("#idJenisTransportUtama1").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/hitungTotal",
                        data: {a: $('#inSubtotalUangHarian1').val(),
                            b: $('#inSubtotalUangPenginapan1').val(),
                            c: $('#inSubtotalTransportUtama1').val(),
                            d: $('#inSubtotalTransportPendukung').val(),
                            e: $('#inSubtotalPengeluaranRiil').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inTotalBiaya").val(data);
                        }

                    });
                });
                $("#inJenisPenginapan1").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/hitungTotal",
                        data: {a: $('#inSubtotalUangHarian1').val(),
                            b: $('#inSubtotalUangPenginapan1').val(),
                            c: $('#inSubtotalTransportUtama1').val(),
                            d: $('#inSubtotalTransportPendukung').val(),
                            e: $('#inSubtotalPengeluaranRiil').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inTotalBiaya").val(data);
                        }

                    });
                });
                $("#btnTambahPengajuan").click(function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/dayBetweenTwoDates",
                        data: {par1: $('#inTglPulang').val(),
                            par2: $('#inTglBerangkat').val()},
                        type: "POST",
                        success: function (data) {
                            $("#inLamaHari").attr("value", data);
                        }
                    });
                });
                $("#inNamaBarang").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/pengajuan_barang/getDetailBarang",
                        data: {id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSatuanBarang").val(data[0]);
                            $("#inHargaBarang").val(data[1]);
                            $("#inTipeBarang").val(data[2]);
                            $("#inMerk").val(data[3]);
                        }
                    });
                });

                $("#inIdAnggaran").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/pengajuan_barang/getDetailAnggaran",
                        data: {id: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inKodeKegiatan").val(data[0]);
                            $("#inAkun").val(data[1]);
                            $("#inPagu").val(data[2]);

                        }
                    });
                });
                $("#inJumlahUangHarian1").keyup(function () {

                    var biaya = parseInt($('#inSubtotalUangHarian1').val());
                    var jumlah = parseInt($('#inJumlahUangHarian1').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihUangHarian1').val(selisih);
                });
                $("#inJumlahUangPenginapan1").keyup(function () {

                    var biaya = parseInt($('#inSubtotalUangPenginapan1').val());
                    var jumlah = parseInt($('#inJumlahUangPenginapan1').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihUangPenginapan1').val(selisih);
                });
                $("#inJumlahTransportUtama1").keyup(function () {

                    var biaya = parseInt($('#inSubtotalTransportUtama1').val());
                    var jumlah = parseInt($('#inJumlahTransportUtama1').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihTransportUtama1').val(selisih);
                });
                $("#inJumlahTransportUtama2").keyup(function () {

                    var biaya = parseInt($('#inSubtotalTransportUtama2').val());
                    var jumlah = parseInt($('#inJumlahTransportUtama2').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihTransportUtama2').val(selisih);
                });
                $("#inJumlahTransportPendukung").keyup(function () {

                    var biaya = parseInt($('#inSubtotalTransportPendukung').val());
                    var jumlah = parseInt($('#inJumlahTransportPendukung').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihTransportPendukung').val(selisih);
                });
                $("#inJumlahRefresentatif").keyup(function () {

                    var biaya = parseInt($('#inSubtotalRefresentatif').val());
                    var jumlah = parseInt($('#inJumlahRefresentatif').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihRefresentatif').val(selisih);
                });
                $("#inJumlahDiklat").keyup(function () {

                    var biaya = parseInt($('#inSubtotalDiklat').val());
                    var jumlah = parseInt($('#inJumlahDiklat').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihDiklat').val(selisih);
                });
                $("#inJumlahSewa").keyup(function () {

                    var biaya = parseInt($('#inSubtotalSewa').val());
                    var jumlah = parseInt($('#inJumlahSewa').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihSewa').val(selisih);
                });
                $("#inJumlahPengeluaranRiil").keyup(function () {

                    var biaya = parseInt($('#inSubtotalPengeluaranRiil').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil').val());
                    var selisih = biaya - jumlah;
                    $('#inSelisihPengeluaranRiil').val(selisih);
                });
                $("#inJumlahPengeluaranRiil2").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil2').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil2').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil3").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil2').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil3').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil3').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil4").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil3').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil4').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil4').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil5").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil4').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil5').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil5').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil6").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil5').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil6').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil6').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil7").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil6').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil7').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil7').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil8").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil7').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil8').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil8').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil9").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil8').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil9').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil9').val(selisih2);
                });
                $("#inJumlahPengeluaranRiil10").keyup(function () {

                    var selisih1 = parseInt($('#inSelisihPengeluaranRiil9').val());
                    var jumlah = parseInt($('#inJumlahPengeluaranRiil10').val());
                    var selisih2 = selisih1 - jumlah;
                    $('#inSelisihPengeluaranRiil10').val(selisih2);
                });
                $("#inKodeJenisBarang").change(function() {
//alert($(this).val());
                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/pengajuan_barang/populateBarang",
                        data: {
                            kode_jenis: $(this).val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inNamaBarang").html(data[0]);
                        }
                    });
                });

//    $("#inNamaPegawai").change(function () {
//
//        $.ajax({
//            url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getStatus",
//            data: {id: $(this).val()},
//            type: "POST",
//            success: function (data) {
//                $("#inGolongan").val(data);
//            }
//
//        });
//    });

                $("#inKotaTujuan1").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/calculatePenginapan",
                        data: {nama_kota: $("#inKotaTujuan1 option:selected").text()},
                        type: "POST",
                        success: function (data) {
                            $("#outBiayaPenginapan").val(data);
                            $("#outBiayaPenginapanCalc").val($("#outLamaPerjalanan").val() + " Hari X " + data);
                            $("#outBiayaPenginapanTotal").val($("#outLamaPerjalanan").val() * data);
                        }

                    });
                });
                $("#inTransportUtama").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/calculateTransport",
                        data: {id: $(this).val()},
                        type: "POST",
                        success: function (data) {
                            $("#outTransportUtama").attr("value", data);
                            $("#outTransportUtamaCalc").attr("value", "2 X " + data);
                            $("#outTransportUtamaTotal").attr("value", 2 * data);
                            $("#inTransportUtamaTotal").attr("value", data);
                        }

                    });
                });

                $("#btnTambahDetail").click(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/dayBetweenTwoDates",
                        data: {par1: $('.inJadwalPulang1').val(),
                            par2: $('.inJadwalBerangkat1').val(),
                            par3: $('.inJadwalPulang2').val(),
                            par4: $('.inJadwalBerangkat2').val(),
                            par5: $('.inJadwalPulang3').val(),
                            par6: $('.inJadwalBerangkat3').val()},
                        type: "POST",
                        success: function (data) {
                            $("#outLamaPerjalanan").val(data);
                        }
                    });
                });
                $("#btnTambahDetail").click(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/hitungAkomodasi",
                        data: {par1: $('.inJadwalPulang1').val(),
                            par2: $('.inJadwalBerangkat1').val(),
                            par3: $('.inJadwalPulang2').val(),
                            par4: $('.inJadwalBerangkat2').val(),
                            par5: $('.inJadwalPulang3').val(),
                            par6: $('.inJadwalBerangkat3').val(),
                            par7: $('#inKotaTujuan1').val(),
                            par8: $('#inKotaTujuan2').val(),
                            par9: $('#inKotaTujuan3').val()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#outBiayaAkomodasiPengali1").attr("value", data[0] + " X");
                            $("#outBiayaAkomodasiPengali2").attr("value", data[1] + " X");
                            $("#outBiayaAkomodasiPengali3").attr("value", data[2] + " X");
                            $("#outBiayaAkomodasi1").attr("value", data[3]);
                            $("#outBiayaAkomodasi2").attr("value", data[4]);
                            $("#outBiayaAkomodasi3").attr("value", data[5]);
                            $("#inBiayaAkomodasi1").attr("value", data[3]);
                            $("#inBiayaAkomodasi2").attr("value", data[4]);
                            $("#inBiayaAkomodasi3").attr("value", data[5]);
                            $("#outBiayaAkomodasiTotal").attr("value", data[6]);
                            $("#outBiayaPenginapanPengali1").attr("value", data[0] + " X");
                            $("#outBiayaPenginapanPengali2").attr("value", data[1] + " X");
                            $("#outBiayaPenginapanPengali3").attr("value", data[2] + " X");
                            $("#outBiayaPenginapan1").attr("value", data[7]);
                            $("#outBiayaPenginapan2").attr("value", data[8]);
                            $("#outBiayaPenginapan3").attr("value", data[9]);
                            $("#inBiayaPenginapan1").attr("value", data[7]);
                            $("#inBiayaPenginapan2").attr("value", data[8]);
                            $("#inBiayaPenginapan3").attr("value", data[9]);
                            $("#outBiayaPenginapanTotal").attr("value", data[10]);
                            $("#detailKotaTujuan1").attr("value", $('#inKotaTujuan1 option:selected').text());
                            $("#detailKotaTujuan2").attr("value", $('#inKotaTujuan2 option:selected').text());
                            $("#detailKotaTujuan3").attr("value", $('#inKotaTujuan3 option:selected').text());
                        }
                    });
                });
                $("#btnTambahDetail").click(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/populateTransport",
                        data: {nama_kota: $("#inKotaTujuan1 option:selected").text()},
                        type: "POST",
                        success: function (data) {
                            $("#inTransportUtama").html(data);
                        }

                    });
                });
                $("#btnHitungTotal").click(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/hitungTotal",
                        data: {a: $('#outBiayaAkomodasiTotal').val(),
                            b: $('#outBiayaPenginapanTotal').val(),
                            c: $('#outTransportUtamaTotal').val(),
                            d: $('#outTransportPendukung').val(),
                            e: $('#outPengeluaranRiil').val()},
                        type: "POST",
                        success: function (data) {
                            $("#outTOTAL").val(data);
//                             $("#outBiayaAkomodasi1").val($('#inKotaTujuan1').val());
                        }

                    });
                    return false;
                });
                $("input[name$='jumtujuan']").click(function () {
                    var test = $(this).val();
                    $("div.desc").hide();
                    $("#Tujuan" + test).show();
                });
            });
//tambahan untuk fakerowspan
            var table = $('#example2').DataTable({
                "columnDefs": [
                    {"visible": false, "targets": 1}
                ],
                "order": [[1, 'asc']],
                "displayLength": 10,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({page: 'current'}).nodes();
                    var last = null;

                    api.column(1, {page: 'current'}).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                    );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example2 tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 1 && currentOrder[1] === 'asc') {
                    table.order([1, 'desc']).draw();
                }
                else {
                    table.order([1, 'asc']).draw();
                }
            });



        </script>
        <!-- script buat transaksi perjalnan dinas (temp) -->


    </body>
</html>
