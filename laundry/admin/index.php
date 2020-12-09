<?php
session_start();
if (isset($_POST['login'])) 
{

  include('../config/koneksi.php');

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $login = mysqli_query($koneksi,"SELECT kode_akun,email,password FROM konsumen WHERE email='$email' AND password='$password'");
  $kode = mysqli_fetch_array($login);
  $cek = mysqli_num_rows($login);

  if($cek > 0){
    $_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    $_SESSION['kode_akun'] = $kode['kode_konsumen'];
    header("location:halaman_admin/index.php");
  }else{
    header("location:index.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../asset/css/style.css">
  <style>
  .kiri{
    padding-left: 200px;
    padding-top: 27px;
  }

  .kiri-card{
    padding-left: 120px;
    padding-top: 70px;
  }
  .enter{
    padding-bottom: 30px;
  }
</style>
</head>

<body>
    <div class="kiri">
        <div class="card mb-3 shadow-lg bg-white rounded" style="max-width: 950px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="../asset/image/regrouplogin.png" class="card-img">
            </div>
            <div class="col-md-6">
              <div class="card-body kiri-card">
                <img src="../asset/image/logo.png" class="enter" width="400">
                <label class="card-text"><b>Silahkan Masukan Email dan Password</b></label>
                <form action="">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                    <br>
                  </div>
                  <div class="form-group">  
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <br>
                  </div>
                  <input type="submit" value="Login" name="login" class="btn btn-info">
                </form>
                  Belum punya akun? Silahkan <a href="daftar.php">Daftar</a>
              </div>
            </div>
          </div>
        </div>
    </div>   
</body>
</html>