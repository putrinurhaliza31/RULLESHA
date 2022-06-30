<?php
    require "koneksi.php";

    $id = $_GET['id'];
    $query = mysqli_query($con,"SELECT * FROM barang WHERE id_sepatu='$id' ");
    $data = mysqli_fetch_array($query);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<style>
    .text-harga{
        font-size: 22px;
        color: chocolate;
    }
</style>
<body>
    <?php require "navbar.php" ?>

    <!-- detail produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                       <img src="foto/<?php echo $data['foto']; ?>" style="width:600px">
                </div>
                <div class="col-md-6 offset-md-1">
                    <h2 class="font"><strong><?php echo $data['nama_sepatu']; ?></strong></h2>
                    <p class="fs-5  font"> <?php echo $data['detail'] ?>
                    </p>
                    <p class="text-harga font">
                        <?php echo "Rp.".$data['harga']; ?>
                    </p>
                    <p class="fs-5 font">Stok : <strong><?php echo  $data['stok']; ?></strong></p>
                </div>
            </div>
        </div>
    </div>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</body>
</html>