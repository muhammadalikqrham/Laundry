<?php include('config/koneksi.php');
    session_start();
    // if($_SESSION['login_konsumen'] == false)
    // {
    //     echo "<script language='Javascript'>
    //     (window.alert('Anda Belum Login'))
    //      location.href = 'login_konsumen.php'
    //     </script>";
        
    // }
    // else
    // {
        if(isset($_POST['simpan']))
        {
            $kode_konsumen = $_SESSION['kode_konsumen'];
            $tanggal = $_POST['tanggal_masuk'];
            $waktu = $_POST['waktu_masuk'];
            $satuan[] = $_POST['satuan'];
            $kiloan = $_POST['jeniscucian'];
            $sql = "INSERT INTO cucian_masuk VALUES('',
                                                    '$kode_konsumen',
                                                    '$tanggal',
                                                    '$waktu')";
            $hasil = mysqli_query($koneksi,$sql);
            $sqlcm = "SELECT kode_cm FROM cucian_masuk WHERE kode_konsumen = '$kode_konsumen' AND tanggal_cm = '$tanggal' AND waktu_pengambilan = '$waktu' ";
            $res = mysqli_query($koneksi,$sqlcm);
            $row = mysqli_fetch_array($res);
            $kode_cm = $row['kode_cm'];
            $sql1 = "INSERT INTO detail_cucian_masuk VALUES('',
                                                    '$kode_cm',
                                                    '$kiloan',
                                                    '')";
            $hasil1 = mysqli_query($koneksi,$sql1);
            
            foreach ($_POST['satuan'] as $value) {
            $sql2 = "INSERT INTO detail_cucian_masuk VALUES('',
                                                    '$kode_cm',
                                                    '$value',
                                                    '1')";
            $hasil2 = mysqli_query($koneksi,$sql2);
            echo $value." ";
            $status = "done";
            }
            if($status == 'done')
            {
                echo "<script language='Javascript'>
                (window.alert('Anda Berhasil Disimpan'))
                location.href = 'add_cucian_masuk.php'
                </script>";
            }
            else
            {
                echo "<script language='Javascript'>
                (window.alert('Anda gagal Disimpan'))
                location.href = 'add_cucian_masuk.php'
                </script>";
            }
            
            
        }
        
    // }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form action="add_cucian_masuk.php" method="post">
            <table width = "35%" align="center" border="0">
                <tr>
                    <td width="20%">Pilih Jenis Paket</td>
                    <td width="5%">:</td>
                    <td width="75%"><input type="checkbox" onchange="kiloan()">Kiloan
                                    <input type="checkbox"  onchange="satuan()">satuan
                    </td>
                </tr>
                <tr style="visibility: hidden;" id="kiloan">
                    <?php
                        $sql = "SELECT * FROM paket WHERE satuan = 'kg'";
                        $query = mysqli_query($koneksi,$sql);
                    ?>
                    <td width="20%">Paket Kiloan</td>
                    <td width="5%">:</td>
                    <td width="75%">
                        <select id="" name= "jeniscucian" >
                        <?php 
                        while($baris=mysqli_fetch_array($query))
                        {
                        ?>    
                            <option  value="<?= $baris[0]?>"><?= $baris[1]." - Rp. ".$baris[3]."/".$baris[2]?></option>
                        <?php 
                        }?>
                    </select></td>
                </tr>
                <tr style="visibility: hidden;" id="satuan">
                    <?php
                        $sql = "SELECT * FROM paket WHERE satuan = 'pcs'";
                        $query = mysqli_query($koneksi,$sql);
                    ?>
                    <td width="20%">Paket Satuan</td>
                    <td width="5%">:</td>
                    <td width="75%">
                        <?php 
                        while($baris=mysqli_fetch_array($query))
                        {
                        ?>    
                            <input type="checkbox" name="satuan[]" value="<?= $baris[0]?>"><?= $baris[1]." - Rp. ".$baris[3]."/".$baris[2]?></input><br>
                        <?php 
                        }?>
                    </td>
                </tr>
                <tr>
                    <td width="20%">Tanggal Pengambilan</td>
                    <td width="5%">:</td>
                    <td width="75%"><input type="date" name="tanggal_masuk" min="<?=date('Y-m-d')?>" max="<?=date('Y-m-d',strtotime('+2 days',strtotime(date('Y-m-d'))))?>"></td>
                </tr>
                    <td width="20%">Waktu Pengambilan</td>
                    <td width="5%">:</td>
                    <td width="75%"><input type="time" name="waktu_masuk" min="10:00:00" max="21:00:00"></td>
                </tr>
                </tr>
                    <td width="20%">&nbsp;</td>
                    <td width="5%">&nbsp;</td>
                    <td width="75%"><input type="submit" value="Simpan" name="simpan"></td>
                </tr>
                
            </table>
            <script>
                var y="";
                var x="";
                function kiloan() {
                if(y == ""||y=="off")
                {
                    y="on";
                    document.getElementById("kiloan").style.visibility = "visible";
                    console.log(y);
                }
                else if(y=="on")
                {
                    
                    y="off";
                    document.getElementById("kiloan").style.visibility = "hidden";
                    console.log(y);
                }
                
                }
                function satuan() {
                if(x == ""||x=="off")
                {
                    x="on";
                    document.getElementById("satuan").style.visibility = "visible";
                }
                else if(x=="on")
                {
                    
                    x="off";
                    document.getElementById("satuan").style.visibility = "hidden";
                }
                
                }
            </script>
        </form>
    </body>
</html>