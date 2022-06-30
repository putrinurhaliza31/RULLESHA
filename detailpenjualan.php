<?php
    require "session.php";
    require "koneksi.php";

    // $id_pembelian = "";
    //no_nota   = "";
    // $harga = "";

    $id = $_GET['id_pembelian'];
    $querypem = mysqli_query($con, "select dp.*, p.id_penjualan, p.tgl_penjualan, b.id_sepatu, b.nama_sepatu from penjualan p join detailpenjualan dp on p.no_nota = dp.no_nota join barang b on p.id_sepatu = b.id_sepatu where p.id_penjualan = '$id'");
    $jumlahpem = mysqli_num_rows($querypem);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<style>
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

.p{
    background: url('foto/desktop.jpg')no-repeat center fixed;
    -webkit-background-size:cover;
    -moz-background-size:cover;
    -o-background-size:cover;
    background-size: cover;
}
</style>

<body class="p">
    <?php require "navbar.php"; ?>
    <div class="container mt-5" >
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="no-decoration text-white" >
                        <i class="fas fa-home text-white"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">
                 Penjualan
                </li>
            </ol>
        </nav>

    <div class="mt-3">
        <h2 class="tex">List Detail Penjualan</h2>

        <div class="table-responsive mt-5">
        <table class="table text-white">
                <tbody>
                    <?php
                        if($jumlahpem==0){
                    ?>
                        <tr>
                            <td colspan=3 class="text-center">Data Kategori Tidak Tersedia</td>
                        </tr>
                    <?php        
                        }
                        else{
                         
                            while($data=mysqli_fetch_array($querypem)){
                    ?>
                
                        <tr>
                            <td><b>No Nota</b></td>   
                            <td><?php echo $data['no_nota']; ?></td>         
                        </tr>
                        <tr>
                            <td><b>Nama Barang</b></td>   
                            <td><?php echo $data['nama_sepatu']; ?></td>         
                        </tr>
                        <tr>
                            <td><b>Jumlah</b></td>   
                            <td><?php echo $data['jumlah']; ?></td>         
                        </tr>
                        <tr>
                            <td><b>Harga</b></td>   
                            <td><?php echo "Rp.".$data['harga']; ?></td>         
                        </tr>
                        <tr>
                            <td><b>Tanggal Transaksi</b></td>   
                            <td><?php echo $data['tgl_penjualan']; ?></td>         
                        </tr>
                    <?php   
                                 
                            }
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/js/all.min.js"></script>
</body>
</html>