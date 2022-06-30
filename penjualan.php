<?php
    require "session.php";
    require "koneksi.php";

    // $id_pembelian = "";
    //no_nota   = "";
    // $harga = "";

    $querypem = mysqli_query($con, "SELECT * from penjualan");
    $jumlahpem = mysqli_num_rows($querypem);

    
if(isset($_POST['simpan']))
{
  if($_GET['hal'] == "edit"){
    $id = $_GET['id_pembelian'];
    // $kode_bahan = $_POST['kode_bahan'];
    $no_nota = $_POST['no_nota'];
    $jumlah =  $_POST['jumlah'];
    $harga  = $_POST['harga'];
 
    $queryupdate = mysqli_query($con, "UPDATE detailpembelian SET no_nota='$no_nota',jumlah='$jumlah',harga='$harga' WHERE id_pembelian = '$id' ");
    if ($queryupdate){
      echo "<script>
      alert('Edit data suksess !');
      document.location='detailpembelian.php';
       </script>";
    } else{
      echo "<script>
      alert('Edit data GAGAL !');
      document.location='detailpembelian.php';
       </script>";
    }

  }else{

    $no_nota = htmlspecialchars($_POST['no_nota']);
    $nama = htmlspecialchars($_POST['merk_sepatu']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $harga  = htmlspecialchars($_POST['harga']);
    $tanggal = htmlspecialchars($_POST['tanggal']);

    $querysimpan = mysqli_query($con, "INSERT INTO penjualan VALUES ('','$nama','$no_nota','$tanggal')");
    $querysimpan1 = mysqli_query($con, "INSERT INTO detailpenjualan VALUES ('','$no_nota','$jumlah','$harga')");

    if($querysimpan && $querysimpan1){
        echo "<script>
        alert('Transakski Berhasil !');
        document.location='penjualan.php';
         </script>";
    }else{
        echo mysqli_error($con);
    }
 }
};


// update delete

if(isset($_GET['hal']))
{
    if($_GET['hal'] == "edit"){
        $id = $_GET['id_pembelian'];
     $tampil = mysqli_query($con,"SELECT * FROM detailpembelian where id_pembelian= '$id' ");
     $data = mysqli_fetch_array($tampil);
        if($data){
          $no_nota   = $data['no_nota'];
          $jumlah    = $data['jumlah'];
          $harga     = $data['harga'];
        }
    }elseif ($_GET['hal'] == "delete") {
    
        $id = $_GET['id_pembelian'];
        $sqlnya = "DELETE FROM detailpembelian where id_pembelian='$id'";
        $hasil = mysqli_query($con,$sqlnya);
        
        if ($hasil){
          echo "<script>
          alert('Hapus Data Suksess !');
          document.location='detailpembelian.php';
           </script>";
        } 
    }   
     

};
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
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

        <div class="my-5 col-12 col-md-6 tex" >
            <h3>Transaksi Penjualan</h3>

            <form action="" method="POST">
                <div class="mb-3">
					<label for="no_nota" class="form-label">No Nota</label>                                                              
					<input type="text" class="form-control" id="no_nota" name="no_nota" value="<?= @$no_nota; ?>" autocomplete="off">
					<div id="no_nota" class="form-text text-white">Masukkan No Nota</div>
				</div>
                <div class="mb-3">
                    <label for="merksepatu" class="form-label">Sepatu</label>
                    <select name="merk_sepatu" id="merk_sepatu" class="form-control">
                    <?php
                                $sql = "select * from barang";
                               $koneksi = $con->query($sql);
                                if ($koneksi->num_rows > 0) {
                                while($row = $koneksi->fetch_assoc()){
                                echo '<option value="' . $row["id_sepatu"]. '">'. $row['nama_sepatu'].'</option>';
                                }  
                                } else {
                                echo "0 Result";
                                }   
                        ?>
                    </select>
                    <div id="merksepatu" class="form-text text-white">Masukkan Merk Sepatu</div>
                </div>
                <div class="mb-3">
					<label for="jumlah" class="form-label">Jumlah</label>                                                              
					<input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= @$jumlah; ?>" autocomplete="off">
					<div id="jumlah" class="form-text text-white">Masukkan Jumlah Sepatu</div>
				</div>
                <div class="mb-3">
					<label for="harga" class="form-label">Harga</label>                                                              
					<input type="text" class="form-control" id="harga" name="harga" value="<?= @$harga; ?>" autocomplete="off">
					<div id="harga" class="form-text text-white">Masukkan Harga Sepatu</div>
				</div>
              
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" value="<?= date("Y-m-d\TH:i:s");  ?>" autocomplete="off" hidden>
                <div class="col-12">
					<input Type="submit" name="simpan" class="btn btn-primary">
				</div>
            </form>
     
        </div>

    <div class="mt-3">
        <h2 class="tex">List Penjualan</h2>
        <div class="table-responsive mt-5">
        <table class="table text-white">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No Nota</th>
                        <th>Tanggal Penjualan</th>
                        <th>Action</th>
                    </tr>
                </thead>
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
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($querypem)){
                    ?>
                        <tr>
                            
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo $data['no_nota']; ?></td>
                            <td><?php echo $data['tgl_penjualan']; ?></td>
                            <td>
                            <a href="detailpenjualan.php?hal=dp&id_pembelian=<?php echo $data['id_penjualan']; ?>" class="btn btn-success btn-flat btn-xs"><i class="fa fa-search"></i> </a>    
                            </td>
                        </tr>
                    <?php   
                            $jumlah++;         
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