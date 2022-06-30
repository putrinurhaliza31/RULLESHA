<?php
    require "session.php";
    require "koneksi.php";

    $queryProduk = mysqli_query($con, "SELECT * FROM barang");
    $jumlahProduk = mysqli_num_rows($queryProduk);
    
    $queryPembelian = mysqli_query($con, "SELECT * FROM detailpembelian");
    $jumlahPembelian = mysqli_num_rows($queryPembelian);

    $queryPemasok = mysqli_query($con, "SELECT * FROM pemasok");
    $jumlahPemasok = mysqli_num_rows($queryPemasok);

    $queryPenjualan = mysqli_query($con, "SELECT * FROM detailpenjualan");
    $jumlahPenjualan = mysqli_num_rows($queryPenjualan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<style>
    .kotak{
        border: solid;
    }
    .summary-produk{
        background-color: pink;
        border-radius: 20px;
    }
    .no-decoration{
        text-decoration: none;
    }

    #example1 {
        background: url('foto/desktop.jpg')no-repeat center fixed;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size: cover;
}

.tex{
    color : white;
}
</style>

<body id="example1">
    <?php require "navbar.php";?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active text-white" aria-current="page">
                    <i class="fas fa-home text-white"></i>Home
                </li>
            </ol>
        </nav>
        <h2 class="text-white">Halo <?php echo $_SESSION['username']; ?></h2>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12 mb-3">
                    <div class="summary-produk p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-box fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6">
                                <h3 class="fs-2">Barang</h3>
                                <p class="fs-4"><?php echo $jumlahProduk; ?> Barang</p>
                                <p><a href="barang.php" class="text-dark no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12 mb-3">
                    <div class="summary-produk p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-user fa-7x text-black-50"></i>
                            </div>
                            <div class="col-6">
                                <h3 class="fs-2">Pemasok</h3>
                                <p class="fs-4"><?php echo $jumlahPemasok; ?> Pemasok</p>
                                <p><a href="pemasok.php" class="text-dark no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/js/all.min.js"></script>
    
</body>
</html>