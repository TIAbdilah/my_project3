
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/pegawai/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpNip">NIP</label>
                <div class="controls">
                    <input type="text" id="inpNip" name="inpNip" placeholder="NIP">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNama">Nama</label>
                <div class="controls">
                    <input type="text" id="inpNama" name="inpNama" placeholder="Nama">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpGolongan">Golongan</label>
                <div class="controls">
                    <select name="inpGolongan">
                        <option value="-">Pilih Golongan</option>
                        <?php
                        foreach ($SIList_golongan as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpTingkat">Tingkat</label>
                <div class="controls">
                    <select name="inpTingkat">
                        <option value="-">Pilih Tingkat</option>
                        <option value="-">-</option>
                        <?php
                        foreach ($SIList_tingkat as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJabatan">Jabatan</label>
                <div class="controls">
                    <input type="text" id="inpJabatan" name="inpJabatan" placeholder="Jabatan">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpuTglLahir">Tanggal Lahir</label>
                <div class="controls">
                    <input type="text" class="inpTanggal" id="inpuTglLahir" name="inpTglLahir" placeholder="1/1/1990">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKelasJabatan">Kelas Jabatan</label>
                <div class="controls">
                    <input type="text" id="inpKelasJabatan" name="inpKelasJabatan" placeholder="Kelas Jabatan">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpStatus">Status</label>
                <div class="controls">
                    <select name="inpStatus">
                        <option>Pilih Status</option>
                        <?php
                        foreach ($SIList_statusPegawai as $row) {
                            echo "<option value=\"" . $row->list_item . "\">" . $row->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Nama Unit</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpKodeUnit">
                        <option>Pilih Unit</option>
                        <?php
                        foreach ($SIList_unit as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->kode_unit . " - " . $row->nama_unit . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKriteriaPegawai">Kriteria Pegawai</label>
                <div class="controls">
                    <input type="text" id="inpKriteriaPegawai" name="inpKriteriaPegawai" placeholder="Kriteria Pegawai">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpStatusPendidikan">Status Pendidikan</label>
                <div class="controls">
                    <input type="text" id="inpStatusPendidikan" name="inpStatusPendidikan" placeholder="Status Pendidikan">
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