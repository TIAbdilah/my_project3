<?php

function format_date($string) {
    return substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
}
?>
<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Tambah Data Pengajuan Honorarium</h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">

        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/pengajuan_honorarium/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="nomorPengajuan">Nomor Pengajuan</label>
                <div class="controls">
                    <input placeholder="Auto Generated" id="inNomorPengajuan" name="inNomorPengajuan" disabled="true"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inIdAnggaran">Anggaran</label>
                <div class="controls" >
                    <select class="input-xxlarge" name="inIdAnggaran" id="inIdAnggaran"> 
                        <option>Pilih Anggaran</option>
                        <?php
                        foreach ($SIList_anggaran as $row_1) {
                            if ($row_1->id_unit == $this->session->userdata('kode_unit')) {
                                echo "<option value=\"" . $row_1->id . "\">" . $row_1->kode_kegiatan . " - " .$row_1->nama_kegiatan .' - '. $row_1->jenis_belanja . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inNamaKegiatan">Nama Kegiatan</label>
                <div class="controls">
                    <input name="inNamaKegiatan" id="inNamaKegiatan" class="input-xlarge"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inAcara">Acara</label>
                <div class="controls">
                    <input name="inAcara" id="inAcara" class="input-xlarge"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inPeriodePembayaran" >Periode Pembayaran</label>
                <div class="controls">
                    <input type="text" class="inpTanggal" id="inPeriodePembayaran" name="inPeriodePembayaran"/>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">  
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /widget-header --> 
