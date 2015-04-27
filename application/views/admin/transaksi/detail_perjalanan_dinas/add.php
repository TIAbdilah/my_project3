
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanan_dinas/process/add') ?>" method="POST">
    <table border="0" style="width: 100%">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
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
                <td><label id="inGolongan" name="inGolongan"></label></td>
            </tr>
            <tr>
                <td><label>Status Pegawai</label></td>
                <td><label id="inStatusPeg" name="inStatusPeg"></label></td>
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
                <td><input type="text" placeholder="Di" id="inUangHarian1" name="inUangHarian1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>

                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal" id="inSubtotalUangHarian1" name="inSubtotalUangHarian1"/></td>
            </tr>
            <tr>
                <td><label>Penginapan</label></td>
                <td></td>
                <td><input type="text" placeholder="Di" id="inPenginapan1" name="inPenginapan1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                <td><input type="text" placeholder="Jenis Penginapan" id="inJenisPenginapan1" name="inJenisPenginapan1"/></td>

                <td></td>
                <td><input type="text" placeholder="Subtotal"/></td>
            </tr>
            <tr>
                <td><label>Transport Utama</label></td>
                <td><input type="text" placeholder="Dari" id="inKotaAsal1" name="inKotaAsal1" value="Bandung"/></td>
                <td><input type="text" placeholder="Ke" id="inKotaTujuan1" name="inKotaTujuan1" value="<?php echo $data->nama_kota_tujuan_1 ?>"/></td>
                <td><input type="text" placeholder="Jenis Kendaraan"/></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal"/></td>
            </tr>
            <tr>
                <td><label>Transport Pendukung</label></td>
                <td><input type="text" placeholder="Jumlah" id="inTransPendukung" name="inTransPendukung"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal"/></td>
            </tr>
            <tr>
                <td><label>Pengeluaran Riil</label></td>
                <td><input type="text" placeholder="Jumlah" id="inPengeluaranRiil" name="inPengeluaranRiil"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="text" placeholder="Subtotal"/></td>
            </tr>
            <tr>
                <td colspan="5" align="center"><label>TOTAL</label></td>
                <td><input type="text" placeholder="Total"/></td>
            </tr>
        </tbody>
    </table>
</form>
