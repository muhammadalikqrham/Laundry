<?php session_start();
error_reporting(0); 
include('../../config/koneksi.php');?>
<?php include_once('../../layout/kepala.php');
?>
<div class="pl-5 col-10">
	<div class="enter-admin">
		<h1 class="pt-5 pb-5">Daftar User Kostumer</h1>
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
			<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Tambah Data Akun
			</button> -->
			<!-- Modal -->
				<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">    
								<form action="add_jenis.php" method="POST">
									<div class="form-group">
											<label>Nama</label>
											<input type="text" class="form-control" name="nama">
											<label>Harga Paket</label>
											<input type="text" class="form-control" name="harga">
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="simpan" value="Save">
								</form>
							</div>
						</div>
					</div>
				</div> -->

		<table class="table">
			<thead>
				<tr>
					<th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telpon</th>
                    <th scope="col">Email</th>
					<!-- <th scope="col">Aksi</th> -->
				</tr>
			</thead>
			<tbody>

<?php 
	$sql1 = "SELECT * FROM konsumen ";
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
    $sql="SELECT nama,alamat,no_telepon,email,kode_konsumen FROM konsumen and nama like '%$kata%'OR email  LIMIT $awalData,$jumlahDataPerHalaman";
    // echo $koneksi->error;
}
else
	$sql="SELECT nama,alamat,no_telepon,email,kode_konsumen FROM konsumen order by nama DESC LIMIT $awalData,$jumlahDataPerHalaman";

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
    ?>
    <!-- <td>
		<a class='btn btn-danger tombol-hapus' href='edit_akun.php?id=<?=$baris[4]?>'>Hapus</a>  
	</td> -->
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
			<li class="page-item disabled ">
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
<script>
	$(document).on("click","#tombolUbah",function(){
		let id = $(this).data('kode');
		let nama = $(this).data('nama');
		let no_telp = $(this).data('no_telp');
        let email = $(this).data('email');
        let alamat = $(this).data('alamat');
		$(".modal-body #kode_akun").html(id);
		$(".modal-body #nama_akun").val(nama);
		$(".modal-body #nomor_telpon").val(no_telp);
        $(".modal-body #kode_akun_hide").val(id);
        $(".modal-body #email").val(email);
        $(".modal-body #alamat").val(alamat);

        <?php $_SESSION['btn']= "edit";?>


	})

	$('.tombol-hapus').on('click',function(e){
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Anda yakin ingin menghapus data ini ?',
			text: "Data ini tidak akan dikembalikan lagi",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Hapus !'	
			}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.value) {
				document.location.href = href;
			} 
			})
			<?php $_SESSION['btn']= "hapus";?>
	})
</script>

<?php include_once('../../layout/kaki.php') ?>    
</div>
