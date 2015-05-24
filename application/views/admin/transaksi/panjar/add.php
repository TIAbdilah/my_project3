
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/panjar/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpHeader">No. SPT</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpIdHeader">
                        <option>No. SPT</option>
                        <?php
                        foreach ($SIList_perjadin as $row) {
                            if ($row->id_unit == $this->session->userdata('kode_unit')) {
                                echo "<option value=\"" . $row->id . "\">" . $row->no_spt . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpPenerima">Penerima</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpPenerima">
                        <option>Nama Pegawai</option>
                        <?php
                        foreach ($SIList_pegawai as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpDeskripsiPanjar">Deskripsi</label>
                <div class="controls">
                    <textarea name="inpDeskripsiPanjar" rows="2">Deskripsi</textarea>
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