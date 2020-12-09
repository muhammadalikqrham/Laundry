<?php session_start(); 
include('../../config/koneksi.php');?>
<?php include('../../layout/kepala.php');

?>

<div class="pl-5 col-10">
	<div class="enter-admin">
		<h1 class="pt-5 pb-5">Daftar Cucian Masuk</h1>
			<form action="POST" action="v_jenis.php">
				<div class="row">
					<div class="col">
						<input class="form-control" type="text" name="kata">
					</div>	
					<div class="col">
						<input type="submit" clas name="cari" value="Cari">
					</div>	
				</div>
			</form>	
			<br>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Nama Kustomer</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Status bayar</th>
                    <th scope="col">Status order</th>
                    <th scope="col">total</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>

<?php 
	$sql1 = "SELECT cucian_masuk.tanggal_cm, cucian_masuk.status_pembayaran, konsumen.nama, paket.nama_jenis, cucian_masuk.status_order,transaksi.total
    FROM konsumen
    INNER JOIN cucian_masuk ON konsumen.kode_konsumen =cucian_masuk.kode_konsumen
    INNER JOIN transaksi ON cucian_masuk.kode_cm = transaksi.kode_cm
    INNER JOIN paket ON transaksi.kode_jenis = paket.kode_jenis
		 ORDER BY cucian_masuk.tanggal_cm";
	$hasil = mysqli_query($koneksi,$sql1);
	$jumlahDataPerHalaman = 5;
	$jumlahData = mysqli_num_rows($hasil);
	$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
	$halamanAktif = ( isset($_GET['page']) ) ? $_GET['page'] : 1;
	$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
//error_reporting(0);
//
if (isset($_POST['cari']))
{
	$kata=$_POST['kata'];
    $sql="SELECT kode_jenis,nama_jenis,harga_jenis FROM paket WHERE satuan = 'kg' and nama like '%$kata%'OR harga  LIMIT $awalData,$jumlahDataPerHalaman";
    // echo $koneksi->error;
}
else
	$sql="SELECT DISTINCT cucian_masuk.kode_cm,cucian_masuk.tanggal_cm, cucian_masuk.status_pembayaran, konsumen.nama, paket.nama_jenis, cucian_masuk.status_order,transaksi.total,cucian_masuk.kode_cm
    FROM konsumen
    INNER JOIN cucian_masuk ON konsumen.kode_konsumen =cucian_masuk.kode_konsumen
    INNER JOIN transaksi ON cucian_masuk.kode_cm = transaksi.kode_cm
    INNER JOIN paket ON transaksi.kode_jenis = paket.kode_jenis
		 GROUP BY cucian_masuk.kode_cm 
		 ORDER BY cucian_masuk.tanggal_cm  DESC LIMIT $awalData,$jumlahDataPerHalaman" ;

$query=mysqli_query($koneksi,$sql);
$no=1;
while($baris=mysqli_fetch_array($query))
{
    if ($baris['status_pembayaran'] == 0) {
        $status_pembayaran = "Belum Lunas";
    }
    else if ($baris['status_pembayaran'] == 1) {
        $status_pembayaran = "Lunas";
    }
    if ($baris['status_order'] == 0) {
        $status_order = "Baru";
    }
    else if ($baris['status_order'] == 1) {
        $status_order = "Proses";
    }
    else if ($baris['status_order'] == 2) {
        $status_order = "Selesai";
    }
    else if ($baris['status_order'] == 3) {
        $status_order = "Diambil";
    }
    else if ($baris['status_order'] == 4) {
        $status_order = "Batal";
	}
	$kode_cm = $baris['kode_cm'];
	$sqltotal = "SELECT SUM(total) as total FROM transaksi WHERE kode_cm = '$kode_cm'";
                    $hasilTotal = mysqli_query($koneksi,$sqltotal);
                    $total = mysqli_fetch_array($hasilTotal);
	?>
	
	<tr>
	<td><?=$no?></td>
	<td><?=$baris['tanggal_cm']?></td>
    <td><?=$baris['nama']?></td>
    <td><?=$baris['nama_jenis']?></td>
	<td><div class="btn btn-danger status-bayar" id="bayar<?= $no ?>"><?=$status_pembayaran?></div></td>
	<script>
		var a = $('#bayar<?= $no ?>').html();
     if( a == "Lunas")
    {
          $("#bayar<?= $no ?>").removeClass("btn btn-danger");
          $("#bayar<?= $no ?>").addClass("btn btn-success");
	}
	console.log(a);
</script>
    <td><div class="btn btn-info"><?=$status_order?></td></div>
    <td><?=$total['total']?></td>
    <td>
		<a class='btn btn-warning tombol-detail' href='v_detail_cm.php?id=<?=$baris['kode_cm']?>'>Detail</a>  
	</td>
	
		<?php
	$no++;
	
}
?>	

</tbody>

</table>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
		<?php  if($halamanAktif > 1) : ?>
			<li class="page-item ">
	  		<a class="page-link" href="?page=<?=$halamanAktif - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
		  <?php else : ?>
			<li class="page-item disabled">
			<a class="page-link" href="" tabindex="-1" aria-disabled="true">Previous</a>
		<?php endif;?>
	</li>
	<?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>
		<?php if($i == $halamanAktif) : ?> 
			<li class="page-item active" aria-current="page">
      			<a class="page-link" href="?page=<?=$i?>"><?= $i ?></a>
    		</li>
		<?php else : ?>
			<li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?= $i;?></a></li>
		<?php endif;?>
	<?php endfor;?>
	<?php  if($halamanAktif < $jumlahHalaman ) : ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?=$halamanAktif + 1 ?>">Next</a>
	</li>
	<?php else : ?>
    		<li class="page-item disabled">
      			<a class="page-link" href="#">Next</a>
			</li>
	<?php endif; ?>
  </ul>
</nav>
</div>
</div>
<?php include('../../layout/kaki.php') ?>    
</div>
