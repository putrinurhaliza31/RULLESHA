<?php
    require "session.php";
    require "koneksi.php";

   $id = $_GET['p'];
   $query = mysqli_query($con,"SELECT * FROM merksepatu WHERE id_merk='$id' ");
   $data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        require "navbar.php";
    ?>
    <div class="container mt-5">
        <h2>Detail Kategori</h2>

        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama']; ?>" autocomplete="off">
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                </div>
            </form>

            <?php
                if(isset($_POST['editBtn'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    if($data['nama']==$kategori){
                        ?>
                            <meta http-equiv="refresh" content="0; url=merksepatu.php" />
                        <?php
                    }else{
                        $query = mysqli_query($con, "SELECT * FROM merksepatu WHERE nama='$kategori' ");
                        $jumlahData = mysqli_num_rows($query);
                        if($jumlahData > 0){
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Kategori Sudah Ada
                                </div>
                            <?php 
                        }else{
                            $querysimpan = mysqli_query($con, "UPDATE merksepatu SET nama='$kategori' WHERE id_merk='$id'");
                            if($querysimpan){
                                ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Kategori Berhasil Diupdate
                                </div>
                                <meta http-equiv="refresh" content="2; url=merksepatu.php" />
                                <?php
                            }else{
                                echo mysqli_error($con);
                            }
                        }
                    }
                }

                if(isset($_POST['deleteBtn'])){
                    $queryDelete = mysqli_query($con, "DELETE FROM merksepatu WHERE id_merk='$id'");
                    if($queryDelete){
                        ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Kategori Berhasil Dihapus
                            </div>
                            <meta http-equiv="refresh" content="2"; url=merksepatu.php" />
                        <?php
                    }else{
                        echo mysqli_error($con);
                    }
                }
            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>