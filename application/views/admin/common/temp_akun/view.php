
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>View Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal">
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Kode Unit</label>
                <div class="controls">
                    <strong><?php echo $row->kode_unit ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpAkun">Akun</label>
                <div class="controls">
                    <strong><?php echo $row->akun ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJenisBelanja">Jenis Belanja</label>
                <div class="controls">
                    <strong><?php echo $row->jenis_belanja ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPagu">Pagu</label>
                <div class="controls">
                    <strong><?php echo $row->pagu ?></strong>
                </div>
            </div>                                       
        </form>
    </div>
    <!-- /widget-content --> 
</div>