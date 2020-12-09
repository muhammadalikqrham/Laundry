<?php 
session_start();
include('config/koneksi.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/css/style.css">
 <script src="asset/js/jquery-3.5.1.min.js"></script>
</head>
<body>
<script>
    $(document).ready(function(){
      $(".paket-kiloan").hide();
      $(".check-kilo").on('click',function(){
        if($('.check-kilo').is(":checked")) 
        {  
            $(".paket-kiloan").fadeIn();
        }
        else
            $(".paket-kiloan").fadeOut(200);
      });
    });
   
  </script>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#1e3799">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="asset/image/logo_1.png" width="200">
      </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="kiri">
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav kiri">
                <li class="nav-item active">
                  <a class="nav-link" href="#"><label class="warna">Home</label><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php"><label class="warna">Login</label></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php"><label class="warna">Logout</label></a>
                </li>
              </ul>
            </div>
          </div>
    </div>  
  </nav>

<div class="container">
  <!-- header -->
  <section class="header">
    <div class="container-fluid enter-index">
      <div class="row">
        <div class="col">
          <div class="center">
            <h1 align="center">
              Laundry Center
            </h1>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, delectus! Officiis quis laudantium ratione ab facere! Maiores placeat corporis amet voluptas deleniti ab officia excepturi voluptatem possimus unde, enim in!
            </p>
          </div>
        </div>
        <div class="col">
            <img src="asset/image/clean.png" class="img-fluid" width="100%">
        </div>
      </div>
    </div>
  </section>
</div>  

  <!-- konten -->
  <section class="konten">
    <div class="container">
      <div class="row">
        <div class="col-7">
          <h3 class="warna">Form Cucian Masuk</h3>
            <div class="box">
              <form action="tambah_transaksi.php" method="post" class="masukan">
                <label><h4>Paket Cuci Kiloan</h4></label>
                <br>
                  <div class="form-group">
                  <?php
                        $sql = "SELECT * FROM paket WHERE satuan = 'kg'";
                        $query = mysqli_query($koneksi,$sql);
                    ?>
                        <select id="" name= "jeniscucian" class="form-control custom-select" >
                        <?php 
                        while($baris=mysqli_fetch_array($query))
                        {
                        ?>    
                            <option  value="<?= $baris[0]?>"><?= $baris[1]." - Rp. ".$baris[3]."/".$baris[2]?></option>
                        <?php 
                        }?>
                    </select>
                  </div>
                <label><h4>Paket Satuan</h4></label>
                <br>
                <?php $sql = "SELECT * FROM paket WHERE satuan = 'pcs'";
                        $query = mysqli_query($koneksi,$sql);
                        $nmr = 1;
                        $jml  = mysqli_num_rows($query);
                        while($baris=mysqli_fetch_array($query))
                        {
                        ?>
                        <script>
                        $(document).ready(function(){
                          
                          $('.allCheckbox').prop('checked',false)
                          $(".table").hide();
                          $('.qty<?=$nmr?>').prop('disabled',true);
                          $(".check-pcs<?=$nmr?>").on('click',function(){
                            if($('.check-pcs<?=$nmr?>').is(":checked")) 
                            {  
                              $('.qty<?= $nmr ?>').prop('disabled',false);
                                $(".paket-pcs<?=$nmr?>").fadeIn();  
                            }
                            else
                            {
                                $(".paket-pcs<?=$nmr?>").fadeOut(200);
                                $('.qty<?=$nmr?>').prop('disabled',true);
                            }
                          });
                        });
                      </script>
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="allCheckbox custom-control-input check-pcs<?=$nmr?>" id="customSwitch<?=$nmr?>" name="satuan[]" value="<?= $baris[0]?>">
                        <label class="custom-control-label" for="customSwitch<?=$nmr?>"><?= $baris[1]?></label>
                      </div>
                      <div>
                        <table class="table bg-light table-bordered paket-pcs<?=$nmr?>">
                      <tr>
                          <td width="60%"><?= "Rp. ".$baris[3] ?></td>
                          <td width="5%">
                            <button class="btn btn-success btn-sm tambah<?= $nmr ?>" type="button" > + </button>
                          </td>
                          <td width="10%">
                            <input type="text" name="qty[]" class="form-control qty<?= $nmr ?>" style="text-align: center;" readonly value="1">
                          </td>
                          <td width="5%">
                            <button class="btn btn-danger btn-sm kurang<?= $nmr ?>" type="button" > - </button>
                          </td>
                        </tr>
                        </table>
                      </div>
                      <script>
                         var i<?= $nmr ?> = 1;
                            $('.tambah<?= $nmr ?>').on('click',function(){
                              $('.qty<?= $nmr ?>').val(i<?= $nmr ?>=i<?= $nmr ?>+1)
                            });
                            $('.kurang<?= $nmr ?>').on('click',function(){
                              if ( $('.qty<?= $nmr ?>').val() != 1) {
                                $('.qty<?= $nmr ?>').val(i<?= $nmr ?>=i<?= $nmr ?>-1)
                              }
                              else
                              {
                                console.log(true);
                                $('.check-pcs<?=$nmr?>').prop('checked',false)
                                $(".paket-pcs<?=$nmr?>").fadeOut(200);
                              }
                              
                            });
                      </script>
                        <?php 
                         $nmr++;
                        }
                        ?>
                <label><b>Tanggal Barang Dijemput Kurir</b></label>
                <input type="date" name="tanggal" class="form-control" min="<?=date('Y-m-d')?>" max="<?=date('Y-m-d',strtotime('+5 days',strtotime(date('Y-m-d'))))?>">
                <br>
                <button type="submit" class="btn btn-success" name="order">Order</button>
              </form>
            </div>
        </div>
        <div class="col-5">
          <h3 class="warna">Tata Cara Order Laundry</h3>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer>
    <div class="container">
      <div class="row"> 
        <div class="col">
          <br><br>
          <img src="asset/image/logo.png" width="400">
        </div>
        <div class="col">
        <h3>Nama Kelompok</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Ayu Sari</li>
            <li class="list-group-item">Mohamad Yogi Fermansyah</li>
            <li class="list-group-item">Muhammad Al-ikqrham</li>
            <li class="list-group-item">Muhammad Ferlyanda</li>
          </ul>
        </div>
        <div class="col">
        <h3>Sistem Informasi Laundry</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, soluta provident. Ratione praesentium totam minima assumenda a aliquid eos mollitia at sit exercitationem, in tempore? Consequuntur minima tenetur non labore.
          </p>
        </div>
      </div>
    </div>
  
  <script>
     $(".qty").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
  </script>
  <?php
  error_reporting(0); 
  include('layout/kaki.php') ?>
  </body>
  </html>