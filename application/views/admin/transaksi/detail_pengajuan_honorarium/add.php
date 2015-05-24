
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_barang/process/add') ?>" method="POST">
    <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
    <table class="table table-bordered" border="0" style="width: 50%">        
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select class="input-large" name="inNamaBarang" id="inNamaBarang">
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
                <td>
                    <label id="lblSatuanBarang" name="lblSatuanBarang" style="min-width: 50px"></label>
                </td>
                <td>
                    <label id="lblHargaBarang" name="lblHargaBarang" style="min-width: 50px"></label>
                </td>
                <td>
                    <input type="text" id="inJumlah" name="inJumlah" class="input-mini"/>
                </td>
            </tr>

        </tbody>
    </table>
    <input type="submit" class="btn btn-success" value=" + Tambahkan Barang Ke Dalam List"/>
</form>
