
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_barang/process/add') ?>" method="POST">
    <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
    <table border="0" style="width: 50%">        

        <tbody>
            <tr>   
                <td><label style="min-width: 140px">Nama Barang</label></td>
                <td>
                    <select class="input-xxlarge" name="inNamaBarang" id="inNamaBarang">
                        <option value="">-Pilih-</option>
                        <?php
                        foreach ($SIList_barang as $row) {
                            if (empty($row->merek_barang) && empty($row->spesifikasi)) {
                                echo "<option value=\"" . $row->id . "\">" . $row->nama_barang . "</option>";
                            } else if (empty($row->merek_barang)) {
                                echo "<option value=\"" . $row->id . "\">" . $row->nama_barang . " - " . $row->spesifikasi . "</option>";
                            } else if (empty($row->spesifikasi)) {
                                echo "<option value=\"" . $row->id . "\">" . $row->nama_barang . " - " . $row->merek_barang . "</option>";
                            } else {
                                echo "<option value=\"" . $row->id . "\">" . $row->nama_barang . " - " . $row->merek_barang . " - " . $row->spesifikasi . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td> 
<!--                <td><label>Merk</label></td>
                <td>
                    <input type="text" id="inMerk" name="inMerk"/>
                </td>-->
                <td><label><b>Satuan:&nbsp;</b> </label></td>
                <td>
                    <label id="lblSatuanBarang" name="lblSatuanBarang" style="min-width: 50px"></label>
                </td>
                <td><label><b>Harga:&nbsp;</b></label></td>
                <td>
                    <label id="lblHargaBarang" name="lblHargaBarang" style="min-width: 50px"></label>
                </td>
                <td><label><b>Tipe:&nbsp;</b></label></td>
                <td>
                    <label id="lblTipeBarang" name="lblTipeBarang" style="min-width: 50px"></label>
                </td>
            </tr>

            <tr>
                <td><label>Jumlah</label></td>
                <td>
                    <input type="text" id="inJumlah" name="inJumlah" class="input-mini"/>
                </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td colspan="5" align="left"><input type="submit" class="btn btn-success" value=" + Tambahkan Barang Ke Dalam List"/></td>
            </tr>
        </tbody>
    </table>
</form>
