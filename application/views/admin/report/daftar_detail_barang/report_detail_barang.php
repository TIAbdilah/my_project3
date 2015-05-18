<html>
    <body>

    <center>
        <h3>Belanja Barang</h3>
    </center>
    <table border="1" style="width: 100%; border-collapse: collapse">
        <thead>
            <tr>
                <th width="2%">No</th>
                <!--<th width="8%">Jenis Barang</th>-->
                <th width="15%" >Nama Barang</th>
                <th >Volume</th>
                <th >Satuan</th>
                <th >Harga</th>
                <th >Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach ($data_report as $row) {
                $subtotal = $row->jumlah * $row->pagu_harga;

                echo "<tr>"
                . "<td>" . $no . "</td>"
//                . "<td>" . $row->id_jenis_barang . " </td>"
                . "<td>" . $row->nama_barang . "</td>"
                . "<td align='right'>" . number_format($row->jumlah) . "</td>"
                . "<td>" . $row->satuan . "</td>"
                . "<td align='right'>" . number_format($row->pagu_harga) . "</td>"
                . "<td align='right'>" . number_format($subtotal) . "</td>"
                . "</tr>";
                $no++;
                $total = $total + $subtotal;
            }
            ?>
            <tr>
                <th colspan="5">Total</th>
                <th id="outTotalDetailBarang"><?php echo number_format($total) ?></th>
            </tr>
        </tbody>
    </table>
    <table border="0">
        <tfoot>
            <tr>
                <th colspan="5" align="right">Total Belanja</th>
                <th align ="right"><?php echo number_format($total) ?></th>
            </tr>
        </tfoot>
    </table>
    <table style="width: 100%">
        <tr>
            <td align="center" width="50%">

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </td>
            <td align="center" width="50%">

                Bandung, <?php echo date('d M y') ?><br>
                Kasubbid Program & Evaluasi <br>
                <br>
                <br>
                <br>
                <br>
        <u><strong>Sugeng Paryanto,ST.MT</strong></u><br>
        NIP. 19710402 199803 1 003
        <br>
        </td>
        </tr>
    </table>
</body>
</html>
