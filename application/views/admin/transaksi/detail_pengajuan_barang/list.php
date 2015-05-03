
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Barang</h3>
        <span class="pull-right" style="margin-right: 10px;">

        </span>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="example1" class="table table-striped table-bordered">
            <thead>
                
                <tr>
                    <th width="2%">No</th>
                    <th width="8%">Jenis Barang</th>
                    <th width="8%">Nama Barang</th>
                    <th width="6%">Harga</th>
                    <th width="6%">Quantity</th>
                    <th width="6%">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($list_data as $row) {
                    echo "<tr>"
                    . "<td>" . $no . "</td>"
                    . "<td>" . $row->id_jenis_barang . " </td>"
                    . "<td>" . $row->nama_barang . "</td>"
                    . "<td>" . $row->pagu_harga . "</td>"
                    . "<td>" . $row->jumlah . "</td>"
                    . "<td>" . $row->jumlah*$row->pagu_harga . "</td>"                    
                    . "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>
