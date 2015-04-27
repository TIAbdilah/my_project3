
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Data Detail Perjalanan Dinas</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('transaksi/perjalanandinasdetail/process/add') ?>" method="POST">

            <div class="control-group">
                <label class="control-label" for="inNama">Nama</label>
                <div class="controls">
                    <select class="input-xlarge" name="inNama">
                        <option>--Nama--</option>
                        <?php
                        foreach ($SIList_pegawai as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inNIP">NIP</label>
                <div class="controls">
                    <input type="text" id="inNIP" name="inNIP" placeholder="NIP Pegawai">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inGolongan">Golongan</label>
                <div class="controls">
                    <input type="text" id="inGolongan" name="inGolongan" placeholder="Golongan">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inKotaTujuan1">Kota Tujuan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inKotaTujuan1">
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inKotaTujuan2">Kota Tujuan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inKotaTujuan2">
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inKotaTujuan3">Kota Tujuan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inKotaTujuan3">
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inMaksud">Maksud Perjalanan Dinas</label>
                <div class="controls">
                    <input type="text" id="inMaksud" name="inMaksud" placeholder="Maksud">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inDateStart">Jadwal Keberangkatan</label>
                <div class="controls">
                    <input type="text" id="inDateStart" name="inDateStart" placeholder="YYYY-MM-DD">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inDateFinish">Jadwal Kepulangan</label>
                <div class="controls">
                    <input type="text" id="inDateFinish" name="inDateFinish" placeholder="YYYY-MM-DD">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inKendaraanUtama">Kendaraan Utama</label>
                <div class="controls">
                    <select class="input-xlarge" name="inKendaraanUtama">
                        <option>--Jenis Kendaraan--</option>
                        <?php
                        foreach ($SIList_jenisKendaraan as $row_3) {
                            echo "<option value=\"" . $row_3->list_item . "\">" . $row_3->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inBiayaKendaraan">Pembebanan Biaya Kendaraan</label>
                <div class="controls">
                    <input type="text" id="inBiayaKendaraan" name="inBiayaKendaraan" placeholder="Rp.">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inPengingapan">Penginapan</label>
               <div class="controls">
                    <select class="input-xlarge" name="inPengingapan">
                        <option>--Jenis Penginapan--</option>
                        <?php
                        foreach ($SIList_jenisPenginapan as $row_3) {
                            echo "<option value=\"" . $row_3->list_item . "\">" . $row_3->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inTotalBiaya">TOTAL BIAYA</label>
                <div class="controls">                                                

                    <input type="text" id="inTotalBiaya" name="inTotalBiaya" placeholder="Nama">

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