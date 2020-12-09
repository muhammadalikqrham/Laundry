<?php
session_start();
    include('../config/koneksi.php');
    if(isset($_POST['ubah']))
    {
        $id= $_POST['kode_jenis'];
        $harga = $_POST['harga'];
        $nama = $_POST['nama'];
        $loc = $_SESSION['loc'];
        $sql="UPDATE  paket SET nama_jenis = '$nama',
                                satuan = '$loc',
                                harga_jenis = '$harga'
                            WHERE kode_jenis ='$id'";
        $hasil= mysqli_query($koneksi,$sql);
        if($hasil)
        {
            
            $href = "v_jenis_".$loc.".php";
            
            $_SESSION['konfir'] = "sukses";
            $_SESSION['status'] = "Berhasil Diubah";
            ?>
            <script language='Javascript'>
                location.href = '<?= $href?>'
            </script>
            <?php
        }
            
        else
        {
            $_SESSION['konfir'] = "gagal";
            $_SESSION['status'] = "Gagal Diubah !";
            ?>
            <script language='Javascript'>
                location.href = '<?= $href?>'
            </script>
            <?php
        }
           

    }
?>       
