<?php
include('dataBase/dbHelper.php');
$sql="SELECT * FROM links";
$result=mysqli_query($baglan,$sql);


?>

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-1 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="./dash.php" target="_blank">
            <img src="logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Stok Takip Sistemi</span>
        </a>
    </div>


    

    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <?php
        if(mysqli_num_rows($result)>0){
          while ($row=mysqli_fetch_assoc($result)) {
            echo "<li class='nav-item'><a class='nav-link text-white active bg-gradient-info' href='".$row["baglanti_link"]."'>";
            echo "<div class='text-white text-center me-2 d-flex align-items-center justify-content-center'>";
            echo "<i class='material-icons opacity-10'></i></div><span class='nav-link-text ms-1'>".$row["name"]."</span></a></li>";
          }
        }
        
        ?>
        </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form method="post">
                <button type="submit" name="cikis" class="btn bg-gradient-info mt-4 w-100">Çıkış Yap</button>
            </form>
        </div>
    </div>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg  ">

    <nav class="navbar navbar-main navbar-expand-lg px-0 me-4 shadow-none border-radius-xl bg-gradient-dark text-white mt-3 mb-4" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
           
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <!-- ms-md-auto pe-md-3 -->
                <div class="d-flex w-75 align-items-center">
                    <div class="input-group input-group-outline">
                        <label class="form-label  text-white">Ara...</label>
                        <input type="text" class="form-control text-white" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
                <div class="d-flex justify-content-end px-2 py-1">
                          <div>
                          <i class="fa-solid fa-user me-3 border-radius-lg"></i>
                            <!-- <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user3"> -->
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm text-white"> <?php echo $kAdi; ?></h6>
                          </div>
                        </div>
                <ul class="navbar-nav  justify-content-end">
                    
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg me-4">