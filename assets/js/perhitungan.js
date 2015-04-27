
$(document).ready(function () {

    $('.inpTanggal').datepicker({
        format: "dd-mm-yyyy",
        todayHighlight: true
    });

    $("#inPegawai").change(function () {

        $.ajax({
            url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/getNip",
            data: {id: $(this).val()},
            type: "POST",
            success: function (data) {
                $("#inNIP").val(data);
            }

        });
    });
    $("#inPegawai").change(function () {

        $.ajax({
            url: "<?php echo base_url(); ?>transaksi/perjalanandinasdetail/getGolongan",
            data: {id: $(this).val()},
            type: "POST",
            success: function (data) {
                $("#inGolongan").val(data);
            }

        });
    });

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
    $("#inTransportPendukung").keyup(function () {

        var total = $('#inTransportPendukung').val();
        $('#outTransportPendukung').val(total);
    });
    $("#inPengeluaranRiil").keyup(function () {

        var total = $('#inPengeluaranRiil').val();
        $('#outPengeluaranRiil').val(total);
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

    