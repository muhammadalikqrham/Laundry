<?php include('../config/koneksi.php');?>
<?php include_once('../layout/kepala.php') ?>

<div class="col-10">
  <div class="enter-admin">
    <h1>Daftar Cucian Masuk</h1>
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
				Update Cucian Masuk
      </button>
      		<!-- Modal Update-->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Update Cucian Masuk</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">    
								<form action="add_jenis.php" method="POST">
									<div class="form-group">
											<label>Quantity</label>
											<input type="text" class="form-control" name="qty">
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
					    <th scope="col">Kode Konsumen</th>
					    <th scope="col">Tanggal Masuk</th>
					    <th scope="col">Jenis Cucian</th>
					    <th scope="col">QTY</th>
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