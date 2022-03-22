<?php
include('dataBase/dbHelper.php');
include('components/header.php');
include('components\nav.php');
?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg me-5">
    <div class="col-12">

      <div class="card my-4">

        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Ürünler Tablosu</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
            <table class="table-responsive">
              <thead>
                <tr class=" text-center">
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Id</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ÜRÜN ADI</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ürünün Markası</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategorisi</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Alış Fiyatı</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Satış Fiyatı</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Miktar</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                      $sql="SELECT urun_id, birim_adi, urun_adi, kategori_adi, marka_adi, alis_fiyat, satis_fiyat, miktar, tedarik_id, resim FROM urun, kategori, birim, marka WHERE urun.birim_id=birim.birim_id AND urun.kategori_id=kategori.kategori_id AND urun.marka_id=marka.marka_id ORDER BY urun_id ASC ";
                    
                      $result=mysqli_query($baglan,$sql);
                      if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                                ?>
                                <tr class='border-bottom'>
                      
                      <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row['urun_id'] ?></p>
                      </td>
                      <td class='align-middle text-sm ' style='padding: 0.75rem 1.5rem;'>
                      <?php echo $row["urun_adi"]?>
                      </td>
                      <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row["marka_adi"] ?></p>
                      </td>
                      <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row["kategori_adi"] ?></p>
                      </td>
                      <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row["alis_fiyat"] ?></p>
                      </td>
                      <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row["satis_fiyat"] ?></p>
                      </td>
                      <td class='align-middle text-uppercase  text-sm' style='padding: 0.75rem 1.5rem;'>
                      
                        <p><?php echo $row["miktar"]." ".$row["birim_adi"] ?></p>
                      </td>
                      
                      <td class='align-middle' style='padding: 0.75rem 1.5rem;'>
                      <button type='button' class='btn btn-dark px-3 w-100' data-bs-toggle='modal' data-bs-target='#exampleModal'>Düzenle</button>
                      <a class="btn btn-danger px-3 w-100" href="database/dbHelper.php?urunSil=<?php echo $row['urun_id'] ?>& urunAdi=<?php echo $row['urun_adi'] ?>" >Sil</a>
                      </td>
                    </tr>
                    <?php
                  }
                }
               
                ?>


              </tbody>
            </table>
        </div>
        <!-- Modal Pop-up -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ürünü Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form role="form" method="post" action="" class="text-start">
                <div class="modal-body">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label text-dark">Ürün Adı</label>
                    <input type="text" name="kAdi" class="form-control" autocomplete="off" required>
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
                  <div class="input-group input-group-outline my-3 ">
                    <label class="form-label text-dark">Alış Fiyatı</label>
                    <input type="number" name="alisFiyat" class="form-control" autocomplete="off" required step="[0-9]">
                  </div>
                  <div class="input-group input-group-outline my-3 ">
                    <label class="form-label text-dark">Satış Fiyatı</label>
                    <input type="number" name="satisFiyat" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" name="kayit" class="btn btn-success">Kaydet</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

    <?php include('components\footer.php'); ?>