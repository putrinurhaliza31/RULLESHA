<?php
    require "session.php";
    require "koneksi.php";

    // $id_merk = "";
    // $nama = "";

    $querymerk = mysqli_query($con, "SELECT * from barang");
    $jumlahmerk = mysqli_num_rows($querymerk);

    
if(isset($_POST['simpan']))
{
 if($_GET['hal'] == "edit"){
    
            $idp = $_GET['id'];
            $nama_merk = $_POST['merk_sepatu'];
            $nama = $_POST['nama'];
            $ukuran = $_POST['ukuran'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $detail = $_POST['detail'];
            $pemasok = $_POST['pemasok'];
            $foto_nama = $_FILES['pas_foto']['name'];
            $foto_size = $_FILES['pas_foto']['size'];
            
    
        // Mengecek apakah file lebih besar 2 MB atau tidak
        if ($foto_size > 2097152) {
           // Jika File lebih dari 2 MB maka akan gagal mengupload File
        //    header("location:barang.php?pesan=size");
    
        }else{
    
           // Mengecek apakah Ada file yang diupload atau tidak
           if ($foto_nama != "") {
    
              // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
              $ekstensi_izin = array('png','jpg','jepg');
              // Memisahkan nama file dengan Ekstensinya
              $pisahkan_ekstensi = explode('.', $foto_nama); 
              $ekstensi = strtolower(end($pisahkan_ekstensi));
              // Nama file yang berada di dalam direktori temporer server
              $file_tmp = $_FILES['pas_foto']['tmp_name'];   
              // Membuat angka/huruf acak berdasarkan waktu diupload
              $tanggal = md5(date('Y-m-d h:i:s'));
              // Menyatukan angka/huruf acak dengan nama file aslinya
              $foto_nama_new = $tanggal.'-'.$foto_nama; 
    
              // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
              if(in_array($ekstensi, $ekstensi_izin) === true)  {
    
                // Mengambil data siswa_foto didalam table siswa
                $get_foto = "SELECT foto FROM barang WHERE id_sepatu='$idp'";
                $data_foto = mysqli_query($con, $get_foto); 
                // Mengubah data yang diambil menjadi Array
                $foto_lama = mysqli_fetch_array($data_foto);
    
                // Menghapus Foto lama didalam folder FOTO
                unlink("foto/".$foto_lama['foto']);    
    
                // Memindahkan File kedalam Folder "FOTO"
                move_uploaded_file($file_tmp, 'foto/'.$foto_nama_new);
    
                // Query untuk memasukan data kedalam table SISWA
                $query = mysqli_query($con, "UPDATE barang SET id_merk='$nama_merk', nama_sepatu='$nama', ukuran_sepatu='$ukuran',harga='$harga',stok='$stok',detail='$detail', foto='$foto_nama_new', id_pemasok='$pemasok' WHERE id_sepatu='$idp'");
    
                // Mengecek apakah data gagal diinput atau tidak
                if($query){
                    header("location:barang.php?pesan=berhasil");
                } else {
                    header("location:barang.php?pesan=gagal");
           
               
                }
    
            } else { 
                // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
                header("location:barang.php?pesan=ekstensi");
                }
    
            }else{
    
            // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
            $query = mysqli_query($koneksi, "UPDATE barang SET id_merk='$nama_merk', nama_sepatu='$nama', ukuran_sepatu='$ukuran',harga='$harga',stok ='$stok',detail='$detail', id_pemasok='$pemasok' WHERE id_sepatu='$idp'");
    
                // Mengecek apakah data gagal diinput atau tidak
                if($query){
                    header("location:barang.php?pesan=berhasil");
                }else {
                    header("location:barang.php?pesan=gagal");
                    
                }
            }
    
        }
    

  }else{

$nama_merk = $_POST['merk_sepatu'];
$nama = $_POST['nama'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$detail = $_POST['detail'];
$pemasok = $_POST['pemasok'];
$foto_nama = $_FILES['pas_foto']['name'];
$foto_size = $_FILES['pas_foto']['size'];

// Mengecek apakah file lebih besar 2 MB atau tidak
if ($foto_size > 2097152) {
	// Jika File lebih dari 2 MB maka akan gagal mengupload File
	header("location:barang.php?pesan=size");
}else{


	if ($foto_nama != "") {


		$ekstensi_izin = array('png','jpg','jepg');

		$pisahkan_ekstensi = explode('.', $foto_nama); 
		$ekstensi = strtolower(end($pisahkan_ekstensi));

		$file_tmp = $_FILES['pas_foto']['tmp_name'];   

		$tanggal = md5(date('Y-m-d h:i:s'));

		$foto_nama_new = $tanggal.'-'.$foto_nama; 


		if(in_array($ekstensi, $ekstensi_izin) === true)  {

            move_uploaded_file($file_tmp, 'foto/'.$foto_nama_new);


            $query = mysqli_query($con, "INSERT INTO barang VALUES ('','$nama_merk', '$nama', '$ukuran','$harga','$stok','$detail','$foto_nama_new','$pemasok')");

  
            if($query){
            	header("location:barang.php?pesan=berhasil");
            } else {
                echo mysqli_error($con);
            }

        } else { 

            echo mysqli_error($con);     }

    }else{

        $query = mysqli_query($con, "INSERT INTO barang VALUES ('','$nama_merk', '$nama', '$ukuran','$harga','$stok','$detail','$pemasok')");

            if($query){
            	header("location:barang.php?pesan=berhasil");
            } else {
                echo mysqli_error($con);
            }

    }

}


  }

}

// update delete

if(isset($_GET['hal']))
{
    if($_GET['hal'] == "edit"){
     $tampil = mysqli_query($con,"select * from barang where id_sepatu= '$_GET[id]' ");
     $data = mysqli_fetch_array($tampil);
        if($data){
            $idambil = $_GET['id'];
            $nama_merk = $data['id_merk'];
            $nama = $data['nama_sepatu'];
            $ukuran = $data['ukuran_sepatu'];
            $harga = $data['harga'];
            $stok = $data['stok'];
            $detail = $data['detail'];
            $pemasok = $data['id_pemasok'];
            $foto = $data['foto'];
            
    
        }
    }elseif ($_GET['hal'] == "delete") {
    
        $id = $_GET['id'];
        $sqlnya = "delete from barang where id_sepatu='$id'";
        $hasil = mysqli_query($con,$sqlnya);
        
        if ($hasil){
          echo "<script>
          alert('Hapus Data Suksess !');
          document.location='barang.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }
    #example1 {
        background: url('foto/desktop.jpg')no-repeat center fixed;
        -webkit-background-size:cover;
        -moz-background-size:cover;
        -o-background-size:cover;
        background-size: cover;
    }
</style>

<body id="example1" >
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="no-decoration text-white">
                        <i class="fas fa-home text-white"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">
                    Produk
                </li>
            </ol>
        </nav>`
        <?php
     
         $sql = "select * from barang where id_sepatu = '$idambil'";
         $koneksi = $con->query($sql);
         while($row = $koneksi->fetch_assoc()){
        ?>
        <div class="my-5 col-12 col-md-6 text-white">
            <h3>Tambah Produk</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="merksepatu" class="form-label text-white">Merk Sepatu</label>
                    <select name="merk_sepatu" id="merk_sepatu" class="form-control">
                    <?php
                                      $sql2 = "SELECT * FROM merksepatu";
                                      $result2 = $con->query($sql2);
                                      if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                          if($row["id_merk"] == $row2["id_merk"]){
                                            echo   '<option value="'.  $row2["id_merk"].'" selected>'.  $row2["nama"].'</option>';
                                          }else{
                                            echo   '<option value="'.  $row2["id_merk"].'">'.  $row2["nama"].'</option>';
                                          }
                                        }
                                      } else {
                                        echo "0 results";
                                      }
                                  ?>
                    </select>
                    <div id="merksepatu" class="form-text text-white">Masukkan Merk Sepatu</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Sepatu</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= @$nama; ?>"
                        autocomplete="off">
                    <div id="nama" class="form-text text-white">Masukkan Nama Sepatu</div>
                </div>
                <div class="mb-3">
                    <label for="merksepatu" class="form-label">Ukuran Sepatu</label>
                    <input type="text" class="form-control" id="ukuran" name="ukuran"
                        value="<?= @$ukuran; ?>" autocomplete="off">
                    <div id="merksepatu" class="form-text text-white">Masukkan Ukuran Sepatu</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?= @$harga; ?>"
                        autocomplete="off">
                    <div id="nama" class="form-text text-white">Masukkan Harga</div>
                </div>
                <div class="mb-3">
                    <label for="merksepatu" class="form-label">Stock</label>
                    <input type="text" class="form-control" id="stok" name="stok"
                        value="<?= @$stok; ?>" autocomplete="off">
                    <div id="merksepatu" class="form-text text-white">Masukkan Stock</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Detail</label>
                    <textarea  class="form-control" id="detail" name="detail"
                        autocomplete="off"><?= @$detail; ?></textarea>
                    <div id="nama" class="form-text text-white">Masukkan Nama Sepatu</div>
                </div>
                <div class="mb-3">
                    <label for="merksepatu" class="form-label">Pemasok</label>
                    <select name="pemasok" id="pemasok" class="form-control">
                    <?php
                                 $sql = "select * from pemasok";
                                 $result1 = $con->query($sql);
                                 if ($result1->num_rows > 0) {
                                    while($row3 = $result1->fetch_assoc()) {
                                      if($row["id_pemasok"] == $row3["id_pemasok"]){
                                        echo   '<option value="'.  $row3["id_pemasok"].'" selected>'.  $row3["nama"].'</option>';
                                      }else{
                                        echo   '<option value="'.  $row3["id_pemasok"].'">'.  $row3["nama"].'</option>';
                                      }
                                    }
                                  } else {
                                    echo "0 results";
                                  }
                              ?>
                    </select>
                    <div id="merksepatu" class="form-text text-white">Masukkan Pemasok</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Foto</label>
                    <input type="file" name="pas_foto" class="form-control">
                    <div id="nama" class="form-text text-white">Masukkan Foto</div>
                </div>
                <div class="col-12">
                    <input Type="submit" name="simpan" class="btn btn-primary">
                </div>
            </form>

        </div>
        <?php
        };
        ?>

        <div class="mt-3">
            <h2>List Kategori Sepatu</h2>
            <div class="table-responsive mt-5">
                <table class="table text-white">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Merk</th>
                            <th>Nama Sepatu</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Detail</th>
                            <th>Foto</th>
                            <th>Pemasok</th>
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
                            <td><?php echo $data['id_merk']; ?></td>
                            <td><?php echo $data['nama_sepatu']; ?></td>
                            <td><?php echo $data['ukuran_sepatu']; ?></td>
                            <td><?php echo $data['harga']; ?></td>
                            <td><?php echo $data['stok']; ?></td>
                            <td><?php echo $data['detail']; ?></td>
                            <td>
                            <?php 
							if ($data['foto'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
							<?php }else{ ?>
								<img src="foto/<?php echo $data['foto']; ?>" style="width:100px;height:100px;">
							<?php } ?>

                            </td>
                            <td><?php echo $data['id_pemasok']; ?></td>
                            <td>
                                <a href="editbarang.php?hal=edit&id=<?= $data['id_sepatu'];?>"
                                    class="btn btn-primary btn-flat btn-xs"><i class="fa fa-edit"></i> </a>
                                <a href="barang.php?hal=delete&id=<?= $data['id_sepatu'];?>"
                                    class='btn btn-danger p-auto'
                                    onclick="return confirm('Data ini akan terhapus anda yakin?');"><i
                                        class='fa fa-trash'></i></a>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/js/all.min.js"></script>
</body>

</html>