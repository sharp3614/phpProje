<?php
include('dataBase/dbHelper.php');
include('components/header.php');
include('components\nav.php');
$_URL ="http://localhost/phpProje/stokAzalan.php";
$toplamKayit = mysqli_num_rows(mysqli_query($baglan, "SELECT * FROM urun WHERE miktar<$minMiktar AND kullanici_id = $kId"));
$sayfaSayisi = ceil($toplamKayit/$limit); 
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg me-5">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative m-4 mx-3 z-index-2">
                <div class="d- bg-gradient-dark shadow-primary border-radius-lg">


                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h6 class="text-white text-capitalize ps-3">Stoğu azalan ürünler</h6>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
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
                                style='padding: 0.75rem 1.5rem;'>Kalan Miktar</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                      $sql="SELECT * FROM urun, kategori, birim, marka WHERE urun.birim_id=birim.birim_id AND urun.kategori_id=kategori.kategori_id AND urun.marka_id=marka.marka_id AND kullanici_id = $kId AND miktar<$minMiktar ORDER BY urun_id ASC LIMIT $startlimit,$limit";
                      //ORDER BY urun_id ASC
                      $result=mysqli_query($baglan,$sql);
                      if (mysqli_num_rows($result)>0) {
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

                            <td class='text-uppercase  text-sm' style='padding: 0.75rem 1.5rem;'>
                                <p class="text-center">
                                    <?php echo $row["miktar"]."<br> ".$row["birim_adi"] ?>
                                </p>
                            </td>
                            <td class='align-middle d-flex' style='padding: 0.75rem 1.5rem;'>
                                <button type='button' class='btn btn-dark px-3 me-1' data-bs-toggle='modal'
                                    data-bs-target='#exampleModal'><i class="fa-solid fa-pen"></i></button>

                            </td>
                        </tr>
                        <?php
                  }
                }
                ?>
                    </tbody>

                </table>
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
                                        if ($page != $sayfaSayisi) {
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
                            <?php
                            
                            ?>
                            <div class="row p-4">
                                <div class="">
                                    <label class="form-label text-dark">Ürün Adı</label>
                                    <input type="text" name="urunAdi" class="form-control px-2"
                                        value="<?php echo "ürün adi" ?>" readonly>
                                </div>
                                <hr class="horizontal bg-dark mb-3">
                                <div class="">
                                    <label class="form-label text-dark">Kategorisi</label>
                                    <input type="text" name="urunAdi" class="form-control px-2"
                                        value="<?php echo "Kategorisi" ?>" readonly>
                                </div>
                                <hr class="horizontal bg-dark mb-2">
                                <div class="">
                                    <label class="form-label text-dark">Ürün Adı</label>
                                    <input type="text" name="urunAdi" class="form-control px-2"
                                        value="<?php echo "ürün adi" ?>" readonly>
                                </div>
                                <div class="">
                                    <label class="form-label text-dark">Ürün Adı</label>
                                    <input type="text" name="urunAdi" class="form-control px-2"
                                        value="<?php echo "ürün adi" ?>" readonly>
                                </div>
                                <div class="">
                                    <label class="form-label text-dark">Ürün Adı</label>
                                    <input type="text" name="urunAdi" class="form-control px-2"
                                        value="<?php echo "ürün adi" ?>" readonly>
                                </div>


                            </div>

                            
                            <div class="mx-auto w-25">
                                <button name="urunKayit" type="submit"
                                    class="btn bg-gradient-success w-100 my-4 mb-2">Ekle</button>
                            </div>
                    </div>
                </div>
                <?php ?>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>

    <?php include('components\footer.php'); ?>