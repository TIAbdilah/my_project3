<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_perjalanan_dinas/process/add') ?>" method="POST">
    <input type="hidden" name="inIdHeader" value="<?php echo $data->id ?>" />
    <input type="hidden" name="inJmlTujuan" value="<?php echo $data->jumlah_tujuan ?>" />
    <input type="hidden" name="inTglBerangkat" id="inTglBerangkat" value="<?php echo $data->jadwal_berangkat_1 ?>" />
    <input type="hidden" name="inTglPulang" id="inTglPulang" value="<?php echo $data->jadwal_pulang_1 ?>" />
    <input type="hidden" name="inTglBerangkat2" id="inTglBerangkat2" value="<?php echo $data->jadwal_berangkat_2 ?>" />
    <input type="hidden" name="inTglPulang2" id="inTglPulang2" value="<?php echo $data->jadwal_pulang_2 ?>" />
    <input type="hidden" name="inTglBerangkat3" id="inTglBerangkat3" value="<?php echo $data->jadwal_berangkat_3 ?>" />
    <input type="hidden" name="inTglPulang3" id="inTglPulang3" value="<?php echo $data->jadwal_pulang_3 ?>" />
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
                <td><label></label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inKotaUangHarian2" name="inKotaUangHarian2" value="<?php echo $data->nama_kota_tujuan_2 ?>"/></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalUangHarian2" name="inSubtotalUangHarian2"/></td>
            </tr>
            <tr>
                <td><label></label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inKotaUangHarian3" name="inKotaUangHarian3" value="<?php echo $data->nama_kota_tujuan_3 ?>"/></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalUangHarian3" name="inSubtotalUangHarian3"/></td>
            </tr>
            <tr>
                <td><label>Penginapan</label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inPenginapan1" name="inPenginapan1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                <td>
                    <select class="input" name="inJenisPenginapan1" id="inJenisPenginapan1">
                        <option value="">Pilih</option>
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
                <td><label></label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inPenginapan2" name="inPenginapan2" value="<?php echo $data->nama_kota_tujuan_2 ?>"/></td>
                <td>
                    <select class="input" name="inJenisPenginapan2" id="inJenisPenginapan2">
                        <option value="">Pilih</option>
                        <?php
                        foreach ($SIList_jenisPenginapan as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>

                </td>

                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalUangPenginapan2" name="inSubtotalUangPenginapan2"/></td>
            </tr>
            <tr>
                <td><label></label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inPenginapan3" name="inPenginapan3" value="<?php echo $data->nama_kota_tujuan_3 ?>"/></td>
                <td>
                    <select class="input" name="inJenisPenginapan3" id="inJenisPenginapan3">
                        <option value="">Pilih</option>
                        <?php
                        foreach ($SIList_jenisPenginapan as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>

                </td>

                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalUangPenginapan3" name="inSubtotalUangPenginapan3"/></td>
            </tr>
            <tr>
                <td><label>Biaya Representatif</label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inKotaUangHarian1" name="inKotaUangHarian1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalRepresentatif1" name="inSubtotalRepresentatif1"/></td>
            </tr>
            <tr>
                <td><label></label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inKotaUangHarian2" name="inKotaUangHarian2" value="<?php echo $data->nama_kota_tujuan_2 ?>"/></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalRepresentatif2" name="inSubtotalRepresentatif2"/></td>
            </tr>
            <tr>
                <td><label></label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inKotaUangHarian3" name="inKotaUangHarian3" value="<?php echo $data->nama_kota_tujuan_3 ?>"/></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalRepresentatif3" name="inSubtotalRepresentatif3"/></td>
            </tr>
            <?php if ($data->status_diklat == 1) { ?>
                <tr>
                    <td><label>Uang Diklat</label></td>
                    <td></td>
                    <td><input type="text" placeholder="Di" id="inKotaUangDiklat1" name="inKotaUangDiklat1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="Subtotal" id="inSubtotalDiklat1" name="inSubtotalDiklat1"/></td>
                </tr>
                <tr>
                    <td><label></label></td>
                    <td></td>
                    <td><input type="text" placeholder="Di" id="inKotaUangDiklat2" name="inKotaUangDiklat2" value="<?php echo $data->nama_kota_tujuan_2 ?>"/></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="Subtotal" id="inSubtotalDiklat2" name="inSubtotalDiklat2"/></td>
                </tr>
                <tr>
                    <td><label></label></td>
                    <td></td>
                    <td><input type="text" placeholder="Di" id="inKotaUangDiklat3" name="inKotaUangDiklat3" value="<?php echo $data->nama_kota_tujuan_3 ?>"/></td>
                    <td></td>
                    <td></td>
                    <td><input type="text" placeholder="Subtotal" id="inSubtotalDiklat3" name="inSubtotalDiklat3"/></td>
                </tr>
            <?php } ?>
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
                <td><label></label></td>
                <td><input type="text" placeholder="Dari" id="inKotaAsal2" name="inKotaAsal2" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                <td><input type="text" placeholder="Ke" id="inKotaTujuan2" name="inKotaTujuan2" value="<?php echo $data->nama_kota_tujuan_2 ?>"/></td>
                <td>
                    <select name="idJenisTransportUtama2" id="idJenisTransportUtama2">

                    </select>
                </td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalTransportUtama2" name="inSubtotalTransportUtama2"/></td>
            </tr>
            <tr>
                <td><label></label></td>
                <td><input type="text" placeholder="Dari" id="inKotaAsal3" name="inKotaAsal3" value="<?php echo $data->nama_kota_tujuan_2 ?>"/></td>
                <td><input type="text" placeholder="Ke" id="inKotaTujuan3" name="inKotaTujuan3" value="<?php echo $data->nama_kota_tujuan_3 ?>"/></td>
                <td>
                    <select name="idJenisTransportUtama3" id="idJenisTransportUtama3">

                    </select>
                </td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalTransportUtama3" name="inSubtotalTransportUtama3"/></td>
            </tr>
            <tr>
                <td><label></label></td>
                <td><input type="text" placeholder="Dari" id="inKotaAsal4" name="inKotaAsal4" value="<?php echo $data->nama_kota_tujuan_3 ?>"/></td>
                <td><input type="text" placeholder="Ke" id="inKotaTujuan4" name="inKotaTujuan4" value="Bandung"/></td>
                <td>
                    <select name="idJenisTransportUtama4" id="idJenisTransportUtama4">

                    </select>
                </td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalTransportUtama4" name="inSubtotalTransportUtama4"/></td>
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
