<?php
session_start();
    include('../config/koneksi.php');
    if(isset($_POST['simpan']))
    {
        $harga = $_POST['harga'];
        $nama = $_POST['nama'];
        $loc = $_SESSION['loc'];
        $sql="INSERT INTO paket VALUES ('','$nama','$loc','$harga')";
        $hasil= mysqli_query($koneksi,$sql);
        
        if($hasil)
        {
            
            $href = "v_jenis_".$loc.".php";
            
            $_SESSION['konfir'] = "sukses";
            $_SESSION['status'] = "Berhasil Disimpan";
            ?>
            <script language='Javascript'>
                location.href = '<?= $href?>'
            </script>
            <?php
        }
            
        else
        {
            $_SESSION['konfir'] = "gagal";
            $_SESSION['status'] = "Gagal Disimpan !";
            ?>
            <script language='Javascript'>
                location.href = '<?= $href?>'
            </script>
            <?php
        }
           

    }
?>       
