<?php
include('dataBase/dbHelper.php');
session_start();
if (!isset($_SESSION["login"])) {
  header("location:index.php");
}
$toplamKayit = mysqli_num_rows(mysqli_query($baglan, "SELECT * FROM islem_log WHERE kullanici_id = $kId"));
$sayfaSayisi = ceil($toplamKayit/$limit); 
include('components\nav.php');
include('components\header.php');
?>

    <div class="col-12">

        <div class="card mb-4">

            <div class="card-header p-0 position-relative m-4 mx-3 z-index-2">
                <div class="bg-gradient-dark shadow-primary border-radius-lg">
                    <div class="row p-3">
                        <div class="col d-flex justify-content-between align-items-center">
                            <h5 class="text-white ms-4">İşlem Geçmişi</h5>
                        </div>
                        
                        <div class="col d-flex justify-content-end align-items-center">
                            <div class="dropdown me-4">
                                <button type="button" class="btn btn-secondary m-0" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Filtrele
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="#">Tümü</a></li>
                                    <li><a class="dropdown-item" href="#">Ürün Ekleme</a></li>
                                    <li><a class="dropdown-item" href="#">Ürün Silme</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card-body px-0 pb-2">

                    <?php
                        $sql="SELECT id, islem_adi, yapilan_islem, tarih FROM islem_log WHERE kullanici_id= $kId LIMIT $startlimit, $limit";
                        $result=mysqli_query($baglan,$sql);
                        if (mysqli_num_rows($result)>0) {
                    ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        İşlem ADi</th>
                                    <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Yapılan İşlem</th>
                                    <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row=mysqli_fetch_assoc($result)) {
                                ?>
                                <tr class='border-bottom'>
                                    <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;'>
                                        <p><?php echo $row['islem_adi'] ?></p>
                                    </td>
                                    <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;' data-header>
                                        <p><?php echo $row['yapilan_islem'] ?></p>
                                    </td>
                                    <td class='align-middle text-sm' style='padding: 0.75rem 1.5rem;'>
                                        <p><?php echo $row['tarih'] ?></p>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                        
                                else{
                                    echo "<p class='text-center'>İşlem geçmişiniz bulunmamaktadır...</p>";
                                }?>
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
                                            <a class="page-link" href="?page= <?php echo $newpage ?>">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <?php
                                        }
                                        else{
                                            
                                            ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" href="<?php ?>?page= <?php echo $newpage ?>">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <?php include('components\footer.php') ?>