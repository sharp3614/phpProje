<?php
include('dataBase/dbHelper.php');
include('components/header.php');
include('components/nav.php');


?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg me-5">
        <div class="col-12">
        
          <div class="card my-4">
            
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Stok Listesi</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                      
                      
                    <tr>
                      <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Id</th>
                      <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">ÜRÜN ADI</th>
                      <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Ürünün Markası</th>
                      <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kategorisi</th>
                      <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Alış Fiyatı</th>
                      <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Satış Fiyatı</th>
                      <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Miktar</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $sql="SELECT urun_id, birim_adi, urun_adi, kategori_adi, marka_adi, alis_fiyat, satis_fiyat, miktar, tedarik_id, resim FROM urun, kategori, birim, marka WHERE urun.birim_id=birim.birim_id AND urun.kategori_id=kategori.kategori_id AND urun.marka_id=marka.marka_id And miktar>10 ORDER BY urun_id ASC ";
                    
                      $result=mysqli_query($baglan,$sql);
                      if (mysqli_num_rows($result)>0) {
                            while ($row=mysqli_fetch_assoc($result)) {
                                echo "
                                <tr class='border-bottom'>
                      
                      <td class='align-middle  text-sm' style='padding: 0.75rem 1.5rem;'>
                      <p>".$row["urun_id"]."</p>
                      </td>
                      <td class='align-middle  text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p>".$row["urun_adi"]."</p>
                      </td>
                      <td class='align-middle  text-sm' style='padding: 0.75rem 1.5rem;'>
                      <p>".$row["marka_adi"]."</p>
                      </td>
                      <td class='align-middle  text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p>".$row["kategori_adi"]."</p>
                      </td>
                      <td class='align-middle  text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p>".$row["alis_fiyat"]."</p>
                      </td>
                      <td class='align-middle  text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p>".$row["satis_fiyat"]."</p>
                      </td>
                      <td class='align-middle text-uppercase  text-sm' style='padding: 0.75rem 1.5rem;'>
                        <p>".$row["miktar"]." ".$row["birim_adi"]."</p>
                      </td>
                      
                      <td class='align-middle' style='padding: 0.75rem 1.5rem;'>
                        <a href='javascript:;' class='text-secondary font-weight-bold text-xs toast-btn' data-toggle='tooltip' data-original-title='Edit user'data-target='successToast'>
                          Edit
                        </a>
                      </td>
                    </tr>
                                ";
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

    <?php
    
include('components/footer.php');
?>