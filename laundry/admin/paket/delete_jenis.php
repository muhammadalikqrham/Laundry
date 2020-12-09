<?php
session_start();
    include('../config/koneksi.php');
        $id = $_GET['id'];
        $sql="DELETE FROM paket WHERE kode_jenis = '$id' ";
        $hasil= mysqli_query($koneksi,$sql);
        $loc = $_SESSION['loc'];
        if($hasil)
        {
            
            $href = "v_jenis_".$loc.".php";
            
            $_SESSION['konfir'] = "sukses";
            $_SESSION['status'] = "Berhasil DiHapus";
            ?>
            <script language='Javascript'>
                location.href = '<?= $href?>'
            </script>
            <?php
        }
            
        else
        {
            $_SESSION['konfir'] = "gagal";
            $_SESSION['status'] = "Gagal Dihapus !";
            ?>
            <script language='Javascript'>
                location.href = '<?= $href?>'
            </script>
            <?php
        }
?>       
