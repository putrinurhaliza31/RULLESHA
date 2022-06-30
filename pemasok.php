<?php
    require "session.php";
    require "koneksi.php";

    // $id_merk = "";
    // $nama = "";

    $querymerk = mysqli_query($con, "SELECT * FROM pemasok");
    $jumlahmerk = mysqli_num_rows($querymerk);

    
if(isset($_POST['simpan']))
{
  if($_GET['hal'] == "edit"){
    $idp = $_GET['id'];
    // $kode_bahan = $_POST['kode_bahan'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp =  $_POST['notelp'];
 
    $queryupdate = mysqli_query($con, "UPDATE pemasok SET `nama`='$nama',`alamat`='$alamat',`no_telp`='$no_telp' WHERE id_pemasok = '$idp' ");
    if ($queryupdate){
      echo "<script>
      alert('Edit data suksess !');
      document.location='pemasok.php';
       </script>";
    } else{
      echo "<script>
      alert('Edit data GAGAL !');
      document.location='pemasok.php';
       </script>";
    }

  }else{

        $nama = htmlspecialchars($_POST['nama']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $no_telp = htmlspecialchars($_POST['notelp']);

        $queryexistnama = mysqli_query($con,"SELECT nama FROM pemasok WHERE nama='$nama' ");
        $jumlahdatabaru = mysqli_num_rows($queryexistnama);

        if($jumlahdatabaru > 0){
            ?>
            <div class="alert alert-warning mt-3" role="alert">
                Kategori Sudah Ada
            </div>
            <?php
        }else{
            $querysimpan = mysqli_query($con, "INSERT INTO pemasok VALUES ('','$nama','$alamat','$no_telp')");
            if($querysimpan){
                echo "<script>
                alert('Insert data suksess !');
                document.location='pemasok.php';
                 </script>";
            }else{
                echo mysqli_error($con);
            }
        }
   


  }
};


// update delete

if(isset($_GET['hal']))
{
    if($_GET['hal'] == "edit"){
     $tampil = mysqli_query($con,"select * from pemasok where id_pemasok= '$_GET[id]' ");
     $data = mysqli_fetch_array($tampil);
        if($data){
          $nama = $data['nama'];
          $alamat= $data['alamat'];
          $no_telp = $data['no_telp'];
        }
    }elseif ($_GET['hal'] == "delete") {
    
        $id = $_GET['id'];
        $sqlnya = "delete from pemasok where id_pemasok='$id'";
        $hasil = mysqli_query($con,$sqlnya);
        
        if ($hasil){
          echo "<script>
          alert('Hapus Data Suksess !');
          document.location='pemasok.php';
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
    <title>Merk Sepatu</title>
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
</style>

<body id="example1">
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
                    Pemasok
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6 tex" >
            <h3>Tambah Pemasok</h3>

            <form action="" method="POST">
				<div class="mb-3">
					<label for="merksepatu" class="form-label ">Nama Pemasok</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?= @$nama; ?>" autocomplete="off">
					<div id="merksepatu" class="form-text text-white">Masukkan Nama Pemasok</div>
				</div>
                <div class="mb-3">
					<label for="nama" class="form-label">Alamat</label>                                                              
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?= @$alamat; ?>" autocomplete="off">
					<div id="nama" class="form-text text-white">Masukkan Alamat</div>
				</div>
                <div class="mb-3">
					<label for="nama" class="form-label">No Telp</label>                                                              
					<input type="text" class="form-control" id="notelp" name="notelp" value="<?= @$no_telp; ?>" autocomplete="off">
					<div id="nama" class="form-text text-white">Masukkan No Telp</div>
				</div>
                <div class="col-12">
					<input Type="submit" name="simpan" class="btn btn-primary">
				</div>
            </form>
     
        </div>

    <div class="mt-3">
        <h2 class="tex">List Pemasok</h2>
        <div class="table-responsive mt-5">
        <table class="table text-white">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Pemasok</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($jumlahmerk==0){
                    ?>
                        <tr>
                            <td colspan=3 class="text-center">Data Kategori Tidak Tersedia</td>
                        </tr>
                    <?php        
                        }
                        else{
                            $jumlah = 1;
                            while($data=mysqli_fetch_array($querymerk)){
                    ?>
                        <tr>
                            
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['no_telp']; ?></td>
                            <td>
                                  <a href="pemasok.php?hal=edit&id=<?= $data['id_pemasok'];?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-edit"></i> </a>
                                  <a href="pemasok.php?hal=delete&id=<?= $data['id_pemasok'];?>"class='btn btn-danger p-auto' onclick="return confirm('Data ini akan terhapus anda yakin?');"><i class='fa fa-trash'></i></a>
                              
                                  <!-- <a href="kategori-detail.php?p=<?php echo $data['id_merk']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a> -->
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