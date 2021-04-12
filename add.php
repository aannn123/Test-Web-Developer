<?php
include_once("config.php");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $omset = $_POST['omset'];
    $qty = $_POST['qty'];


    $date = date('Y-m-d');


    $transaksi = ("INSERT INTO t_transaksi (nama_pelanggan, quantity)
      VALUES ('$nama', '$qty')");
    $last = $mysqli->query("SELECT total_quantity FROM t_laporan ORDER BY id DESC LIMIT 1");
    // $quantity = mysqli_fetch_array($last);
    $lastQty = (int)mysqli_fetch_array($last)[0];
    if ($mysqli->query($transaksi) == TRUE) {
        // $transaksi = ;
        $jumlah = $lastQty + (int)$qty;
        $mysqli->query("INSERT INTO t_laporan (omset, total_quantity, tanggal)
        VALUES ('$omset', '$jumlah', '$date')");
        $totalQty = $mysqli->query("SELECT total_quantity FROM t_laporan ORDER BY id DESC LIMIT 1");
        $totalQtyLast = (int)mysqli_fetch_array($totalQty)[0];
        $totalBelanja = ($omset / $totalQtyLast) * $qty;
        $mysqli->query("INSERT INTO t_history (nama_pelanggan, tanggal, total_belanja)
            VALUES ('$nama', '$date', '$totalBelanja')");

        header("Location: index.php");
    } else {
        echo "Error: " . $transaksi . "<br>" . $mysqli->error;
    }


    $mysqli->close();
}
