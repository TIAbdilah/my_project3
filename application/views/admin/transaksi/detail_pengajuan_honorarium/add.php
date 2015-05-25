
<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_pengajuan_honorarium/process/add') ?>" method="POST">
    <input type="hidden" id="inIdHeader" name="inIdHeader" value="<?php echo $data->id ?>"/>
    <table class="table " border="0" style="width: 50%">        
        <thead>
            <tr>
                <th>Nama Narasumber</th>
                <th>Jumlah Jam</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select class="input-xxlarge" name="inNamaNarasumber" id="inNamaNarasumber">
                        <option value="">-Pilih-</option>
                        <?php
                        foreach ($SIList_narasumber as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="text" id="inJumlah" name="inJumlah" class="input-small"/>
                </td>
            </tr>

        </tbody>
    </table>
    <input type="submit" class="btn btn-success" value=" + Tambahkan Narasumber Ke Dalam List"/>
</form>
