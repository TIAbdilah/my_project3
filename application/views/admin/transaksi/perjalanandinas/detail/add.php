
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Data Detail Perjalanan Dinas</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal span6" action="<?php echo site_url('transaksi/perjalanandinasdetail/process/add') ?>" method="POST">

            <div class="control-group">
                <label class="control-label" for="inNama">Nama</label>
                <div class="controls">
                    <select class="input-xlarge" name="inNama" id="inNama">
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
                <label class="control-label"  for="inNIP">NIP</label>
                <div class="controls">
                    <input type="text" name="inNIP" id="inNIP" placeholder="NIP Pegawai">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inGolongan">Golongan</label>
                <div class="controls">
                    <input type="text" id="inGolongan" name="inGolongan" placeholder="Golongan">
                </div>
            </div>
            <!--            <div class="control-group">
                            <label class="control-label" for="inKotaAsal">Kota Asal</label>
                            <div class="controls">
                                <select class="input-xlarge" name="inKotaAsal">
                                    <option>--Nama Kota--</option>
            <?php
            foreach ($SIList_kota_tujuan as $row) {
                echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
            }
            ?>
                                </select>
            
                            </div>
                        </div>-->


            <div class="control-group">
                <label class="control-label" for="inMaksud">Maksud Perjalanan Dinas</label>
                <div class="controls">
                    <input type="text" id="inMaksud" name="inMaksud" placeholder="Maksud" >
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
                <label class="control-label"  for="inKotaTujuan1">Kota Tujuan</label>
                <div class="controls">
                    <select class="input-xlarge" name="inKotaTujuan1" id="inKotaTujuan1">
                        <option>--Nama Kota--</option>
                        <?php
                        foreach ($SIList_kota_tujuan as $row) {
                            echo "<option value=\"" . $row->id . "\">" . $row->nama_kota . "</option>";
                        }
                        ?>
                    </select>

                </div>
            </div>
            <!--            <div class="control-group">
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
                        </div>-->
            <div class="control-group">
                <label class="control-label" for="inPengingapan">Penginapan</label>
                <div class="controls">
                    <select class="input-xlarge" id="inPenginapan" name="inPengingapan">
                        <option>--Jenis Penginapan--</option>
                        <?php
                        foreach ($SIList_jenisPenginapan as $row_2) {
                            echo "<option value=\"" . $row_2->list_item . "\">" . $row_2->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inKendaraanUtama">Transport Utama</label>
                <div class="controls">
                    <select class="input-xlarge" id="inKendaraanUtama" name="inKendaraanUtama">
                        <option>--Jenis Kendaraan--</option>

                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inKendaraanPendukung">Transport Pendukung</label>
                <div class="controls">
                    <select class="input-xlarge" name="inKendaraanPendukung">
                        <option>--Jenis Kendaraan--</option>
                        <?php
                        foreach ($SIList_jenisKendaraanPendukung as $row_3) {
                            echo "<option value=\"" . $row_3->list_item . "\">" . $row_3->list_item . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="control-group">
                    <label class="control-label" for="inTransportPendukung"></label>
                    <div class="controls">
                        <input type="text" id="inTransportPendukung" name="inTransportPendukung" placeholder="Rp.">
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inPengeluaranRiil">Pengeluaran Riil</label>
                <div class="controls">                                                

                    <input type="text" id="inPengeluaranRiil" name="inPengeluaranRiil" placeholder="Rp.">

                </div>
            </div>
            <div class="control-group">
                <div class="controls">                                                
                    <button type="submit" class="btn">Simpan</button>
                    <button class="btn" id="btnHitungTotal">Hitung Total</button> 
                </div>
            </div>
        </form>

        <!--        <div class="widget-content span6 form-horizontal">
                    
                    my name is methos
                </div>-->
        <form class="bs-docs-example form-horizontal span-6" action="<?php echo site_url('transaksi/perjalanandinasdetail/process/add') ?>" method="POST">
            <div class="control-group">
                <b>KALKULASI BIAYA PERJALANAN DINAS</b>
            </div>

            <div class="control-group">
                <label class="control-label" for="outLamaPerjalanan">Lama Perjalanan (Hari)</label>
                <div class="controls">
                    <input type="text" id="outLamaPerjalanan" name="outLamaPerjalanan" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="outBiayaAkomodasi">Biaya Akomodasi Per Hari (Rp)</label>
                <div class="controls">
                    <input type="text" id="outBiayaAkomodasi" name="outBiayaAkomodasi" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="outBiayaAkomodasiCalc" name="outBiayaAkomodasiCalc" placeholder="0">

                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="outBiayaAkomodasiTotal" name="outBiayaAkomodasiTotal" placeholder="0" disabled="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="outBiayaPenginapan">Biaya Penginapan (Rp)</label>
                <div class="controls">
                    <input type="text" id="outBiayaPenginapan" name="outBiayaPenginapan" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="outBiayaPenginapanCalc" name="outBiayaPenginapanCalc" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="outBiayaPenginapanTotal" name="outBiayaPenginapanTotal" placeholder="0" disabled="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="outTransportUtama">Transport Utama (Rp)</label>
                <div class="controls">
                    <input type="text" id="outTransportUtama" name="outTransportUtama" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="outTransportUtamaCalc" name="outTransportUtamaCalc" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="text" id="outTransportUtamaTotal" name="outTransportUtamaTotal" placeholder="0" disabled="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="outTransportPendukung">Transport Pendukung (Rp)</label>
                <div class="controls">
                    <input type="text" id="outTransportPendukung" name="outTransportPendukung" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="outPengeluaranRiil">Pengeluaran Riil (Rp)</label>
                <div class="controls">
                    <input type="text" id="outPengeluaranRiil" name="outPengeluaranRiil" placeholder="0">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="outTOTAL"><b>TOTAL (Rp)</b></label>
                <div class="controls">
                    <input type="text" id="outTOTAL" name="outTOTAL" placeholder="0">
                </div>
            </div>

        </form>
    </div>
    <!-- /widget-content --> 
</div>