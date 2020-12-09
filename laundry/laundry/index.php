<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <p>SELAMAT DATANG <?php echo $_SESSION['kode_konsumen'];?></p>
        <form action="index.php" method="POST">
            <input type="submit" value="logout" name="logout">
        </form>
    </body>
</html>
<?php if(isset($_POST['logout']))
{
    echo "<script language='Javascript'>
    (window.alert('Anda Berhasil Logout'))
     location.href = 'login_konsumen.php'
</script>";
session_destroy();
}
        ?>