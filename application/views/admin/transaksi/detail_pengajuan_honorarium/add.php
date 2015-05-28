<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_honorarium/process/add') ?>" method="POST">
    <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
    <table class="table table-bordered" style="width: 100%">        
        <thead>
            <tr>
                <th>Nama Narasumber</th>
                <th>Jumlah Jam</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">
                    <select class="input-xxlarge" name="inNamaNarasumber" id="inNamaNarasumber">
                        <option>Pilih Narasumber</option>
                        <?php
                        foreach ($SIList_narasumber as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td align="center">
                    <input type="text" id="inJumlah" name="inJumlah" class="input-small"/>
                </td>
                <td align="center">
                    <input type="submit" class="btn btn-success" value=" + Tambahkan Narasumber Ke Dalam List"/>
                </td>
            </tr>
        </tbody>
    </table>
</form>
