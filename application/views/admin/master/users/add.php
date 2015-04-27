
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/users/process/add') ?>" method="POST">
             <div class="control-group">
                <label class="control-label" for="inpIdJenisPengguna">Role</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpIdJenisPengguna">
                        <option>Jenis Pengguna</option>
                        <?php
                        foreach ($SIList_role as $row) {
                            echo "<option value=\"" . $row->id_role . "\">" . $row->nama_role. "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNama">Nama</label>
                <div class="controls">
                    <input type="text" id="inpNama" name="inpNama" placeholder="Nama">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNip">NIP</label>
                <div class="controls">
                    <input type="text" id="inpNip" name="inpNip" placeholder="NIP">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpAlamat">Alamat</label>
                <div class="controls">
                    <input type="text" id="inpAlamat" name="inpAlamat" placeholder="Alamat">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpEmail">Email</label>
                <div class="controls">
                    <input type="text" id="inpEmail" name="inpEmail" placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpUsername">Username</label>
                <div class="controls">
                    <input type="text" id="inpUsername" name="inpUsername" placeholder="Username">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPassword">Password</label>
                <div class="controls">
                    <input type="password" id="inpPassword" name="inpPassword" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpTelp">Telp</label>
                <div class="controls">
                    <input type="text" id="inpTelp" name="inpTelp" placeholder="Telp">
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