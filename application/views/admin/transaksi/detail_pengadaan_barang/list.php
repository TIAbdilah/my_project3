
<div class="widget widget-table action-table">
    <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>List Data Detail Uang Muka</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content" style="padding: 10px;">
        <table id="" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%"> No </th>
                    <th> Nama Barang</th>
                    <th> Merk</th>
                    <th> Spesifikasi</th>
                   
                </tr>
            </thead>            
            <tbody>
                <?php
                $no = 1;
                foreach ($list_detail_pengadaan_barang as $row) {
                    echo "<tr>"
                    . "<td align=\"center\">" . $no . "</td>"
                    . "<td>" . $row->nama_barang. " </td>"
                    . "<td>" . $row->merek_barang. " </td>"
                    . "<td>" .$row->spesifikasi. " </td>";
                   
                    ?>
                
                <?php
                echo "</td>"
                . "</tr>";
                $no++;
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- /widget-content --> 
</div>