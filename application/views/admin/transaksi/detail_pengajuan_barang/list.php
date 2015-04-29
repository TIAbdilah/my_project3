
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Barang</h3>
        <span class="pull-right" style="margin-right: 10px;">
            <a href="#addDetail" role="button" class="btn" data-toggle="modal" id="btnTambahPengajuan" name="btnTambahPengajuan">Tambah Pengajuan Perjalanan Dinas</a>

            <div id="addDetail" class="modal hide fade modal-admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Alasan Penolakan Pengajuan</h3>
                </div>
                <div class="modal-body">
                   
                    <?php    $this->load->view('admin/transaksi/detail_pengajuan_barang/add'); ?>
                   
                </div>
            </div>
        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example1" class="table table-striped table-bordered">
            <thead>
                
                <tr>
                    <th width="8%">Jenis Barang</th>
                    <th width="8%">Nama Barang</th>
                    <th width="6%">Harga</th>
                    <th width="6%">Quantity</th>
                    <th width="6%">Total</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- /widget-content --> 
</div>
