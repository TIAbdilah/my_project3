
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/akun/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpKodeAkun">Kegiatan</label>
                <div class="controls">
                    <input type="text" id="inpKodeAkun" name="inpKodeAkun" placeholder="Kode Akun">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJenisBelanja">Jenis Belanja</label>
                <div class="controls">
                    <input type="text" id="inpJenisBelanja" name="inpJenisBelanja" placeholder="Jenis Belanja">
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