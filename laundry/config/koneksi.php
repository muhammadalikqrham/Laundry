<?php
  $koneksi = mysqli_connect("localhost", "root", "", "laundry");
  if(!$koneksi)
  {
    echo 'Koneksi tidak berhasil';
  }

  function url_base($url){
    echo 'http://localhost/laundry/'.$url.'';
  }
?>