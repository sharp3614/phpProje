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
                            <h5 class="text-white ms-4">Depolar</h5>
                        </div>

                        <div class="col d-flex justify-content-end align-items-center">
                            <div class="bd-highlight me-4">
                                <button type="button" class="btn btn-success m-0" data-bs-toggle='modal'
                                    data-bs-target='#exampleModal'>
                                    Depo Ekle
                                </button>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="card-body d-flex flex-wrap px-0 pb-2 justify-content-center"
                    style="background-color:rgba(200,200,20,0.1);">


                    <?php
                          $sqldepo = "SELECT * FROM depobilgileri WHERE kullanici_id =".$_SESSION['idLogin'];
                          $result = mysqli_query($baglan, $sqldepo);
                          if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-header text-center h5">
                            Lorem, ipsum.
                        </div>

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
                        
                        echo "<p>Depo bulunmamaktadır...</p>";
                        
                    }?>
                </div>
            </div>
        </div>
    </div>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Depo Ekleme</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Telefon:</label>
              <input class="form-control border border-dark p-2" id="message-text"></input>
            </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Adres:</label>
            <textarea type="text" class="form-control border border-dark p-2" id="recipient-name" placeHolder="Hello"> </textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-primary">Kaydet</button>
      </div>
    </div>
  </div>
</div>

    <?php include('components\footer.php') ?>