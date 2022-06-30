<?php
    session_start();
    require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    .main{
        height: 100vh;
    }

    .login-box{
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
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
    <div class="main d-flex flex-column justify-content-center align-items-center">
    <h1 class="align-center text-white">RULLESHA</h1>
        <div class="login-box p-5 shadow">
            <form action="" method="post">
               <div>
                    <label for="username"><b class="text-white">Username</b></label>
                    <input type="text" class="form-control" name="username" id="username" autocomplete="off">
               </div> 
               <div>
                    <label for="password"><b class="text-white">Password</b></label>
                    <input type="password" class="form-control" name="password" id="password">
               </div> 
               <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
               </div>
            </form>
        </div>
            <div class="mt-3" style="width: 500px">
                <?php
                    if(isset($_POST['loginbtn'])){
                        $username = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);

                        $query = mysqli_query($con,"SELECT * FROM login WHERE username='$username' ");
                        $countdata = mysqli_num_rows($query);
                        $data = mysqli_fetch_array($query); 
                       
                        if($countdata>0){
                            if(password_verify($password, $data['password'])){
                                $_SESSION['username'] = $data['username'];
                                $_SESSION['login'] = true;
                                header('location: index.php');
                            }else{
                                ?>
                                <div class="alert alert-warning" role="alert">
                                        Password salah
                                </div>
                                <?php
                            }
                        }else{
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Akun tidak tersedia
                            </div>
                            <?php
                        }

                    }
                ?>
            </div>
    </div>
</body>
</html>