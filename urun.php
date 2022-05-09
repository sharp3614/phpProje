<?php
include('dataBase/dbHelper.php');
include('components/header.php');
include('components\nav.php');
$_URL ="http://localhost/phpProje/urun.php";
$toplamKayit = mysqli_num_rows(mysqli_query($baglan, "SELECT * FROM urun WHERE kullanici_id = $kId"));
$sayfaSayisi = ceil($toplamKayit/$limit);
$sql="SELECT * FROM urun, kategori, birim, marka WHERE urun.birim_id=birim.birim_id AND urun.kategori_id=kategori.kategori_id AND urun.marka_id=marka.marka_id AND kullanici_id = $kId AND durum =1 ORDER BY urun_id ASC LIMIT $startlimit, $limit"; 
?>

<div class="col-12">
    <div class="card">
        <div class="card-header p-0 position-relative m-4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-primary border-radius-lg">
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
                          
                          $result = mysqli_query($baglan, $sql);
                          if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {?>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <?php echo $row["kategori_adi"] ?>
                                </a>
                            </li>
                            <?php }} ?>
                        </ul>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Ürün Ekle
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-0 pb-2 d-flex flex-wrap justify-content-center">
            <?php
                      $result=mysqli_query($baglan,$sql);
                      if (mysqli_num_rows($result)>0) {?>
            <div class="card p-0 border border-3" style="width: 90%;">
                <div class="row g-0">
                    <div class="card-body d-flex justify-content-around">
                        <h6 style="width:30rem;" class="text-center">Ürün Adı</h6>
                        <h6>Kategori</h6>
                        <h6>Alış <br> Fiyatı</h6>
                        <h6>Satış <br> Fiyatı</h6>
                        <h6>Miktarı</h6>
                        <h6>Diğer</h6>
                    </div>
                </div>
            </div>
            <?php while ($row=mysqli_fetch_assoc($result)) { ?>

<div class="my-1 p-3" style="width: 90%;">
    <div class="row g-0">
        <div id="icerik" class="card d-flex flex-row justify-content-around align-center border " style="height:10rem;">
            <div class="d-flex align-items-center" style="width:30rem;">
                <img src="img/<?php echo $row["resim"] ?>" style="width:8rem; height:9rem;" class="img-fluid rounded-start"
                    alt="<?php echo $row["urun_adi"] ?>">
                <p class="text-start ms-2"><?php echo $row["urun_adi"] ?></p>
            </div>
            <div class="d-flex align-items-center">
                <p><?php echo $row["kategori_adi"] ?>
                <p>
            </div>
            <div class="d-flex align-items-center">
                <p><?php echo $row["alis_fiyat"] ?></p>
            </div>
            <div class="d-flex align-items-center">
                <p><?php echo $row["satis_fiyat"] ?></p>
            </div>
            <div class="d-flex align-items-center">
                <p><?php echo $row["miktar"] . " " . $row["birim_adi"] ?></p>
            </div>
            <div class="d-flex align-items-center">
                <div class="d-flex flex-column mt-4">
                    <a href="urunDuzenle.php?urunDuzen=<?php echo $row['urun_id'] ?>" class='btn btn-dark px-3 me'
                        data-bs-target='#exampleModal'>
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a class="btn btn-danger px-3"
                        href="database/dbHelper.php?urunSil=<?php echo $row['urun_id'] ?>&urunAdi=<?php echo $row["urun_adi"]?>"><i
                            class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
    
?>
            <div class="mx-5 mt-4">
                <div class="float-end">
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination">
                            <?php
                                        if ($page>1) {
                                            $newpage = $page-1;
                                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php $_URL?>?page= <?php echo $newpage ?>">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php
                                        }
                                        else{
                                            
                                            ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="<?php $_URL?>?page= <?php echo $newpage ?>">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>




                            <?php
                                    } 
                                    if($sayfaSayisi>0){
                                        for ($i=1; $i <=$sayfaSayisi ; $i++) { 
                                        ?>
                            <li class="page-item"><a class="page-link"
                                    href="<?php $_URL ?>?page= <?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php
                                        }
                                    }
                                        if ($page != $sayfaSayisi && $sayfaSayisi>1) {
                                            $newpage = $page+1;
                                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php $_URL?>?page= <?php echo $newpage ?>">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php
                                        }
                                        else{
                                            
                                            ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="<?php $_URL?>?page= <?php echo $newpage ?>">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>
            </div>
            <?php } else { echo "<p class='text-center'>Mevcut ürününüz bulunmamaktadır...</p>";}?>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body">
                    <form role="form" method="POST" action="dataBase\dbHelper.php" class="text-start">
                        <div class="row p-4">
                            <div class="input-group input-group-outline my-3 ">
                                <label class="form-label text-dark">Ürün Adı</label>
                                <input type="text" name="urunAdi" class="form-control" autocomplete="off" required
                                    step="[0-9]">
                            </div>
                            <div class="input-group input-group-outline my-3 ">

                                <input type="file" name="resim" enctype="multipart/form-data">
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
                                <input type="number" name="urunAdedi" class="form-control" autocomplete="off" required
                                    step="[0-9]">
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
                                <input type="number" name="alisFiyat" class="form-control" autocomplete="off" required
                                    step="[0-9]">
                            </div>
                            <div class="input-group input-group-outline my-3 ">
                                <label class="form-label text-dark">Satış Fiyatı</label>
                                <input type="number" name="satisFiyat" class="form-control" autocomplete="off" required
                                    step="[0-9],?e">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>

                    <button name="urunKayit" type="submit" class="btn bg-gradient-success">Ekle</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 
    </div>
</div>
</div>
</div>
 -->

<?php include('components\footer.php'); ?>