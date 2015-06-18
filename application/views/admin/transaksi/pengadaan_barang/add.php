
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Add Data Pengajuan Uang Muka Barang</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/pengadaan_barang/process/add') ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpHeader">No. Pengajuan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inpIdHeader">
                        <option>Pilih No. Pengajuan</option>
                        <?php
                        foreach ($SIList_pengajuanbarang as $row) {
                            if ($row->id_unit == $this->session->userdata('kode_unit')) {
                                echo "<option value=\"" . $row->id . "\">" . $row->nomor_pengajuan . "</option>";
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
                        <option>Pilih Nama Pegawai</option>
                        <?php
                        foreach ($SIList_pegawai as $row_1) {
                            echo "<option value=\"" . $row_1->id . "\">" . $row_1->nama . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpDeskripsiPengajuanBarang">Deskripsi</label>
                <div class="controls">
                    <textarea name="inpDeskripsiPengajuanBarang" rows="2" placeholder="Deskripsi"></textarea>
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