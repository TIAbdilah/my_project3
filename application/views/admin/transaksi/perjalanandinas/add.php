
<!-- widget-header -->
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Anggaran</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="#detail" role="button" class="btn" data-toggle="modal">Tambah Detail</a>

            <!--modal for detail-->

            <div id="detail" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Tambah detail perjalanan</h3>
                </div>
                <div class="modal-body">
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
                                <label class="control-label" for="inTransportPendukung">Transport Pendukung</label>
                                <div class="controls">
                                    <input type="text" id="inTransportPendukung" name="inTransportPendukung" placeholder="Rp.">
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
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <!--<a href="<?php echo site_url('transaksi/perjalanandinas/add') ?>"><button class="btn btn-primary">Isi Form Pengajuan</button></a>-->
                </div>
            </div>

            <!--/modal for detail-->

        </span>
    </div>
    <div class="widget-content">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Golongan</th>
                    <th>Penginapan</th>
                    <th>Transport Pendukung</th>
                    <th>Pengeluaran Riil</th>
                    <th class="td-actions">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!--<a href="#detail" role="button" class="btn" data-toggle="modal">Tambah Detail</a>-->
                <?php
                $no = 1;
                foreach (@$perjalanan_detail as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->nip . " </td>"
                    . "<td>" . $row->nip . "</td>"
                    . "<td>" . $row->nip . "</td>"
                    . "<td>" . $row->jenis_penginapan . "</td>"
                    . "<td>" . $row->transport_pendukung . "</td>"
                    . "<td>" . $row->pengeluaran_riil . "</td>"
                    . "<td class=\"td-actions\">"
                    . "<a href=\"" . site_url('transaksi/perjalanandinas/jumlahtujuan/' . $row->id . '#detail') . "\" class=\"btn btn-success btn-small\" data-toggle=\"modal\"><i class=\"btn-icon-only icon-edit\"> </i></a>"
//                                                . "<a href=\"" . site_url('transaksi/perjalanandinasdetail/edit/' . $row->id.'#detail') . "\" class=\"btn btn-success btn-small\"><i class=\"btn-icon-only icon-edit\"> </i></a>"
                    . "<a href = \"" . site_url('transaksi/perjalanandinasdetail/delete/' . $row->id) . "\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>
                                                </td>"
                    . "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /widget-header --> 
