<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
}
include('dataBase/dbHelper.php');


include('components\nav.php');

?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Stok Takip | Ana Sayfa
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Toplam Ürün Sayısı</p>
                <h4 class="mb-0">Sayi</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            
            <div class="card-footer mb-0 d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="urun.php" class="btn my-0 btn-primary">Ürünleri Listele</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">table</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Stoğu Azalan Ürün Sayısı</p>
                <h4 class="mb-0">2,300</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer mb-0 d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="urun.php" class="btn my-0 btn-primary">Ürünleri Listele</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">New Clients</p>
                <h4 class="mb-0">3,462</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer mb-0 d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="urun.php" class="btn my-0 btn-primary">Ürünleri Listele</a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Sales</p>
                <h4 class="mb-0">$103,430</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer mb-0 d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-outline-primary btn-sm mb-0">Ürünleri Listele</button>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            
            
            
          </div>
        </div>
      </div>

      <?php include('components\footer.php');?>
   