
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/role/process/add') ?>" method="POST">            
            <div class="control-group">
                <label class="control-label" for="inpNamaRole">Nama Role</label>
                <div class="controls">
                    <input type="text" id="inpNamaRole" name="inpNamaRole" placeholder="Nama Role">
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