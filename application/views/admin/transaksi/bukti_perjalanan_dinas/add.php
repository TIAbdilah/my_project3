<?php

function format_date($string) {
    return substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
}
?>

<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Bukti Perjalanan Dinas</h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/bukti_perjalanan_dinas/process/add') ?>" method="POST">

            <input type="hidden" name="inJmlTujuan" value="<?php echo $jumlah_tujuan ?>" />
            <input type="hidden" name="inIdPegawai" value="<?php echo $id_pegawai ?>" />
             <input type="hidden" name="inIdHeader" value="<?php echo $id_header ?>" />

            <table border="0" style="width: 100%">        

                <tbody>

                    <tr>
                        <td></td>
                        <td align="center"><strong>Biaya</strong></td>
                        <td align="center"><strong>Nomor Bukti</strong></td>
                        <td align="center"><strong>Jumlah</strong></td>
                        <td align="center"><strong>Selisih</strong></td>
                    </tr>
                    <tr>
                        <td><label>Uang Harian</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalUangHarian1" name="inSubtotalUangHarian1" value="<?php echo $data_detail->harian ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiUangHarian1" name="inNomorBuktiUangHarian1" /></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahUangHarian1" name="inJumlahUangHarian1"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihUangHarian1" name="inSelisihUangHarian1"/></td>
                    </tr>
                    <tr>
                        <td><label>Penginapan</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalUangPenginapan1" name="inSubtotalUangPenginapan1" value="<?php echo $data_detail->penginapan ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiUangPenginapan1" name="inNomorBuktiUangPenginapan1"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahUangPenginapan1" name="inJumlahUangPenginapan1"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihUangPenginapan1" name="inSelisihUangPenginapan1"/></td>
                    </tr>
                    <tr>
                        <td><label>Transport Utama</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalTransportUtama1" name="inSubtotalTransportUtama1" value="<?php echo $data_detail->transport_utama ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiTransportUtama1" name="inNomorBuktiTransportUtama1"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahTransportUtama1" name="inJumlahTransportUtama1"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihTransportUtama1" name="inSelisihTransportUtama1"/></td>
                    </tr>
<!--                    <tr>
                        <td></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalTransportUtama2" name="inSubtotalTransportUtama2"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiTransportUtama2" name="inNomorBuktiTransportUtama2"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahTransportUtama2" name="inJumlahTransportUtama2"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihTransportUtama2" name="inSelisihTransportUtama2"/></td>
                    </tr>-->
                    <tr>
                        <td><label>Transport Pendukung</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalTransportPendukung" name="inSubtotalTransportPendukung" value="<?php echo $data_detail->transport_pendukung ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiTransportPendukung" name="inNomorBuktiTransportPendukung"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahTransportPendukung" name="inJumlahTransportPendukung"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihTransportPendukung" name="inSelisihTransportPendukung"/></td>
                    </tr>
                    <tr>
                        <td><label>Pengeluaran Riil</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalPengeluaranRiil" name="inSubtotalPengeluaranRiil" value="<?php echo $data_detail->riil ?>"/></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil" name="inNomorBuktiPengeluaranRiil" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil" name="inJumlahPengeluaranRiil"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil" name="inSelisihPengeluaranRiil"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil2" name="inNomorBuktiPengeluaranRiil2" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil2" name="inJumlahPengeluaranRiil2"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil2" name="inSelisihPengeluaranRiil2"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil3" name="inNomorBuktiPengeluaranRiil3" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil3" name="inJumlahPengeluaranRiil3"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil3" name="inSelisihPengeluaranRiil3"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil4" name="inNomorBuktiPengeluaranRiil4" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil4" name="inJumlahPengeluaranRiil4"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil4" name="inSelisihPengeluaranRiil4"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil5" name="inNomorBuktiPengeluaranRiil5" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil5" name="inJumlahPengeluaranRiil5"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil5" name="inSelisihPengeluaranRiil5"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil6" name="inNomorBuktiPengeluaranRiil6" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil6" name="inJumlahPengeluaranRiil6"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil6" name="inSelisihPengeluaranRiil6"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil7" name="inNomorBuktiPengeluaranRiil7" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil7" name="inJumlahPengeluaranRiil7"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil7" name="inSelisihPengeluaranRiil7"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil8" name="inNomorBuktiPengeluaranRiil8" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil8" name="inJumlahPengeluaranRiil8"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil8" name="inSelisihPengeluaranRiil8"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil9" name="inNomorBuktiPengeluaranRiil9" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil9" name="inJumlahPengeluaranRiil9"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil9" name="inSelisihPengeluaranRiil9"/></td>
                    </tr>
                    <tr>
                        <td><label></label></td>
                        <td></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil10" name="inNomorBuktiPengeluaranRiil10" rows="2" placeholder="Deskripsi Pengeluaran Riil"></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil10" name="inJumlahPengeluaranRiil10"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil10" name="inSelisihPengeluaranRiil10"/></td>
                    </tr>
                   
<!--                    <tr>
                        <td colspan="3" align="center"><label><b>TOTAL</b></label></td>
                        <td><input type="text" placeholder="Total" id="inTotalBiaya" name="inTotalBiaya"/></td>
                    </tr>-->
                    <tr>
                        <td colspan="5" align="center"><input type="submit" value="Simpan"/></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<!-- /widget-header --> 
