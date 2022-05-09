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

                        <div class="col d-flex justify-content-between align-items-center">
                            <h5 class="text-white ms-4">Personeller</h5>
                        </div>

                        <div class="col d-flex justify-content-end align-items-center">
                            <div class="bd-highlight me-4">
                                <button type="button" class="btn btn-success m-0" data-bs-toggle='modal'
                                    data-bs-target='#exampleModal'>
                                    Personel Ekle
                                </button>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="card-body d-flex flex-wrap  p-2"
                    style="background-color:rgba(200,200,20,0.1);">


                    <?php
                          $sqldepo = "SELECT * FROM personel WHERE kullanici_id =".$_SESSION['idLogin'];
                          $result = mysqli_query($baglan, $sqldepo);
                          if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card  m-2" style="width: 20rem;">
                        <div class="mx-auto mt-4">
                            <div class="avatar avatar-xl position-relative">
                                <img src="img/user1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="pt-1 text-center h5">
                            <?php echo $row["ad"] . " " . $row["soyad"] ?>
                        </div>
                        <hr>
                        <div class="card-body">

                            <p class="card-text"><b>Adres: </b> <?php echo $row["adres"] ?></p>
                            <p class="card-text"><b>İletişim: </b><?php echo $row["telefon"] ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-secondary">Detay</a>
                            </div>
                        </div>
                    </div>
                    <?php } }
                    
                    else{
                        
                        echo "<p>Personel bulunmamaktadır...</p>";
                        
                    }?>
                </div>
            </div>
        </div>
    </div>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="dataBase\dbHelper.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Personel Ekleme</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                            <label for="telefon" class="col-form-label">Adı:</label>
                            <input type="text" name="personelAdi" class="form-control border border-dark p-2" id="ad" title="Başında sıfır olmadan 10 karakter olacak şekilde doldurunuz" />
                        </div>
                        <div class="mb-3">
                            <label for="telefon" class="col-form-label">Soyadı:</label>
                            <input type="text" name="personelSoyadi" class="form-control border border-dark p-2" id="soyad" title="Başında sıfır olmadan 10 karakter olacak şekilde doldurunuz" />
                        </div>
                        <div class="my-3">
                            <input type="file" name="personelImg" enctype="multipart/form-data">
                        </div>
                        <div class="mb-3">
                            <label for="telefon" class="col-form-label">Telefon:</label>
                            <input type="text" name="personelTelefon" class="form-control border border-dark p-2" id="telefon"
                                pattern="^\d{10}$"
                                title="Başında sıfır olmadan 10 karakter olacak şekilde doldurunuz" />
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Adres:</label>
                            <textarea type="text" name="personelAdres" class="form-control border border-dark p-2" id="recipient-name"
                                placeHolder="Hello"> </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="personelKayit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include('components\footer.php') ?>