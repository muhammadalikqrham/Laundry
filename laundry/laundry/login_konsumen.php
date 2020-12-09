<?php
session_start();
include('config/koneksi.php');
    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT kode_konsumen,email,password FROM konsumen";
    $query = mysqli_query($koneksi,$sql);
    while($baris = mysqli_fetch_array($query))
    {
        if($email == $baris['email'] && md5($password) == $baris['password'])
        {
            echo "<script language='Javascript'>
                    (window.alert('Anda Berhasil Login'))
                     location.href = 'index.php'
                </script>";
            $_SESSION['login_konsumen'] = true;
            $_SESSION['kode_konsumen'] = $baris['kode_konsumen'];
        }
        else
        echo "<script language='Javascript'>
                    (window.alert('Anda Gagal Login Terjadi Masalah'))
                     location.href = 'login_konsumen.php'
                </script>";
        // var_dump($_SESSION);

    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <form action="login_konsumen.php" method="post">
            <table>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="login" value="Login"></td>
                </tr>
            </table>
        </form>
    </body>
</html>