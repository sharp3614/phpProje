<?php
include('dataBase/dbHelper.php');
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
}
include('components\nav.php');
include('components\header.php');
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg me-5">
    <div class="col-12">

        <div class="card mb-4">

            <div class="card-header p-0 position-relative m-4 mx-3 z-index-2">
                <div class="d- bg-gradient-dark shadow-primary border-radius-lg">
                    <div class="row p-3">

                        <div class="col-2 d-flex justify-content-between align-items-center">
                            <h5 class="text-white ms-4">Depolar</h5>
                        </div>

                        <div class="col d-flex justify-content-center align-items-center">

                            <div class="input-group input-group-outline">
                                <label class="form-label text-white">Ara</label>
                                <input type="text" name="ara" class="form-control text-white" data-search>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="card-body d-flex flex-wrap px-0 pb-2 justify-content-center" style="background-color:rgba(200,200,20,0.1);">


                    <?php
                    for ($i=0; $i < 100; $i++) { 
                        ?>
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-header text-center h5">
                            Lorem, ipsum.
                        </div>

                        <div class="card-body">
                            <p class="card-text"><b>Adres:</b> Lorem ipsum dolor sit amet.</p>
                            <p class="card-text"><b>İletişim:</b>0505 555 55 55</p>
                            
                        </div>
                        <div class="card-footer">
                        <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-secondary">Detay</a>
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php include('components\footer.php') ?>