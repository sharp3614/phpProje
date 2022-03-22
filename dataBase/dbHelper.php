<?php
$serverName="localhost";
$userName="root";
$password="123456789";
$veriTabani="stok_takip";

$baglan=new mysqli($serverName,$userName,$password,$veriTabani);

if ($baglan->connect_error){
    die("Bağlantı başarısız.".$baglan->connect_error);
} 





if(isset($_POST['kullaniciKayit'])){
  $kullaniciAdi=$_POST['kAdi'];
  $sifre=$_POST['sifre'];
  $sql = "INSERT INTO kullanicilar(userName, sifre) VALUES ('$kullaniciAdi','$sifre')";
 if (mysqli_query($baglan,$sql)) {
   header("location:../index.php");
 }
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($baglan);
}
}

if(isset($_POST['kullaniciGiris'])){
  session_start();
  $kullaniciAdi=$_POST['kAdi'];
  $sifre=$_POST['sifre'];
  $sql="SELECT * from kullanicilar where userName='$kullaniciAdi' and sifre='$sifre'";
  $result=mysqli_query($baglan,$sql);
  if (mysqli_num_rows($result)) {
    $_SESSION["login"]="true";
    $_SESSION["user"]=$kullaniciAdi;
    $_SESSION["pass"]=$sifre;
    header("location:dash.php");

  }
}

if(isset($_POST['cikis'])){
  session_unset();
  if (!isset($_SESSION["login"])) {
  header("location:index.php");
}
}

/* Urun Islemleri */




//Urun Ekle
if(isset($_POST['urunKayit'])){
  $urunAdi = $_POST["urunAdi"];
  $urunKategori = $_POST["kategori"];
  $urunMarka = $_POST["marka"];
  $urunMiktar = $_POST["urunAdedi"];
  $urunBirim = $_POST["birim"];
  $alisFiyat = $_POST["alisFiyat"];
  $satisFiyat = $_POST["satisFiyat"];
  $sql="INSERT INTO urun(urun_adi, kategori_id, marka_id, miktar, birim_id, alis_fiyat, satis_fiyat) VALUES ('$urunAdi', $urunKategori, $urunMarka, $urunMiktar, $urunBirim, $alisFiyat, $satisFiyat)";
  $sql2="INSERT INTO islem_log(islem_adi, yapilan_islem) VALUES ('$urunAdi','Ürün ekleme')";
  
  if (mysqli_query($baglan, $sql)) {
     if ( mysqli_query($baglan, $sql2)) {
      header("location:../productAdd.php");
     }
     else {
      echo "Error: " . $sql2 . "<br>" . mysqli_error($baglan);
    }
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($baglan);
    }
}

//Urun Sil
if(isset($_GET['urunSil'])){
  $id=$_GET['urunSil'];
  $urunAdi=$_GET['urunAdi'];
  
  $sql = "DELETE FROM urun WHERE urun_id=$id";
  $sql2="INSERT INTO islem_log(islem_adi, yapilan_islem) VALUES ('$urunAdi','Ürün Silme')";


 if (mysqli_query($baglan,$sql)) {
  if ( mysqli_query($baglan, $sql2)) {
    header("location:../urun.php");
   }
   
 }
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($baglan);
}
}




?>