<?php
    include('config/koneksi.php');
    if(isset($_POST['simpan']))
    {
        $user = $_POST['user'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql="INSERT INTO konsumen VALUES ('','$nama','$alamat','$no_telp','$email','$password')";
        $hasil= mysqli_query($koneksi,$sql);
        if($hasil)
            echo "<script language='Javascript'>
            (window.alert('Data jurusan sudah di simpan'))
            location.href = 'v_konsumen.php'
            </script>";
        else
            echo "<script language='Javascript'>
            (window.alert('Data jurusan Tidak Bisa di simpan'))
            location.href = 'v_konsumen.php'
            </script>";

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
    </head>
    <body>
        <form action="add_konsumen.php" method="POST">
            <table border="0" align="center" width="35%">
                <caption><h2>Daftar Akun</h2></caption>
                <tr>
                    <td width="25%">Nama</td>
                    <td width="5%">:</td>
                    <td width="70%"><input type="text" name="nama" size="40" required></td>
                </tr>
                <tr>
                    <td width="25%">Alamat</td>
                    <td width="5%">:</td>
                    <td width="70%">
                        <textarea name="alamat" cols="40" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td width="25%">Nomor Telepon</td>
                    <td width="5%">:</td>
                    <td width="70%"><input type="text" name="no_telp" size="40" required></td>
                </tr>
                <tr>
                    <td width="25%">Email</td>
                    <td width="5%">:</td>
                    <td width="70%"><input type="email" name="email" size="40" required></td>
                </tr>
                <tr>
                    <td width="25%">Password</td>
                    <td width="5%">:</td>
                    <td width="70%"><input type="password" name="password" size="40" required></td>
                </tr>
                <tr>
                    <td width="25%">&nbsp;</td>
                    <td width="5%">&nbsp;</td>
                    <td width="70%"><input type="submit" name="simpan" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <table border="0" width="40%" align="center">
	<tr>
		<td>
		<form method="POST" action="v_akun.php">
			<input type="submit" name="add" value="Kembali">
		</form>
		</td>
	</tr>
</table>
    </body>
</html>