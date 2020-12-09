<?php include('../config/koneksi.php');?>
<?php include_once('../layout/kepala.php') ?>

<div class="col-10">
  <div class="enter-admin">
    <h1>Daftar Transaksi</h1>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Tambah Transaksi
      </button>
        <!-- Modal tambah-->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">    
								<form action="add_jenis.php" method="POST">
									<div class="form-group">
											<label>Kode Cucian Masuk</label>
											<input type="text" class="form-control" name="kode_cm">
                  </div>
                  <div class="form-group">
											<label>Total</label>
											<input type="text" class="form-control" name="total">
                  </div>
                  <div class="form-group">
											<label>Status Pembayaran</label>
											<input type="text" class="form-control" name="status_pembayaran">
                  </div>
                  <div class="form-group">
											<label>Tanggal Transaksi</label>
											<input type="date" class="form-control" name="tgl_transaksi">
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
								</form>
							</div>
						</div>
          </div>
				</div>  



  <!-- Modal Update -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Update Transaksi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">    
								<form action="add_jenis.php" method="POST">
									<div class="form-group">
											<label>Kode Cucian Masuk</label>
											<input type="text" class="form-control" name="kode_cm">
                  </div>
                  <div class="form-group">
											<label>Total</label>
											<input type="text" class="form-control" name="total">
                  </div>
                  <div class="form-group">
											<label>Status Pembayaran</label>
											<input type="text" class="form-control" name="status_pembayaran">
                  </div>
                  <div class="form-group">
											<label>Tanggal Transaksi</label>
											<input type="date" class="form-control" name="tgl_transaksi">
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="ubah" value="Update">
								</form>
							</div>
						</div>
					</div>
        </div>
        
        <table class="table">
	        <thead>
				    <tr>
					    <th scope="col">No.</th>
					    <th scope="col">Kode Cucian Masuk</th>
					    <th scope="col">Total</th>
					    <th scope="col">Status Pembayaran</th>
					    <th scope="col">Tanggal Transaksi</th>
					    <th scope="col">Aksi</th>
				    </tr>
			    </thead>
			    <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a class='btn btn-warning' type="button" data-target="#exampleModal" data-toggle="modal" href='edit_cm.php?id=$baris[0]'>Edit</a> |
              <a class='btn btn-danger' href='del_cm.php?id=$baris[0]'>Hapus</a>  
              </td>
            </tr>
          </tbody>
        </table>  
  </div>
</div>


<?php include_once('../layout/kaki.php') ?>   