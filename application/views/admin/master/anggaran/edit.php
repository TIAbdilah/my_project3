
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/anggaran/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpIdKegiatan">Kegiatan</label>
                <div class="controls">
                    <select class="input-xxlarge" name="inpIdKegiatan">
                        <option>Pilih Kegiatan</option>
                        <?php
                        foreach ($SIList_kegiatan as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"".set_select('inpIdKegiatan', $row_1->id, $row_1->id == $row->id_kegiatan).">" . $row_1->kode_kegiatan . " - " . $row_1->nama_kegiatan . "</option>";
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
                        foreach ($SIList_akun as $row_2) {
                            echo "<option value=\"" . $row_2->id . "\"".set_select('inpIdAkun', $row_2->id, $row_2->id == $row->id_akun).">" . $row_2->kode_akun . " - " . $row_2->jenis_belanja . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPagu">Pagu</label>
                <div class="controls">
                    <input type="text" id="inpPagu" name="inpPagu" value="<?php echo $row->pagu ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpTahunAnggaran">Tahun Anggaran</label>
                <div class="controls">
                    <input type="text" id="inpTahunAnggaran" name="inpTahunAnggaran" value="<?php echo $row->tahun_anggaran ?>">
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