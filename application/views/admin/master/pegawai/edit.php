
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/pegawai/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpNIP">NIP</label>
                <div class="controls">
                    <input type="text" id="inpNip" name="inpNip" value="<?php echo $row->nip ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNama">Nama</label>
                <div class="controls">
                    <input type="text" id="inpNama" name="inpNama" value="<?php echo $row->nama ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpGolongan">Golongan</label>
                <div class="controls">
                    <select name="inpGolongan">
                        <option>Golongan</option>
                        <?php
                        foreach ($SIList_golongan as $row_3) {
                            echo "<option value=\"" . $row_3->list_item . "\"".set_select('inpGolongan', $row_3->list_item, $row_3->list_item == $row->golongan).">" . $row_3->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJabatan">Jabatan</label>
                <div class="controls">
                    <input type="text" id="inpJabatan" name="inpJabatan" value="<?php echo $row->jabatan ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpuTglLahir">Tanggal Lahir</label>
                <div class="controls">
                    <input type="text" id="inpuTglLahir" name="inpTglLahir" value="<?php echo $row->tgl_lahir ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKelasJabatan">Kelas Jabatan</label>
                <div class="controls">
                    <input type="text" id="inpKelasJabatan" name="inpKelasJabatan" value="<?php echo $row->kelas_jabatan ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpStatus">Status</label>
                <div class="controls">
                    <select name="inpStatus">
                        <option>Status</option>
                        <?php
                        foreach ($SIList_statusPegawai as $row_2) {
                            echo "<option value=\"" . $row_2->list_item . "\"".set_select('inpStatus', $row_2->list_item, $row_2->list_item == $row->status).">" . $row_2->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Nama Unit</label>
                <div class="controls">
                    <select name="inpKodeUnit" class="input-xlarge">                                                
                        <option></option>
                        <?php
                        foreach ($SIList_unit as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\"" . set_select('inpKodeUnit', $row_1->id, $row_1->id == $row->kode_unit) . ">" . $row_1->kode_unit." - ".$row_1->nama_unit. "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKriteriaPegawai">Kriteria Pegawai</label>
                <div class="controls">
                    <input type="text" id="inpKriteriaPegawai" name="inpKriteriaPegawai" value="<?php echo $row->kriteria_pegawai ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpStatusPendidikan">Status Pendidikan</label>
                <div class="controls">
                    <input type="text" id="inpStatusPendidikan" name="inpStatusPendidikan" value="<?php echo $row->status_pendidikan ?>">
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