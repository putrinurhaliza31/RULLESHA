<?php
    require "session.php";
    require "koneksi.php";

    // $id_merk = "";
    // $nama = "";

    $querymerk = mysqli_query($con, "SELECT * FROM merksepatu");
    $jumlahmerk = mysqli_num_rows($querymerk);

    
if(isset($_POST['simpan']))
{
  if($_GET['hal'] == "edit"){
    $idp = $_GET['id'];
    // $kode_bahan = $_POST['kode_bahan'];
    $kode_merk = $_POST['merksepatu'];
    $nama_merk = $_POST['nama'];
 
    $queryupdate = mysqli_query($con, "UPDATE merksepatu SET `kode_merk`='$kode_merk',`nama`='$nama_merk' WHERE id_merk = '$idp' ");
    if ($queryupdate){
      echo "<script>
      alert('Edit data suksess !');
      document.location='merksepatu.php';
       </script>";
    } else{
      echo "<script>
      alert('Edit data GAGAL !');
      document.location='merksepatu.php';
       </script>";
    }

  }else{

        $namasepatu = htmlspecialchars($_POST['nama']);
        $id_merk = htmlspecialchars($_POST['merksepatu']);

        $queryexistnama = mysqli_query($con,"SELECT nama FROM merksepatu WHERE nama='$namasepatu' ");
        $jumlahdatabaru = mysqli_num_rows($queryexistnama);

        if($jumlahdatabaru > 0){
            ?>
            <div class="alert alert-warning mt-3" role="alert">
                Kategori Sudah Ada
            </div>
            <?php
        }else{
            $querysimpan = mysqli_query($con, "INSERT INTO merksepatu VALUES ('','$id_merk','$namasepatu')");
            if($querysimpan){
                echo "<script>
                alert('Insert data suksess !');
                document.location='merksepatu.php';
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
     $tampil = mysqli_query($con,"select * from merksepatu where id_merk= '$_GET[id]' ");
     $data = mysqli_fetch_array($tampil);
        if($data){
          $idu = $data['id_merk'];
          $kode_merk = $data['kode_merk'];
          $nama_merk= $data['nama'];
    
        }
    }elseif ($_GET['hal'] == "delete") {
    
        $id = $_GET['id'];
        $sqlnya = "delete from merksepatu where id_merk='$id'";
        $hasil = mysqli_query($con,$sqlnya);
        
        if ($hasil){
          echo "<script>
          alert('Hapus Data Suksess !');
          document.location='merksepatu.php';
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
  background: url('foto/bg_desktop.jpeg');
  background-size: auto;
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
                    Kategori Sepatu
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6 tex" >
            <h3>Tambah Kategori Sepatu</h3>

            <form action="" method="POST">
				<div class="mb-3">
					<label for="merksepatu" class="form-label ">ID Sepatu</label>
					<input type="text" class="form-control" id="merksepatu" name="merksepatu" value="<?= @$kode_merk; ?>" autocomplete="off">
					<div id="merksepatu" class="form-text text-white">Masukkan ID Merk Sepatu (e.g. 701)</div>
				</div>
                <div class="mb-3">
					<label for="nama" class="form-label">Nama Sepatu</label>                                                              
					<input type="text" class="form-control" id="nama" name="nama" value="<?= @$nama_merk; ?>" autocomplete="off">
					<div id="nama" class="form-text text-white">Masukkan Nama Sepatu</div>
				</div>
                <div class="col-12">
					<input Type="submit" name="simpan" class="btn btn-primary">
				</div>
            </form>
     
        </div>

    <div class="mt-3">
        <h2 class="tex">List Kategori Sepatu</h2>
        <div class="table-responsive mt-5">
        <table class="table text-white">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Merk</th>
                        <th>Nama</th>
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
                            <td><?php echo $data['kode_merk']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td>
                                  <a href="merksepatu.php?hal=edit&id=<?= $data['id_merk'];?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-edit"></i> </a>
                                  <a href="merksepatu.php?hal=delete&id=<?= $data['id_merk'];?>"class='btn btn-danger p-auto' onclick="return confirm('Data ini akan terhapus anda yakin?');"><i class='fa fa-trash'></i></a>
                              
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