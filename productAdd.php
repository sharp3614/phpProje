<?php
include('dataBase/dbHelper.php');
include('components\header.php');
include('components\nav.php');

?>



  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3">Ürün Ekle</h6>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive p-0 ">
          <div class="card-body">
            <form role="form" method="POST" action="dataBase\dbHelper.php" class="text-start">
              <div class="row">
                <div class="col-md-6">
                <div class="input-group input-group-outline my-3 ">
                    <label class="form-label text-dark">Ürün Adı</label>
                    <input type="text" name="urunAdi" class="form-control" autocomplete="off" required step="[0-9]">
                  </div>
                  <div class="input-group input-group-outline my-3 ">
                    <select class="form-control  text-dark" name="kategori">
                      <option selected disable>Lütfen ürünün kategorisini Seçiniz.</option>
                      <?php 
                            $sql="Select * FROM kategori ORDER BY kategori_adi ASC";
                            $result=mysqli_query($baglan,$sql);
                            if (mysqli_num_rows($result)>0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$row["kategori_id"]."'>".$row["kategori_adi"]."</option>";
                                }
                            }
                            ?>
                    </select>
                  </div>
                  <div class="input-group input-group-outline my-3 ">
                    <select class="form-control" name="marka">
                      <option selected>Lütfen ürünün markasını seçiniz.</option>
                      <?php 
                            $sql="Select * FROM marka ORDER BY marka_adi ASC";
                            $result=mysqli_query($baglan,$sql);
                            if (mysqli_num_rows($result)>0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$row["marka_id"]."'>".$row["marka_adi"]."</option>";
                                }
                            }
                            ?>
                    </select>
                  </div>
                  <div class="input-group input-group-outline my-3 ">
                    <label class="form-label  text-dark">Ürün Adedi</label>
                    <input type="number" name="urunAdedi" class="form-control" autocomplete="off" required step="[0-9]">
                  </div>
                  <div class="input-group input-group-outline my-3 ">
                    <select class="form-control" name="birim">
                      <option selected disable>Lütfen ürünün birimini seçiniz.</option>
                      <?php 
                            $sql="Select * FROM birim ORDER BY birim_adi ASC";
                            $result=mysqli_query($baglan,$sql);
                            if (mysqli_num_rows($result)>0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$row["birim_id"]."' class='text-uppercase'>".$row["birim_adi"]."</option>";
                                }
                            }
                            ?>
                    </select>
                  </div>


                </div>

                <div class="col-md-6">
                 

                


                  <div class="input-group input-group-outline my-3 ">
                    <label class="form-label text-dark">Alış Fiyatı</label>
                    <input type="number" name="alisFiyat" class="form-control" autocomplete="off" required step="[0-9]">
                  </div>
                  <div class="input-group input-group-outline my-3 ">
                    <label class="form-label text-dark">Satış Fiyatı</label>
                    <input type="number" name="satisFiyat" class="form-control" autocomplete="off" required step="[0-9],?e">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="text-center w-md-25 mx-auto">
                  <button name="urunKayit" type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Ekle</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>       
  </div>
  
  </div>
  <?php include('components\footer.php');


  
  
  
?>
  
