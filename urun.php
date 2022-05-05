<?php
include('dataBase/dbHelper.php');
include('components/header.php');
include('components\nav.php');

?>


<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg me-5">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative m-4 mx-3 z-index-2">
                <div class="d- bg-gradient-dark shadow-primary border-radius-lg">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h6 class="text-white text-capitalize ps-3">Ürünler Tablosu</h6>
                        </div>
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-secondary dropstart" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Filtrele
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <?php
                          $sql = "SELECT * FROM kategori";
                          $result = mysqli_query($baglan, $sql);
                          if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <?php echo $row["kategori_adi"] ?>
                                    </a>
                                </li>
                                <?php }} ?>
                            </ul>
                            <button type="button" class="btn btn-success" data-bs-toggle='modal'
                                data-bs-target='#exampleModal'>
                                Ürün Ekle
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
               
                        <?php
                      $sql="SELECT * FROM urun, kategori, birim, marka WHERE urun.birim_id=birim.birim_id AND urun.kategori_id=kategori.kategori_id AND urun.marka_id=marka.marka_id AND kullanici_id =". $_SESSION['idLogin'] ." ORDER BY urun_id ASC";
                      //ORDER BY urun_id ASC
                      $result=mysqli_query($baglan,$sql);
                      if (mysqli_num_rows($result)>0) {
                          ?>
                           <table style="width:100%">
                    <thead>
                        <tr class="">
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                style='padding: 0.75rem 1.5rem;'>Id</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-start"
                                style='padding: 0.75rem 1.5rem;'>ÜRÜN ADI</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                style='padding: 0.75rem 1.5rem;'>Ürünün Markası</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                style='padding: 0.75rem 1.5rem;'>Kategorisi</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center"
                                style='padding: 0.75rem 1.5rem;'>Alış Fiyatı</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center"
                                style='padding: 0.75rem 1.5rem;'>Satış Fiyatı</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center"
                                style='padding: 0.75rem 1.5rem;'>Miktar</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                            while ($row=mysqli_fetch_assoc($result)) {
                                ?>
                        <tr class='border-bottom border-dark'>
                            <td class='text-sm' style='padding: 0.75rem 1.5rem;'>
                                <p>
                                    <?php echo $row['urun_id'] ?>
                                </p>
                            </td>
                            <td class='text-sm text-middle' style='padding: 0.75rem 1.5rem;'>
                                <?php echo $row["urun_adi"]?>
                            </td>
                            <td class='text-sm' style='padding: 0.75rem 1.5rem;'>
                                <p>
                                    <?php echo $row["marka_adi"] ?>
                                </p>
                            </td>
                            <td class='text-sm' style='padding: 0.75rem 1.5rem;'>
                                <p>
                                    <?php echo $row["kategori_adi"] ?>
                                </p>
                            </td>
                            <td class='text-sm text-center' style='padding: 0.75rem 1.5rem;'>
                                <p>
                                    <?php echo $row["alis_fiyat"] ?>
                                </p>
                            </td>
                            <td class='text-sm text-center' style='padding: 0.75rem 1.5rem;'>
                                <p>
                                    <?php echo $row["satis_fiyat"] ?>
                                </p>
                            </td>
                            <td class='text-uppercase  text-sm' style='padding: 0.75rem 1.5rem;'>
                                <p class="text-center">
                                    <?php echo $row["miktar"]."<br> ".$row["birim_adi"] ?>
                                </p>
                            </td>
                            <td class='align-middle d-flex' style='padding: 0.75rem 1.5rem;'>
                                <button type='button' class='btn btn-dark px-3 me-1' data-bs-toggle='modal'
                                    data-bs-target='#exampleModal'><i class="fa-solid fa-pen"></i></button>
                                <a class="btn btn-danger px-3"
                                    href="database/dbHelper.php?urunSil=<?php echo $row['urun_id'] ?>& urunAdi=<?php echo $row['urun_adi'] ?>"><i
                                        class="fa-solid fa-trash"></i></i></a>
                            </td>
                        </tr>
                        <?php
                  }
                }
                else {
                    echo "<p class='text-center'>Ürün bulunmamaktadır...</p>";
                }
                ?>
                        <tr class="text-end me-5">
                            <td colspan="8" class="p-2">
                                <p>Toplam Kayıt: <?php echo mysqli_num_rows($result) ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>





            </div>
            <!-- Modal Pop-up -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ürünü Ekle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form role="form" method="POST" action="dataBase\dbHelper.php" class="text-start">
                            <div class="row p-4">
                                <div class="input-group input-group-outline my-3 ">
                                    <label class="form-label text-dark">Ürün Adı</label>
                                    <input type="text" name="urunAdi" class="form-control" autocomplete="off" required
                                        step="[0-9]">
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
                                    <input type="number" name="urunAdedi" class="form-control" autocomplete="off"
                                        required step="[0-9]">
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
                                    <input type="number" name="alisFiyat" class="form-control" autocomplete="off"
                                        required step="[0-9]">
                                </div>
                                <div class="input-group input-group-outline my-3 ">
                                    <label class="form-label text-dark">Satış Fiyatı</label>
                                    <input type="number" name="satisFiyat" class="form-control" autocomplete="off"
                                        required step="[0-9],?e">
                                </div>
                                <div class="mx-auto w-25">
                                    <button name="urunKayit" type="submit"
                                        class="btn bg-gradient-success w-100 my-4 mb-2">Ekle</button>
                                </div>
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