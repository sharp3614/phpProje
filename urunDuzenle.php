<?php
include('dataBase/dbHelper.php');
include('components/header.php');
include('components\nav.php');

$_URL ="http://localhost/phpProje/urun.php";

$urunId = $_GET["urunDuzen"];

$sql="SELECT * FROM urun, kategori, birim, marka WHERE urun.birim_id=birim.birim_id AND urun.kategori_id=kategori.kategori_id AND urun.marka_id=marka.marka_id AND kullanici_id = $kId AND durum =1 AND urun_id=$urunId"; 
?>

<div class="col-12">
    <form action="" method="post">
        <div class="card p-4" style="min-height:70vh;">
            <?php
            $result=mysqli_query($baglan,$sql);
            if (mysqli_num_rows($result)>0) {
        $row=mysqli_fetch_assoc($result) ?>

            <div class="row">
                <img src="img/<?php echo $row["resim"] ?>" style="width:8rem; height:9rem;"
                    class="img-fluid rounded-start" alt="<?php echo $row["urun_adi"] ?>">
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="my-3">
                        <label class="form-label  text-dark">Ürün Adı</label>
                        <input type="text" name="urunAdedi" class="form-control border border-dark p-2"
                            value="<?php echo $row["urun_adi"]?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-6">
                    <div class="my-3">
                        <label class="form-label text-dark">Kategorisi</label>
                        <select class="form-control border border-dark p-2 text-dark" name="kategori" required>
                            <option value="">Lütfen ürünün kategorisini Seçiniz.</option>
                            <?php 
                            $sqlkategori="Select * FROM kategori ORDER BY kategori_adi ASC";
                            $resultkategori=mysqli_query($baglan,$sqlkategori);
                            if (mysqli_num_rows($resultkategori)>0) {
                                while ($rowkategori = mysqli_fetch_assoc($resultkategori)) {
                                    echo "<option value='".$rowkategori["kategori_id"]."'>".$rowkategori["kategori_adi"]."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="my-3">
                        <label class="form-label  text-dark">Ürün Adedi</label>
                        <input type="number" name="urunAdedi" class="form-control border border-dark p-2"
                            value="<?php echo $row["miktar"]?>" autocomplete="off" required step="[0-9]">
                    </div>
                </div>
                <div class="col-6">
                    <div class="my-3">  
                        <label class="form-label  text-dark">Birim</label>
                        <select class="form-control border border-dark p-2 text-dark" name="birim" required>
                        <option value="">Lütfen ürünün kategorisini Seçiniz.</option>
                            <?php 
                            $sqlbirim="Select * FROM birim ORDER BY birim_adi ASC";
                            $resultbirim=mysqli_query($baglan,$sqlbirim);
                            if (mysqli_num_rows($resultbirim)>0) {
                                while ($rowbirim = mysqli_fetch_assoc($resultbirim)) {
                                    echo "<option value='".$rowbirim["birim_id"]."' class='text-uppercase'>".$rowbirim["birim_adi"]."</option>";
                                }
                            }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="my- 3">
                        <label class="form-label  text-dark">Alış Fiyatı</label>
                        <input type="number" name="urunAdedi" class="form-control border border-dark p-2"
                            value="<?php echo $row["alis_fiyat"]?>" autocomplete="off" required step="[0-9]">
                    </div>
                </div>
                <div class="col-6">
                    <div class="my- 3">
                        <label class="form-label  text-dark">Satış Fiyatı</label>
                        <input type="number" name="urunAdedi" class="form-control border border-dark p-2"
                            value="<?php echo $row["satis_fiyat"]?>" autocomplete="off" required step="[0-9]">
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="d-flex justify-content-end">
                    <a href="urun.php" class="btn bg-gradient-success me-3">Geri Dön</a>
                    <button name="urunGuncelle" type="submit" class="btn bg-gradient-success">Kaydet</button>
                </div>
            </div>

            <?php }?>
        </div>
    </form>
</div>


<?php include('components\footer.php'); ?>