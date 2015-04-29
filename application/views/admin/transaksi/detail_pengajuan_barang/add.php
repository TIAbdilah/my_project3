
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_perjalanan_dinas/process/add') ?>" method="POST">
   
    <table border="0" style="width: 100%">        
       
        <tbody>
           
            <tr>
                <td><label>Jenis Barang</label></td>
                <td>
                   <select class="input-xlarge" name="inpKodeJenisBarang">
                        <option>Jenis Barang</option>
                        <?php
                        foreach ($SIList_jenisBarang as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Nama Barang</label></td>
                <td>
                   <select class="input-xlarge" name="inNamaBarang" id="inNamaBarang">
                        <option>Nama Barang</option>
                        <?php
                        foreach ($SIList_nama_barang as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama_barang . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Satuan</label></td>
                <td>
                    <input type="text" id="inSatuanBarang" name="inSatuanBarang"/>
                </td>
            </tr>
            <tr>
                <td><label>Harga</label></td>
                <td>
                    <input type="text"  id="inHargaBarang" name="inHargaBarang"/>
                </td>
            </tr>
            <tr>
                <td><label>Jumlah</label></td>
                <td>
                    <input type="text"/>
                </td>
            </tr>
           
            <tr>
                <td colspan="6" align="center"><input type="submit" value="Simpan"/></td>
            </tr>
        </tbody>
    </table>
</form>
