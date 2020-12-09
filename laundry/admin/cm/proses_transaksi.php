<?php
session_start();
    include('../../config/koneksi.php');
    $stats = false;
        if(isset($_POST['update']))
        {
            $id= $_POST['kode_cm'];
            $qty = $_POST['qty'];
            $total = $_POST['total'];
            $tipe_bayar = $_POST['tipe_pembayaran'];
            $stat_pembayaran = $_POST['status_pembayaran'];
            $status_order = $_POST['status_order'];
            $tgl = $_POST['tanggal_diambil'];
            $sql="UPDATE cucian_masuk,transaksi 
                  SET cucian_masuk.tipe_pembayaran = '$tipe_bayar',
                  cucian_masuk.status_pembayaran = '$stat_pembayaran',
                  cucian_masuk.status_order = '$status_order',
                  transaksi.tanggal_ambil = '$tgl',
                  transaksi.qty = '$qty',
                  transaksi.total ='$total'
                                WHERE cucian_masuk.kode_cm ='$id' AND transaksi.kode_cm ='$id' ";
            $hasil= mysqli_query($koneksi,$sql);
            echo $koneksi->error;
        
    if($hasil)
    {      
        $_SESSION['konfir'] = "sukses";
        $_SESSION['status'] = "Transaksi Berhasil";
        ?>
            <script language='Javascript'>
            location.href = 'v_cm.php'
        </script> -->
    <?php
    }
    else
    {
        $_SESSION['konfir'] = "gagal";
        $_SESSION['status'] = "Transaksi gagal dilakukan";
        ?>
        <script language='Javascript'>
            location.href = 'v_cm.php'
            </script>
            <?php
        }
    }
?>       