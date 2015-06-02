<form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/detail_panjar/process/add') ?>" method="POST">
    <input type="hidden" name="inpIdPanjar" value="<?php echo $data->id ?>" />
    <input type="hidden" name="inpIdPegawai" value="<?php echo $row->id_pegawai ?>" />
    <table style="width: 100%">
        <tr>
            <td width="25%">Jumlah Uang Muka</td>
            <td><input type="text" id="inpJumlah" name="inpJumlah" placeholder="Jumlah Uang Muka"></td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit" class="btn">Simpan</button></td>
        </tr>
    </table>
</form>