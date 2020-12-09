<?php include('../config/koneksi.php');?>
<?php include_once('../layout/kepala.php') ?>

	<div class="col-10">
		<div class="enter-admin">
			<h1>Daftar Akun</h1>
			<form action="POST" action="v_jenis.php">
				<div class="row">
					<div class="col">
						<input class="form-control" type="text" name="kata">
					</div>	
					<div class="col">
						<input type="submit" name="cari" value="Cari">
					</div>	
				</div>
			</form>
			<br>
			<a href="index.php">Back to Home</a>
		</div>

	<table class="table">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Username</th>
					<th scope="col">Nama</th>
					<th scope="col">Nomor Telepon</th>
					<th scope="col">Email</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>

<?php 
//error_reporting(0);
//
if (isset($_POST['cari']))
{
	$kata=$_POST['kata'];
    $sql="SELECT nama,no_telp,email FROM akun WHERE username like '%$kata%'OR nama like '%$kata%' order by username DESC";
    echo $koneksi->error;
}
else
	$sql="SELECT nama,no_telp,email FROM akun order by nama DESC";

$query=mysqli_query($koneksi,$sql);
$no=1;
echo $koneksi->error;
while($baris=mysqli_fetch_array($query))
{
	echo "<tr>";
	echo "<td>".$no."</td>";
	echo "<td>".$baris[0]."</td>";
  echo "<td>".$baris[1]."</td>";
  echo "<td>".$baris[2]."</td>";
	echo "<td>".$baris[3]."</td>";
	echo "<td><a class='btn btn-warning' href='edit_akun.php?id=$baris[0]'>Edit</a> |
						<a class='btn btn-danger' href='del_akun.php?id=$baris[0]'>Hapus</a>  
		</td>";
	$no++;
}
?>
</tbody>
</table>
</div>
</div>
<?php include_once('../layout/kaki.php') ?>   



