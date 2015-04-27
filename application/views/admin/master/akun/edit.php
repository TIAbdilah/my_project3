
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/akun/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeAkun">Kode Akun</label>
                <div class="controls">
                    <input type="text" id="inpKodeAkun" name="inpKodeAkun" value="<?php echo $row->kode_akun ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJenisBelanja">Jenis Belanja</label>
                <div class="controls">
                    <input type="text" id="inpJenisBelanja" name="inpJenisBelanja" value="<?php echo $row->jenis_belanja ?>">
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