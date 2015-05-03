
<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Pengajuan Barang</h3>
    </div>           
    <div class="widget-content" style="padding: 10px;">
        
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/pengajuan_barang/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="nomorPengajuan">Nomor Pengajuan</label>
                <div class="controls">
                    <input placeholder="Auto Generated" id="inNomorPengajuan" name="inNomorPengajuan"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inIdAnggaran">Anggaran</label>
                <div class="controls" >
                    <select class="input-xxlarge" name="inIdAnggaran" id="inIdAnggaran"> 
                        <option>--Anggaran--</option>
                        <?php
                        foreach ($SIList_anggaran as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\">" . $row_1->kode_kegiatan . " - " . $row_1->nama_kegiatan . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inMaksudKegiatan">Maksud Kegiatan</label>
                <div class="controls">
                    <textarea name="inMaksudKegiatan" id="inMaksudKegiatan" class="input-xxlarge" rows="2"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inTanggalPengajuan" >Tanggal Pengajuan</label>
                <div class="controls">
                    <input type="text" class="inpTanggal" id="inTanggalPengajuan" name="inTanggalPengajuan"/>
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
