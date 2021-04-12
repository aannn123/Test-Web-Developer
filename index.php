<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Web Developer</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<?php
    include_once("config.php");

    $result = mysqli_query($mysqli, "SELECT * FROM t_history ORDER BY id DESC");
?>

<body>
    <h4 class="text-center mt-5">Laporan Transaksi</h4>
    <div class="row">
        <div class="container">
            <div class="">
                <button type="button" class="btn btn-primary mb-2 float-right" data-toggle="modal" data-target="#exampleModalLong">
                    Tambah Laporan
                </button>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Total Belanja</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php $no=1; foreach($result as $item) { ?>

                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $item['nama_pelanggan'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($item['tanggal'])) ?></td>
                            <td><?php echo number_format($item['total_belanja'],0,',','.') ?></td>
                        </tr>
                    <?php } ?>

                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Laporan Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="add.php">
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan nama pelanggan" required>
                        </div>
                        <div class="form-group">
                            <label>Omset</label>
                            <input type="number" name="omset" class="form-control" placeholder="Masukan Omset">
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" name="qty" class="form-control" placeholder="Masukan Quantity">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="submit" value="Save changes" />
                </div>
                </form>

            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>