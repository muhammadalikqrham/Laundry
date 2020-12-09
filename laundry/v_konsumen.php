<!DOCTYPE html>
<html>
<head>
	<title>Daftar User</title>
</head>
<body>
<h2 align="center">Daftar User</h2>
<table border="0" width="70%" align="center">
	<tr>
		<td>
		<form method="POST" action="add_konsumen.php">
			<input type="submit" name="add" value="TAMBAH">
		</form>
		</td>
	</tr>
</table>
<table border="1" width="70%" align="center">
	<caption>
		<form method="POST" action="v_konsumen.php">
			<input type="text" name="kata" size="30">
			<input type="submit" name="cari" value="Search!">
		</form><br>		
	</caption>
	<tr>
		<th width="5%">No</th>
		<th width="20%">Nama</th>
        <th width="25%">alamat</th>
        <th width="10%">Nomor Telepon</th>
        <th width="25%">Email</th>
		<th width="10%">Action</th>
	</tr>
<?php 
//error_reporting(0);
include 'config/koneksi.php';
//
if (isset($_POST['cari']))
{
	$kata=$_POST['kata'];
    $sql="SELECT nama,alamat,no_telepon,email 
          FROM konsumen 
          WHERE alamat like '%$kata%'OR 
                nama like '%$kata%' OR
                email LIKE '%$kata%' order by nama ASC";
    echo $koneksi->error;
}
else
	$sql="SELECT nama,alamat,no_telepon,email 
    FROM konsumen 
    order by nama ASC";

$query=mysqli_query($koneksi,$sql);
$no=1;

while($baris=mysqli_fetch_array($query))
{
	echo "<tr>";
	echo "<td align=center>".$no."</td>";
	echo "<td>".$baris[0]."</td>";
    echo "<td>".$baris[1]."</td>";
    echo "<td>".$baris[2]."</td>";
	echo "<td>".$baris[3]."</td>";
	echo "<td align=center><a href='edit_konsumen.php?id=$baris[0]'>Edit</a> |
						<a href='del_konsumen.php?id=$baris[0]'>Hapus</a>  
		</td>";
	$no++;
}
?>
</table>
<a href="index.php" style="padding-left: 80%;">Back to Home</a>
</body>
</html>


