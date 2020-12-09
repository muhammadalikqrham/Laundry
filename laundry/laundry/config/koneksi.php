<?php
  $koneksi = mysqli_connect("localhost", "root", "", "laundry");
  if(!$koneksi)
  {
    echo 'Koneksi tidak berhasil';
  }
?>