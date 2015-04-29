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
        <script src="<?php echo base_url() . '/assets/' ?>js/perhitungan.js"></script>
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

            $(document).ready(function () {

                $('#example').DataTable({
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
                            statuspeg: $('#inStatusPeg').text()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangHarian1").attr("value", data[0] * $('#inLamaHari').val());
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getSubtotalPenginapan",
                        data: {nama_kota: $('#inKotaUangHarian1').val(),
                            golongan: $('#inGolongan').text()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangPenginapan1").attr("value", data[0] * ($('#inLamaHari').val() - 1));
                        }
                    });
                });
                $("#inJenisPenginapan1").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/getBiayaHotelNonHotel",
                        data: {id: $(this).val(),
                            nama_kota: $('#inKotaUangHarian1').val(),
                            golongan: $('#inGolongan').text()},
                        type: "POST",
                        dataType: "json",
                        success: function (data) {
                            $("#inSubtotalUangPenginapan1").attr("value", data[0] * ($('#inLamaHari').val() - 1));
                        }
                    });
                });
                $("#inNamaPegawai").change(function () {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanan_dinas/populateTransport",
                        data: {
                            kota_asal: $('#inKotaAsal1').val(),
                            kota_tujuan: $('#inKotaTujuan1').val()},
                        type: "POST",
                        success: function (data) {
                            $("#idJenisTransportUtama1").html(data);
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
                            $("#inSubtotalTransportUtama1").val(data*2);
                        }
                    });
                });
                $("#inTransPendukung").keyup(function () {

                    var total = $('#inTransPendukung').val();
                    $('#inSubtotalTransportPendukung').val(total);
                });
                $("#inTransPendukung").keyup(function () {

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
                $("#inPengeluaranRiil").keyup(function () {

                    var total = $('#inPengeluaranRiil').val();
                    $('#inSubtotalPengeluaranRiil').val(total);
                });
                $("#inPengeluaranRiil").keyup(function () {

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
//hide jumlah tujuan



        </script>
        <!-- script buat transaksi perjalnan dinas (temp) -->


    </body>
</html>
