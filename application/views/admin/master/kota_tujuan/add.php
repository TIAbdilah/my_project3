
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/kota_tujuan/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpKodeWilayah">Kode Wilayah</label>
                <div class="controls">
                    <input type="text" id="inpKodeWilayah" name="inpKodeWilayah" placeholder="Kode Wilayah">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaProvinsi">Nama Provinsi</label>
                <div class="controls">
                    <input type="text" id="inpNamaProvinsi" name="inpNamaProvinsi" placeholder="Nama Provinsi">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNamaKota">Nama Kota</label>
                <div class="controls">
                    <input type="text" id="inpNamaKota" name="inpNamaKota" placeholder="Nama Kota">
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