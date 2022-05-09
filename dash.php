<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
}
include('dataBase/dbHelper.php');


include('components\header.php');
include('components\nav.php');

?>


<div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Toplam ürün sayısı -->
    

    <div class="col-md-3 col-12 mb-3">
        <div class="card">
            <div class="row p-3">
                <div class="col-2">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                    <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class=" ms-4">
                        <h6 class="">Toplam ürün sayısı</h6>
                        <h6 class="text-center"><?php echo $urunSayisi ?></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pb-2 pe-4">
                    <a class="btn btn-info mb-0 float-end" href="urun.php">İncele</a>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Stoğu azalan urun sayisi -->

    <div class="col-md-3 col-12 mb-3">
        <div class="card">
            <div class="row p-3">
                <div class="col-2">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fa-solid fa-arrow-trend-down"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class=" ms-4">
                        <h6 class="">Stoğu azalan ürün sayısı</h6>
                        <h6 class="text-center"><?php echo $stokAzalan ?></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pb-2 pe-4">
                    <a class="btn btn-info mb-0 float-end" href="urun.php">İncele</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Toplam depo sayisi -->

    <div class="col-md-3 col-12 mb-3">
        <div class="card">
            <div class="row p-3">
                <div class="col-2">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fa-solid fa-warehouse"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class=" ms-4">
                        <h6 class="">Toplam depo sayısı</h6>
                        <h6 class="text-center"><?php echo $depoSayisi ?></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pb-2 pe-4">
                    <a class="btn btn-info mb-0 float-end" href="urun.php">İncele</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Belli değil -->


    <div class="col-md-3 col-12 mb-3">
        <div class="card">
            <div class="row p-3">
                <div class="col-2">
                    <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fa-solid fa-tag"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class=" ms-4">
                        <h6 class="">Toplam depo sayısı</h6>
                        <h6 class="text-center"><?php echo $depoSayisi ?></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pb-2 pe-4">
                    <a class="btn btn-info mb-0 float-end" href="urun.php">İncele</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('components\footer.php');?>