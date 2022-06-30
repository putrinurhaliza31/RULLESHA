<?php

require "session.php";
require "koneksi.php";

$id_merk    = "";
$nama       = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

// Untuk Delete Data
if ($op == 'delete') {
    $id_merk = $_GET['id_merk'];
    $sql1         = "delete from merksepatu where id_merk = '$id_merk'";
    $q1           = mysqli_query($con, $sql1);
    if ($q1) {
        $sukses   = "Berhasil Menghapus Data";
    } else {
        $error     = "Gagal Menghapus Data";
    }
}

//untuk edit data
if ($op == 'edit') {
    $id_merk        = $_GET['id_merk'];
    $sql1           = "select * from merksepatu where id_merk = '$id_merk'";
    $q1             = mysqli_query($con, $sql1);
    $r1             = mysqli_fetch_array($q1);
    $id_merk        = $r1['id_merk'];
    $nama           = $r1['nama'];

    if ($id_merk == '') {
        $error = "Data Tidak Ditemukan";
    }
}

//untuk create data
if (isset($_POST['simpan'])) {
    $id_merk    = $_POST['id_merk'];
    $nama       = $_POST['nama'];

    if ($id_merk && $nama) {
        if ($op == 'edit') { //update
            $sql1 = "update merksepatu set id_merk = '$id_merk',nama = '$nama'";
            $q1 = mysqli_query($con, $sql1);
            if ($q1) {
                $sukses = "Berhasil Mengupdate Data";
            } else {
                $error = "Gagal Mengupdate Data";
            }
        } else { //insert
            $sql1 = "insert into merksepatu(id_merk,nama) values ('$id_merk','$nama')";
            $q1 = mysqli_query($con, $sql1);
            if ($q1) {
                $sukses = "Berhasil Menambahkan Data";
            } else {
                $error = "Gagal Menambahkan Data";
            }
        }
    } else {
        $error = "Silakan Masukkan Data dengan Lengkap";
    }
}

?>

<!DOCTYPE html>
<html>

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
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php" class="no-decoration text-muted">
                        <i class="fas fa-home"></i>Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Kategori Sepatu
                </li>
            </ol>
        </nav>

        <?php
        if ($error) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php
        }
        ?>
        <?php
        if ($sukses) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $sukses ?>
            </div>
        <?php
        }
        ?>
        <div class="my-5 col-12 col-md-6">
            <h2>Tambah Kategori Sepatu</h2>

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="merksepatu" class="form-label">ID Sepatu</label>
                    <input type="text" class="form-control" id="merksepatu" name="merksepatu" value="<?php echo $id_merk ?>" autocomplete="off">
                    <div id="merksepatu" class="form-text">Masukkan ID Merk Sepatu (e.g. 701)</div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Merek Sepatu</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>" autocomplete="off">
                    <div id="nama" class="form-text">Masukkan Merek Sepatu</div>
                </div>
                <div class="col-12">
                    <input Type="submit" name="simpan_kategori" value="Simpan Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header text-white bg-secondary">
            Data Kategori Sepatu
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th scope="col">ID Merek Sepatu</th>
                        <th scope="col">Merek Sepatu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                <tbody>
                    <?php
                    $sql2 = "select * from merksepatu order by id_merk";
                    $q2     = mysqli_query($con, $sql2);
                    $urut   = 701;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id_merk     = $r2['id_merk'];
                        $nama         = $r2['nama'];

                    ?>
                        <tr>
                            
                            <td scope="row"><?php echo $id_merk?></td>
                            <td scope="row"><?php echo $nama ?></td>
                            <td scope="" row>
                                <a href="merksepatu2.php?op=edit&id_merk=<?php echo $id_merk ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                <a href="merksepatu2.php?op=delete&id_merk=<?php echo $id_merk ?>" onclick="return confirm('Apakah anda yakin akan menghapus data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                </thead>
            </table>
        </div>
    </div>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/js/all.min.js"></script>
</body>

</html>