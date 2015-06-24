
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/users/process/edit/' . $row->id_pengguna); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpIdJenisPengguna">Role</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpIdJenisPengguna">
                        <option>Pilih Jenis Pengguna</option>
                        <?php
                        foreach ($SIList_role as $row_1) {
                            echo "<option value=\"" . $row_1->id_role . "\"".set_select('inpIdJenisPengguna', $row_1->id_role, $row_1->id_role == $row->id_jenis_pengguna).">" . $row_1->nama_role. "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" for="inpIdPegawai">Nama Pegawai</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpIdPegawai">
                        <option>Pilih Nama  Pegawai</option>
                        <?php
                        foreach ($SIList_pegawai as $row_2) {
                            echo "<option value=\"" . $row_2->id . "\"".set_select('inpIdPegawai', $row_2->id, $row_2->id == $row->id_pegawai).">" . $row_2->nama . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpAlamat">Alamat</label>
                <div class="controls">
                    <input type="text" id="inpAlamat" name="inpAlamat" value="<?php echo $row->alamat ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpEmail">Email</label>
                <div class="controls">
                    <input type="text" id="inpEmail" name="inpEmail" value="<?php echo $row->email ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpUsername">Username</label>
                <div class="controls">
                    <input type="text" id="inpUsername" name="inpUsername" value="<?php echo $row->username ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPassword">Password</label>
                <div class="controls">
                    <input type="password" id="inpPassword" name="inpPassword" value="<?php echo $row->password ?>">
                </div>
            </div>            
            <div class="control-group">
                <label class="control-label" for="inpPassword2">Konfirmasi Password</label>
                <div class="controls">
                    <input type="password" id="inpPassword2" name="inpPassword2" placeholder="Ketik Lagi Password">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpTelp">Telp</label>
                <div class="controls">
                    <input type="text" id="inpTelp" name="inpTelp" value="<?php echo $row->telp ?>">
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