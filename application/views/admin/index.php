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
                            } else {
                                ?>
                                <!--                                <div class="widget">
                                                                    <div class="widget-header"> <i class="icon-signal"></i>
                                                                        <h3>Grafik pengajuan Perjalanan Dinas dan Barang</h3>
                                                                    </div>
                                                                     /widget-header 
                                                                    <div class="widget-content">
                                                                        <canvas id="area-chart" class="chart-holder" height="250" width="1100"> </canvas>
                                                                         /area-chart  
                                                                    </div>
                                                                     /widget-content 
                                                                </div>-->
                                <!-- /widget -->
                                <!-- /widget-header -->
                                <div class="widget-header"> <i class="icon-signal"></i>
                                    <h3>Task List</h3>
                                </div>
                                <div class="widget-content" style="padding: 10px;">
                                    <input type="hidden" name="inRole" id="inRole" value="<?php echo $akun['role'] ?>"/>
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%"> No</th>
                                                <th> No SPT</th>
                                                <th> ID Anggaran</th>
                                                <th> Status Approval</th>
                                                <th class="td-actions"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($list_data as $row) {
                                                echo "<tr>"
                                                . "<td>" . $no . "</td>"
                                                . "<td>" . $row->no_spt . " </td>"
                                                . "<td>" . $row->nama_kegiatan . "</td>";


                                                if ($row->status_approval == 1) {
                                                    echo "<td>Sedang diproses di operator</td>";
                                                } else if ($row->status_approval == 2) {
                                                    echo "<td>Sedang diproses di eselon IV</td>";
                                                } else if ($row->status_approval == 3) {
                                                    echo "<td>Sedang diproses di eselon III</td>";
                                                } else if ($row->status_approval == 4) {
                                                    echo "<td>Sedang diproses di asisten satker</td>";
                                                } else if ($row->status_approval == 5) {
                                                    echo "<td>Sedang diproses di kepala satker</td>";
                                                } else {
                                                    echo "<td></td>";
                                                }


                                                echo "<td class=\"td-actions\">"
                                                . "<a href=\"" . site_url('transaksi/perjalanandinas/edit/' . $row->id) . "\" class=\"btn btn-mini btn-success\"><i class=\"btn-icon-only icon-ok\"> </i></a>"
                                                . "<a href=\"" . site_url('master/anggaran/delete/' . $row->id) . "\" class=\"btn btn-danger btn-mini\"><i class=\"btn-icon-only icon-remove\"> </i></a>
                                                </td>"
                                                . "</tr>";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /widget-content --> 
                                <?php
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
        <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $('#example').DataTable({
                    info: false
                });
            });</script>

        <!-- script buat transaksi perjalnan dinas (temp) -->

        <script type="text/javascript">
            $(document).ready(function() {

                $('#inDateStart').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });
                $('#inDateFinish').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });
                $('.inpTanggal').datepicker({
                    format: "dd-mm-yyyy",
                    todayHighlight: true
                });
                $('.inJadwalBerangkat1').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });
                $('.inJadwalBerangkat2').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });
                $('.inJadwalBerangkat3').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });
                $('.inJadwalPulang1').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });
                $('.inJadwalPulang2').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });
                $('.inJadwalPulang3').datepicker({
                    format: "yyyy-mm-dd",
                    todayHighlight: true
                });

                $("#inPegawai").change(function() {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/getNip",
                        data: {id: $(this).val()},
                        type: "POST",
                        success: function(data) {
                            $("#inNIP").val(data);
                        }

                    });
                });
                $("#inPegawai").change(function() {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/getGolongan",
                        data: {id: $(this).val()},
                        type: "POST",
                        success: function(data) {
                            $("#inGolongan").val(data);
                        }

                    });
                });

                $("#inKotaTujuan1").change(function() {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/calculatePenginapan",
                        data: {nama_kota: $("#inKotaTujuan1 option:selected").text()},
                        type: "POST",
                        success: function(data) {
                            $("#outBiayaPenginapan").val(data);
                            $("#outBiayaPenginapanCalc").val($("#outLamaPerjalanan").val() + " Hari X " + data);
                            $("#outBiayaPenginapanTotal").val($("#outLamaPerjalanan").val() * data);
                        }

                    });
                });
//                $("#inKotaTujuan1").change(function () {
//
//                    $.ajax({
//                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/populateTransport",
//                        data: {nama_kota: $("#inKotaTujuan1 option:selected").text()},
//                        type: "POST",
//                        success: function (data) {
//                            $("#inKendaraanUtama1").html(data);
//                        }
//
//                    });
//                });
                $("#inTransportUtama").change(function() {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/calculateTransport",
                        data: {id: $(this).val()},
                        type: "POST",
                        success: function(data) {
                            $("#outTransportUtama").attr("value", data);
                            $("#outTransportUtamaCalc").attr("value", "2 X " + data);
                            $("#outTransportUtamaTotal").attr("value", 2 * data);

                            $("#inTransportUtamaTotal").attr("value", data);
                        }

                    });
                });
                $("#inTransportPendukung").keyup(function() {

                    var total = $('#inTransportPendukung').val();
                    $('#outTransportPendukung').val(total);
                });
                $("#inPengeluaranRiil").keyup(function() {

                    var total = $('#inPengeluaranRiil').val();
                    $('#outPengeluaranRiil').val(total);
                });


                $("#btnTambahDetail").click(function() {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/dayBetweenTwoDates",
                        data: {par1: $('.inJadwalPulang1').val(),
                            par2: $('.inJadwalBerangkat1').val(),
                            par3: $('.inJadwalPulang2').val(),
                            par4: $('.inJadwalBerangkat2').val(),
                            par5: $('.inJadwalPulang3').val(),
                            par6: $('.inJadwalBerangkat3').val()},
                        type: "POST",
                        success: function(data) {
                            $("#outLamaPerjalanan").val(data);
                        }
                    });
                });

                $("#btnTambahDetail").click(function() {

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
                        success: function(data) {
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
                $("#btnTambahDetail").click(function() {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/populateTransport",
                        data: {nama_kota: $("#inKotaTujuan1 option:selected").text()},
                        type: "POST",
                        success: function(data) {
                            $("#inTransportUtama").html(data);
                        }

                    });
                });
//                $("#btnTambahDetail").click(function () {
//
//                    $.ajax({
//                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/calculateAkomodasi",
//                        data: {id: $(this).val()},
//                        type: "POST",
//                        success: function (data) {
//                            $("#outBiayaAkomodasi").val(data);
//                            $("#outBiayaAkomodasiCalc").val($("#outLamaPerjalanan").val() + " Hari X " + data);
//                            $("#outBiayaAkomodasiTotal").val($("#outLamaPerjalanan").val() * data);
//                        }
//
//                    });
//                });

                $("#btnHitungTotal").click(function() {

                    $.ajax({
                        url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/hitungTotal",
                        data: {a: $('#outBiayaAkomodasiTotal').val(),
                            b: $('#outBiayaPenginapanTotal').val(),
                            c: $('#outTransportUtamaTotal').val(),
                            d: $('#outTransportPendukung').val(),
                            e: $('#outPengeluaranRiil').val()},
                        type: "POST",
                        success: function(data) {
                            $("#outTOTAL").val(data);
//                             $("#outBiayaAkomodasi1").val($('#inKotaTujuan1').val());
                        }

                    });
                    return false;
                });

                $("input[name$='jumtujuan']").click(function() {
                    var test = $(this).val();

                    $("div.desc").hide();
                    $("#Tujuan" + test).show();
                });

            });

            //hide jumlah tujuan
            $(function() {
                var $divs1 = $('#divs1 > div');
                var $divs2 = $('#divs2 > div');
                var $divs3 = $('#divs3 > div');
                $divs1.hide();
                $divs2.hide();
                $divs3.hide();
                $('input[type=radio]').on('change', function() {
                    $divs1.hide();
                    $divs2.hide();
                    $divs3.hide();
                    $divs1.eq($('input[type=radio]').index(this)).show();
                    $divs2.eq($('input[type=radio]').index(this)).show();
                    $divs3.eq($('input[type=radio]').index(this)).show();
                });
            });

        </script>
    </body>
</html>
