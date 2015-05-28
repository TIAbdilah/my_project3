
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/anggaran/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpIdKegiatan">Kegiatan</label>
                <div class="controls">
                    <select class="input-xxlarge" name="inpIdKegiatan">
                        <option>Pilih Kegiatan</option>
                        <?php
                        foreach ($SIList_kegiatan as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->kode_kegiatan . " - " . $row->nama_kegiatan . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpIdAkun">Akun</label>
                <div class="controls">
                    <select class="input-xxlarge" name="inpIdAkun">
                        <option>Pilih Akun</option>
                        <?php
                        foreach ($SIList_akun as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->kode_akun . " - " . $row->jenis_belanja . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPagu">Pagu</label>
                <div class="controls">
                    <input type="text" id="inpPagu" name="inpPagu" placeholder="Pagu">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpTahunAnggaran">Tahun Anggaran</label>
                <div class="controls">
                    <input type="text" id="inpTahunAnggaran" name="inpTahunAnggaran" placeholder="Tahun Anggaran">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">                                                
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /widget-content --> 
</div>