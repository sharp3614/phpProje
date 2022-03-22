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

      <div class="card my-4">

        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">İşlem Geçmişi</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Id</th>
                  <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">İşlem ADi</th>
                  <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Yapılan İşlem</th>
                  <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tarih</th>
                </tr>
              </thead>
              <tbody>
                <?php
                      $sql="SELECT id, islem_adi, yapilan_islem, tarih FROM islem_log";
                    
                      $result=mysqli_query($baglan,$sql);
                      if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                                ?>
                                <tr class='border-bottom'>
                      
                      <td class='align-middle  text-sm ' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row['id'] ?></p>
                      </td>
                      <td class='align-middle  text-sm ' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row['islem_adi'] ?></p>
                      </td>
                      <td class='align-middle  text-sm ' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row['yapilan_islem'] ?></p>
                      </td>
                      <td class='align-middle  text-sm ' style='padding: 0.75rem 1.5rem;'>
                        <p><?php echo $row['tarih'] ?></p>
                      </td>
                      
                    </tr>
                    <?php
                  }
                }
               
                ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>