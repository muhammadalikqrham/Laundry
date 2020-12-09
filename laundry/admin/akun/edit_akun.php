<?php
session_start();
    include('../../config/koneksi.php');
    $stats = false;
    if($_SESSION['btn'] == "edit")
    {
        if(isset($_POST['ubah']))
        {
            $id= $_POST['kode_akun'];
            $nama_akun = $_POST['nama'];
            $nomor_telepon = $_POST['nomor_telepon'];
            $email = $_POST['email'];
            $sql="UPDATE akun SET nama = '$nama_akun',
                                no_telp = '$nomor_telepon',
                                email = '$email'
                                WHERE kode_akun ='$id'";
            $hasil= mysqli_query($koneksi,$sql);
            $stats = true;
        }
    }
    else if($_SESSION['btn'] == "hapus")
    {
        $id= $_GET['id'];
        $sql="UPDATE akun SET status = '0'
                            WHERE kode_akun ='$id'";
        $hasil= mysqli_query($koneksi,$sql);
        $stats = true;
        echo $koneksi->error;  
    }
    var_dump($stats);
    if($stats)
    {      
        $_SESSION['konfir'] = "sukses";
        $_SESSION['status'] = "Berhasil Diubah";
        ?>
            <script language='Javascript'>
            location.href = 'view_akun.php'
        </script> -->
    <?php
    }
    else
    {
        $_SESSION['konfir'] = "gagal";
        $_SESSION['status'] = "Gagal Diubah !";
        ?>
        <script language='Javascript'>
            location.href = 'view_akun.php'
            </script>
            <?php
        }
        //  
?>       
