<?php

function format_date($string) {
    return substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
}
?>

<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data </h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/bukti_perjalanan_dinas/process/edit') ?>" method="POST">

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
                        <td><input type="text" placeholder="Biaya" id="inSubtotalUangHarian1" name="inSubtotalUangHarian1" value="<?php echo number_format($data_detail->harian) ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiUangHarian1" name="inNomorBuktiUangHarian1" value="<?php echo $data_bukti->nomor_harian ?>"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahUangHarian1" name="inJumlahUangHarian1" value="<?php echo $data_bukti->jumlah_harian ?>"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihUangHarian1" name="inSelisihUangHarian1" value="<?php echo number_format($data_detail->harian-$data_bukti->jumlah_harian) ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Penginapan</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalUangPenginapan1" name="inSubtotalUangPenginapan1" value="<?php echo number_format($data_detail->penginapan) ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiUangPenginapan1" name="inNomorBuktiUangPenginapan1" value="<?php echo $data_bukti->nomor_penginapan ?>"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahUangPenginapan1" name="inJumlahUangPenginapan1" value="<?php echo $data_bukti->jumlah_penginapan ?>"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihUangPenginapan1" name="inSelisihUangPenginapan1" value="<?php echo number_format($data_detail->penginapan-$data_bukti->jumlah_penginapan) ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Transport Utama</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalTransportUtama1" name="inSubtotalTransportUtama1" value="<?php echo number_format($data_detail->transport_utama) ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiTransportUtama1" name="inNomorBuktiTransportUtama1" value="<?php echo $data_bukti->nomor_transport_utama ?>"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahTransportUtama1" name="inJumlahTransportUtama1" value="<?php echo $data_bukti->jumlah_transport_utama ?>"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihTransportUtama1" name="inSelisihTransportUtama1" value="<?php echo number_format($data_detail->transport_utama-$data_bukti->jumlah_transport_utama) ?>"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalTransportUtama2" name="inSubtotalTransportUtama2"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiTransportUtama2" name="inNomorBuktiTransportUtama2" value="<?php echo $data_bukti->nomor_transport_utama_2 ?>"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahTransportUtama2" name="inJumlahTransportUtama2" value="<?php echo $data_bukti->jumlah_transport_utama_2 ?>"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihTransportUtama2" name="inSelisihTransportUtama2"/></td>
                    </tr>
                    <tr>
                        <td><label>Transport Pendukung</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalTransportPendukung" name="inSubtotalTransportPendukung" value="<?php echo number_format($data_detail->transport_pendukung) ?>"/></td>
                        <td><input type="text" placeholder="Nomor" id="inNomorBuktiTransportPendukung" name="inNomorBuktiTransportPendukung" value="<?php echo $data_bukti->nomor_transport_pendukung ?>"/></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahTransportPendukung" name="inJumlahTransportPendukung" value="<?php echo $data_bukti->jumlah_transport_pendukung ?>"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihTransportPendukung" name="inSelisihTransportPendukung" value="<?php echo number_format($data_detail->transport_pendukung-$data_bukti->jumlah_transport_pendukung) ?>"/></td>
                    </tr>
                    <tr>
                        <td><label>Pengeluaran Riil</label></td>
                        <td><input type="text" placeholder="Biaya" id="inSubtotalPengeluaranRiil" name="inSubtotalPengeluaranRiil" value="<?php echo number_format($data_detail->riil) ?>"/></td>
                        <td><textarea id="inNomorBuktiPengeluaranRiil" name="inNomorBuktiPengeluaranRiil" rows="10" placeholder="Deskripsi Pengeluaran Riil"  ><?php echo $data_bukti->nomor_riil ?></textarea></td>
                        <td><input type="text" placeholder="Jumlah" id="inJumlahPengeluaranRiil" name="inJumlahPengeluaranRiil" value="<?php echo $data_bukti->jumlah_riil ?>"/></td>
                        <td><input type="text" placeholder="Selisih" id="inSelisihPengeluaranRiil" name="inSelisihPengeluaranRiil" value="<?php echo number_format($data_detail->riil-$data_bukti->jumlah_riil) ?>"/></td>
                    </tr>
<!--                    <tr>
                        <td colspan="4" align="center"><label><b>TOTAL</b></label></td>
                        <td><input type="text" placeholder="Total" id="inTotalBiaya" name="inTotalBiaya" /></td>
                    </tr>-->
<!--                    <tr>
                        <td colspan="5" align="center"><input type="submit" value="Simpan"/></td>
                    </tr>-->
                </tbody>
            </table>
        </form>
    </div>
</div>
<!-- /widget-header --> 
