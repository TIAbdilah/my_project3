
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_barang/process/add') ?>" method="POST">
    <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
    <table class="table table-bordered" style="width: 100%">        
        <thead>
            <tr>
                <th width="30%">Nama Barang</th>
                <th width="15%">Satuan</th>
                <th width="15%">Harga Satuan</th>
                <th width="10%">Jumlah</th>
                <th width="30%">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">
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
                <td align="center">
                    <label id="lblSatuanBarang" name="lblSatuanBarang" style="min-width: 50px"></label>
                </td>
                <td align="center">
                    <label id="lblHargaBarang" name="lblHargaBarang" style="min-width: 50px"></label>
                </td>
                <td align="center">
                    <input type="text" id="inJumlah" name="inJumlah" class="input-mini"/>
                </td>
                <td align="center">
                    <input type="submit" class="btn btn-success" value=" + Tambahkan Barang Ke Dalam List"/>                    
                </td>
            </tr>
        </tbody>
    </table>
</form>
