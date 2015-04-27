
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/user_role/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpIdUser">User</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpIdUser">
                        <option>Nama User</option>
                        <?php
                        foreach ($SIList_user as $row_1) {
                            echo "<option value=\"" . $row_1->id_pengguna . "\">" . $row_1->username . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpIdRole">Role</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpIdRole">
                        <option>Role</option>
                        <?php
                        foreach ($SIList_role as $row_2) {
                            echo "<option value=\"" . $row_2->id_role . "\">" . $row_2->nama_role . "</option>";
                        }
                        ?>
                    </select>
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