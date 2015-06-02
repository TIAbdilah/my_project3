
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_barang/process/add') ?>" method="POST">
    <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
    <input type="hidden" id="inIdBarang" name="inIdBarang" value=""/>
    <table class="table table-bordered" style="width: 100%">        
        <thead>
            <tr>
                <th width="15%">Nama Barang</th>
                <th width="15%">Merek</th>
                <th width="15%">Spesifikasi</th>
                <th width="15%">Satuan</th>
                <th width="15%">Harga Satuan</th>
                <th width="10%">Jumlah</th>
                <th width="30%">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">
                    <select class="input-large" name="inNamaPengajuanBarang" id="inNamaPengajuanBarang">
                        <option>Pilih Nama Barang</option>
                        <?php
                        foreach ($SIList_barang as $row) {
//                            echo "<option value=\"" . $row->id . "\">" . $row->nama_barang . " - " . $row->merek_barang . " - " . $row->spesifikasi . "</option>";
                            echo "<option value=\"" . $row->nama_barang . "\">" . $row->nama_barang . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td align="center">
                    <select class="input-large" name="inMerekBarang" id="inMerekBarang">
                        <option>Pilih Merek Barang</option>
                        <?php
                        foreach ($SIList_merekbarang as $row) {
                            echo "<option value=\"" .$row->merek_barang. "\">" . $row->merek_barang . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td align="center">
                    <select class="input-large" name="inSpesifikasi" id="inSpesifikasi">
                        <option>Pilih Spesifikasi</option>
                        <?php
                        foreach ($SIList_spesifikasi as $row) {
                            echo "<option value=\"" . $row->spesifikasi . "\">" . $row->spesifikasi . "</option>";
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
