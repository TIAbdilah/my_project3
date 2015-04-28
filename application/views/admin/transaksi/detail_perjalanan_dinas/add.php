
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_perjalanan_dinas/process/add') ?>" method="POST">
    <input type="hidden" name="inIdHeader" value="<?php echo $data->id?>" />
    <input type="hidden" name="inJmlTujuan" value="<?php echo $data->jumlah_tujuan?>" />
    <input type="hidden" name="inTglBerangkat" id="inTglBerangkat" value="<?php echo $data->jadwal_berangkat_1?>" />
    <input type="hidden" name="inTglPulang" id="inTglPulang" value="<?php echo $data->jadwal_pulang_1?>" />
    <input type="hidden" name="inLamaHari" id="inLamaHari"/>
    <table border="0" style="width: 100%">        
       
        <tbody>
            <tr>
                <td><label>Nama Pegawai</label></td>
                <td colspan="2">
                    <select class="input-xlarge" name="inNamaPegawai" id="inNamaPegawai">
                        <option value="">Pilih</option>
                        <?php
                        foreach ($SIList_pegawai as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Golongan</label></td>
                <td>
                    <label id="inGolongan" name="inGolongan"></label>

                </td>

            </tr>
            <tr>
                <td><label>Status Pegawai</label></td>
                <td>
                    <label id="inStatusPeg" name="inStatusPeg"></label>

                </td>
            </tr>
            <tr>
                <td colspan="6"><hr></td>
            </tr>
            <tr>
                <td></td>
                <td align="center"><strong>Kota Asal</strong></td>
                <td align="center"><strong>Kota Tujuan</strong></td>
                <td align="center"><strong>Jenis</strong></td>
                <td align="center"></td>
                <td align="center"><strong>Subtotal</strong></td>
            </tr>
            <tr>
                <td><label>Uang Harian</label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inKotaUangHarian1" name="inKotaUangHarian1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>

                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalUangHarian1" name="inSubtotalUangHarian1"/></td>
            </tr>
            <tr>
                <td><label>Penginapan</label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inPenginapan1" name="inPenginapan1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                <td>
                    <select class="input" name="inJenisPenginapan1" id="inJenisPenginapan1">
                        <?php
                        foreach ($SIList_jenisPenginapan as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>

                </td>

                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalUangPenginapan1" name="inSubtotalUangPenginapan1"/></td>
            </tr>
            <tr>
                <td><label>Transport Utama</label></td>
                <td><input type="text" placeholder="Dari" id="inKotaAsal1" name="inKotaAsal1" value="Bandung"/></td>
                <td><input type="text" placeholder="Ke" id="inKotaTujuan1" name="inKotaTujuan1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                <td>
                    <select name="idJenisTransportUtama1" id="idJenisTransportUtama1">
                        
                    </select>
                </td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalTransportUtama1" name="inSubtotalTransportUtama1"/></td>
            </tr>
            <tr>
                <td><label>Transport Pendukung</label></td>
                <td><input type="text" placeholder="Jumlah" id="inTransPendukung" name="inTransPendukung"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalTransportPendukung" name="inSubtotalTransportPendukung"/></td>
            </tr>
            <tr>
                <td><label>Pengeluaran Riil</label></td>
                <td><input type="text" placeholder="Jumlah" id="inPengeluaranRiil" name="inPengeluaranRiil"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalPengeluaranRiil" name="inSubtotalPengeluaranRiil"/></td>
            </tr>
            <tr>
                <td colspan="5" align="center"><label><b>TOTAL</b></label></td>
                <td><input type="text" placeholder="Total" id="inTotalBiaya" name="inTotalBiaya"/></td>
            </tr>
            <tr>
                <td colspan="6" align="center"><input type="submit" value="Simpan"/></td>
            </tr>
        </tbody>
    </table>
</form>
