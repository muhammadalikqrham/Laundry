<?php
session_start();
  include('config/koneksi.php');
  if(isset($_POST['daftar']))
  {
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $no_telp = $_POST['no_telp'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $sql="INSERT INTO konsumen VALUES ('','$nama','$alamat','$no_telp','$email','$password')";
      $hasil= mysqli_query($koneksi,$sql);
      if($hasil)
          echo "<script language='Javascript'>
          location.href = 'login.php'
          </script>";
      else
          echo "<script language='Javascript'>
          location.href = 'daftar.php'
          </script>";

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konsumen - Daftar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/css/style.css">
  <style>
  .kiri{
    padding-left: 25%;
    padding-top: 5%;
  }

  .kiri-card{
    padding-left: 120px;
    padding-top: 0px;
  }

  .enter{
    padding-bottom: 5px;
  }
</style>
</head>
<body>
    <div class="kiri">
        <div class="card mb-3 shadow-lg bg-white rounded" style="max-width: 950px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="asset/image/regrouplogin.png" class="card-img" height="720" >
            </div>
            <div class="col-md-6">
              <div class="card-body kiri-card">
                <img src="asset/image/logo.png" class="enter" width="400">
                <label class="card-text"><b>Daftar Akun</b></label>
                <form action="daftar.php" method="POST">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>No Telpon</label>
                    <input type="text" name="no_telp" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
                  <div class="form-group">  
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <input type="submit" value="Daftar" name="daftar" class="btn btn-info">
                </form>
                Sudah Punya akun? Silahkan <a href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
    </div> 
</body>
</html>