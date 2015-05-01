<?php

function format_date($string) {
    return substr($string, 8, 2) . '-' . substr($string, 5, 2) . '-' . substr($string, 0, 4);
}
?>
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>View Data</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content"><br>
        <form class="bs-docs-example form-horizontal" action="<?php echo site_url('master/pegawai/process/edit/' . $row->id); ?>" method="POST">
            <div class="control-group">
                <label class="control-label" for="inpNIP">NIP</label>
                <div class="controls">
                    <strong><?php echo $row->nip ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpNama">Nama</label>
                <div class="controls">
                    <strong><?php echo $row->nama ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpGolongan">Golongan</label>
                <div class="controls">
                    <strong><?php echo $row->golongan ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpJabatan">Jabatan</label>
                <div class="controls">
                    <strong><?php echo $row->jabatan ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpuTglLahir">Tanggal Lahir</label>
                <div class="controls">
                    <strong><?php echo format_date($row->tgl_lahir) ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKelasJabatan">Kelas Jabatan</label>
                <div class="controls">
                    <strong><?php echo $row->kelas_jabatan ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpStatus">Status</label>
                <div class="controls">
                    <strong><?php echo $row->status ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKodeUnit">Kode Unit</label>
                <div class="controls">
                    <strong><?php echo $row->kode_unit ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpKriteriaPegawai">Kriteria Pegawai</label>
                <div class="controls">
                    <strong><?php echo $row->kriteria_pegawai ?></strong>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inpStatusPendidikan">Status Pendidikan</label>
                <div class="controls">
                    <strong><?php echo $row->status_pendidikan ?></strong>
                </div>
            </div>                                        
        </form>
    </div>
    <!-- /widget-content --> 
</div>