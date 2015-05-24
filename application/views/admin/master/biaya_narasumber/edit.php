
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Edit Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/biaya_narasumber/process/edit/'.$data->id) ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpJabatan">Jabatan</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="inpJabatan" name="inpJabatan" value="<?php echo $data->jabatan?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpBiaya">Biaya</label>
                <div class="controls">
                    <input type="text" id="inpBiaya" name="inpBiaya"  value="<?php echo $data->biaya?>">&nbsp;/&nbsp;jam
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