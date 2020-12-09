<?php include('config/koneksi.php');
    session_start();
    if(isset($_SESSION['kode_konsumen']))
    {
        if(isset($_POST['order']))
        {
            $jenis = $_POST['jeniscucian'];
            $qty = $_POST['qty'];
            $kode_konsumen = $_SESSION['kode_konsumen'];
            $tgl = date('Y-m-d');
            $time = date('H:i:s');
            $sql = "INSERT INTO cucian_masuk VALUES('',
                                                    '$kode_konsumen',
                                                    '$tgl',
                                                    '0',
                                                    '0',
                                                    '0',
                                                    '$time')";
            $res = mysqli_query($koneksi,$sql);
            $sqlcm = "SELECT kode_cm FROM cucian_masuk WHERE kode_konsumen = '$kode_konsumen' AND tanggal_cm = '$tgl' AND time = '$time' ";
            $rescm = mysqli_query($koneksi,$sqlcm);
            $row = mysqli_fetch_array($rescm);
            $kode_cm = $row['kode_cm'];
            $sql2 = "INSERT INTO transaksi VALUES('',
                                                  '$kode_cm',
                                                  '$jenis',
                                                  '0',
                                                  '0',
                                                  '0000-00-00',
                                                  '0000-00-00')";
            $hasil= mysqli_query($koneksi,$sql2);
           $i=0;
           foreach ($_POST['satuan'] as $value) {
            $qtyStr = $qty[$i];
            $sqlharga = "SELECT harga_jenis FROM paket WHERE kode_jenis = '$value' ";
            $resharga = mysqli_query($koneksi,$sqlharga);
            $row = mysqli_fetch_array($resharga);
            $harga = $row['harga_jenis'];
            $total = ($harga * $qtyStr);
            echo $total;
                $sql3 = "INSERT INTO transaksi VALUES('',
                                                      '$kode_cm',
                                                      '$value',
                                                      '$qtyStr',
                                                      '$total',
                                                      '0000-00-00',
                                                      '0000-00-00')";
                $hasil2 = mysqli_query($koneksi,$sql3);
               $i++;
               $status = "done";
               
        }
        if($status== "done")
                {   
                    $_SESSION['konfir'] = "sukses";
                    $_SESSION['status'] = "Orderan Sudah Diterima";
                    ?>
                    <script language='Javascript'>
                        location.href = 'index.php'
                    </script>
                    <?php
                }
                else
                {
                    $_SESSION['konfir'] = "gagal";
                    $_SESSION['status'] = "Order gagal dibuat";
                    ?>
                    <script language='Javascript'>
                        location.href = 'index.php'
                    </script>
                    <?php
                }
    }
}
?>