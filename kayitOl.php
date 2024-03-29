<?php include('dataBase/dbHelper.php');
include('deneme.php');
?>
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Material Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css" rel="stylesheet" />
</head>

<body class="bg-secondary">
  
  <main class="main-content mt-0">
    <div class="page-header align-items-start min-vh-100" >
      <span class=" bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom border border-3 border-primary">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Stok Yönetim Paneline <br> Giriş Yap</h4>
                </div>
              </div>
              <div class="card-body">
                <form role="form" action="dataBase\dbHelper.php" method="post" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Kullanıcı Adı</label>
                    <input type="text" name="kAdi" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Şifre</label>
                    <input type="password" id="password1" oninput="setPasswordConfirmValidity();" name="sifre" class="form-control" autocomplete="off" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Şifre Tekrar</label>
                    <input type="password" id="password2" oninput="setPasswordConfirmValidity();" name="sifre" class="form-control" autocomplete="off" required>
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" name="kullaniciKayit" class="btn bg-gradient-primary w-100 my-4 mb-2">Kayıt Ol</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    
                    <a href="index.php" class="text-primary text-gradient font-weight-bold">Giriş Yap</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © 
                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                Nurhak Keskin
                
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    function setPasswordConfirmValidity(str) {
        const password1 = document.getElementById('password1');
        const password2 = document.getElementById('password2');

        if (password1.value === password2.value) {
             password2.setCustomValidity('');
        } else {
            password2.setCustomValidity('Lütfen şifrelerin aynı olmasına dikkat ediniz.');
        }
        console.log('password2 customError ', document.getElementById('password2').validity.customError);
        console.log('password2 validationMessage ', document.getElementById('password2').validationMessage);
    }
</script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js"></script>
</body>

</html>



