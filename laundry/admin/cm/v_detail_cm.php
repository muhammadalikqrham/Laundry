<?php session_start();
error_reporting(0);
include('../../config/koneksi.php');?>
<?php include('../../layout/kepala.php');

?>
<?php 
$id = $_GET['id'];
    $sql = "SELECT cucian_masuk.kode_cm,cucian_masuk.status_order,cucian_masuk.status_pembayaran,cucian_masuk.status_order,konsumen.nama,konsumen.alamat,konsumen.no_telepon
            FROM konsumen
            INNER JOIN cucian_masuk ON konsumen.kode_konsumen =cucian_masuk.kode_konsumen
            WHERE cucian_masuk.kode_cm = '$id'";
    $hasil = mysqli_query($koneksi,$sql);
    $row = mysqli_fetch_array($hasil);
?>
<div class="pl-5 col-10">
	<div class="enter-admin">
        <h1 class="pt-5 mt-5">Detail Transaksi</h1>
        <hr>
        <div class="pt-3"></div>
        <form action="proses_transaksi.php" method="POST">
        <table width = "75%" class="table table-bordered ">
            <tr>
                <td class="btn-dark"><p>Kode Transaksi</p></td>
                <td class="btn-light"><p><?=$row['kode_cm'] ?></p></td>
                <input type="hidden" name="kode_cm" value="<?=$row['kode_cm'] ?>">
            </tr>
            <tr>
                <td class="btn-dark"><p>Nama Lengkap</p></td>
                <td class="btn-light"><p><?=$row['nama'] ?></p></td>
            </tr>
            <tr>
                <td class="btn-dark"><p>Alamat</p></td>
                <td class="btn-light"><p><?=$row['alamat'] ?></p></td>
            </tr>
            <tr>
                <td class="btn-dark"><p>Nomor Telepon</p></td>
                <td class="btn-light"><p><?=$row['no_telepon'] ?></p></td>
            </tr>
            <tr>
                <td class="btn-dark"><p>Tipe Pembayaran</p></td>
                <td class="btn-light">
                    <select name="tipe_pembayaran" id="" class="form-control">
                        <option  value="0">
                            Tunai(Cash)
                        </option>
                        <option value="1">
                            Non-Tunai(Debit)
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="btn-dark"><p>Status Pembayaran</p></td>
                <td class="btn-light">
                    <select name="status_pembayaran" id="" class="form-control" <?php if($row['status_pembayaran'] == '1') echo "disabled"?>>
                        <option <?php if($row['status_pembayaran'] == '0') echo "selected"?> value="0">
                            Belum Lunas
                        </option>
                        <option <?php if($row['status_pembayaran'] == '1') echo "selected"?> value="1">
                            Lunas
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="btn-dark"><p>Status Order</p></td>
                <td class="btn-light">
                <select name="status_order" id="" class="form-control">
                        <option  value="0" <?php if($row['status_order'] == '0') echo "selected" ?>>
                            Baru
                        </option>
                        <option  value="1" <?php if($row['status_order'] == '1') echo "selected"  ?>>
                            Proses
                        </option>
                        <option  value="2" <?php if($row['status_order'] == '2') echo "selected"  ?>>
                            Selesai
                        </option>
                        <option  value="3" <?php if($row['status_order'] == '3') echo "selected"  ?>>
                            Diambil
                        </option>
                        <option  value="4" <?php if($row['status_order'] == '4') echo "selected"  ?>>
                            Batal
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="btn-dark"><p>Tanggal Diambil</p></td>
                <td class="btn-light"><input type="date" name="tanggal_diambil" id="" class="form-control" value="<?= date('Y-m-d')?>"></td>
            </tr>
        </table>
        <!-- pemisah -->
        <?php 
            $sql1 = "SELECT cucian_masuk.tanggal_cm,paket.nama_jenis,transaksi.qty,paket.harga_jenis,transaksi.kode_cm,paket.satuan
            FROM paket 
            INNER JOIN transaksi ON paket.kode_jenis = transaksi.kode_jenis 
            INNER JOIN cucian_masuk ON transaksi.kode_cm = cucian_masuk.kode_cm
            WHERE transaksi.kode_cm = '$id'";
            $result = mysqli_query($koneksi,$sql1);
            $jml = mysqli_num_rows($result);
            $no=1;
            $totalBelanja = 0;
            
        ?>
        <table class='table table-bordered '>
			<thead>
				<tr>
					<th>No</th>
					<th>Tgl. Order</th>
					<th>Paket Laundry</th>
					<th width='20%'>Berat Cucian</th>
					<th width='20%'>Harga/Kg</th>
					<th width='20%'>Subtotal</th>
				</tr>
			</thead>
			
			<tbody>
				
                    <?php 
                    
                    while ($baris = mysqli_fetch_array($result)) 
                    {
                        
                    ?>
                    <tr>
					<td><?= $no ?></td>
					<td><?= $baris['tanggal_cm']; ?></td>
                    <td><?= $baris['nama_jenis']; ?></td>
                    <?php 
                    $kilo=0;
                    if($baris['satuan'] == "kg" && $baris['qty'] == 0 ) : 
                        $kilo = 1;
                        ?>
                    <td><input type="text" class="form-control berat-kilo" name="qty" value="<?= $baris['qty']; ?>"></td>
                        <script>
                            
                            $(".berat-kilo").on("keypress keyup blur", function(event) {
                                $(this).val($(this).val().replace(/[^\d].+/, ""));
                                if ((event.which < 48 || event.which > 57)) {
                                    event.preventDefault();
                                }
                                var a = <?= $baris['harga_jenis']; ?> ;
                                var b = $('.berat-kilo').val();
                                var total = a * b;
                                $('.total<?=$kilo?>').html(total);
                                $('.total-kilo').val(total);
                                // console.log('true');
                            });
                        </script>
                    <?php else : ?>
                        <td><?= $baris['qty']; ?></td>
                    <?php endif; ?>
                    <td><?= $baris['harga_jenis']; ?></td>
                    <td class="total<?=$kilo?>"><?php $total = $baris['harga_jenis']*$baris['qty'];
                            $totalBelanja = $totalBelanja + $total;
                            echo $total;
                        ?>
                        <input type="hidden" name="total" class="total-kilo" value="0">
                     </td>
                    <?php $no++;
                ?>    
                </tr>
                <?php } 
                ?>
				
			</tbody>
			
			<tbody>
				<tr>
					<td colspan='5' class='btn-primary'><center><strong>TOTAL PESANAN</strong></center></td>
                    <td><strong id='label_total_pesanan'><?php 
                    echo $totalBelanja;
                     ?></strong></td>
				</tr>
            </tbody>
            
        </table>
        
        <input type="submit" value="Update" name="update" class="btn btn-primary">
        <a href="v_cm.php" class="btn btn-danger">Kembali</a>
        <div class="pb-5"></div>
        </form>
        <?php include('../../layout/kaki.php') ?>    
</div>
