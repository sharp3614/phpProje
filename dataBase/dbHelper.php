<?php

$serverName="localhost";
$userName="root";
$password="123456789";
$veriTabani="stok_takip";

$baglan=new mysqli($serverName,$userName,$password,$veriTabani);

if ($baglan->connect_error){
    die("Bağlantı başarısız.".$baglan->connect_error);
} 


session_start();







// Kullanıcı işlemleri
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
  $kullaniciAdi=$_POST['kAdi'];
  $sifre=$_POST['sifre']; 
  $sql="SELECT * from kullanicilar where userName='$kullaniciAdi' AND sifre='$sifre'";
  $result=mysqli_query($baglan,$sql);
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result)) {
    $_SESSION["login"]="true";
    $_SESSION["user"]=$kullaniciAdi;
    $_SESSION["idLogin"]= $row["id"];
    header("location:dash.php");
  }
  else {
    
    header("location:index.php");
    echo '
    <script>
  swal({
  title: "Şifre Hatalı!",
  text: "Lütfen kullanıcı adınızı veya şifrenizi kontrol ediniz.",
  icon: "error",
  button: "Tamam",
});
</script>';
  }
}

if(isset($_POST['cikis'])){
  session_destroy();
  header("location:index.php");
}





$kId = $_SESSION["idLogin"];

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
  
  if($_FILES["resim"]["size"]<1024*1024)
  {
    if($_FILES["resim"]["type"]=="image/jpeg")
    {
      $dosyaAd=$_FILES["resim"]["name"];
      $uret=array("as","rt","ty","yu","fg");
      $uzanti=substr($dosyaAd,-4,4);
      $sayi_tut=rand(1,10000);
      $yeni_ad="img/".$uret[rand(0,4)].$sayi_tut.$uzanti;
      if(move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
          echo 'Dosya başarıyla yüklendi.';
        }
      }
  }



  $sql="INSERT INTO urun(urun_adi, kategori_id, marka_id, miktar, birim_id, alis_fiyat, satis_fiyat, kullanici_id) VALUES ('$urunAdi', $urunKategori, $urunMarka, $urunMiktar, $urunBirim, $alisFiyat, $satisFiyat, $kId)";
  $sql2="INSERT INTO islem_log(islem_adi, yapilan_islem, kullanici_id) VALUES ('$urunAdi','Ürün ekleme', $kId)";
 

 if (mysqli_query($baglan, $sql)) {
     if ( mysqli_query($baglan, $sql2)) {
      header("location:../urun.php");
     }
     else {
      echo "Error: " . $sql2 . "<br>" . mysqli_error($baglan);
    }
    } 
    else {
      echo "Error: " . $sql . "<br>" . mysqli_error($baglan);
    }
}
//Urun Duzenle
if(isset($_POST['urunDuzen'])){
  $urunAdi = $_POST["urunAdi"];
  $urunKategori = $_POST["kategori"];
  $urunMarka = $_POST["marka"];
  $urunMiktar = $_POST["urunAdedi"];
  $urunBirim = $_POST["birim"];
  $alisFiyat = $_POST["alisFiyat"];
  $satisFiyat = $_POST["satisFiyat"];
  $sql="UPDATE urun SET urun_adi = $urunAdi, kategori_id = $urunKategori, marka_id = $urunMarka, miktar = $urunMiktar, birim_id = $urunBirim, alis_fiyat = $alisFiyat, satis_fiyat = $satisFiyat, kullanici_id = $kId)";
  $sql2="INSERT INTO islem_log(islem_adi, yapilan_islem, kullanici_id) VALUES ('$urunAdi','Ürün güncelleme', $kId)";
  
  if (mysqli_query($baglan, $sql)) {
     if ( mysqli_query($baglan, $sql2)) {
      header("location:../urun.php");
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
  $sql2="INSERT INTO islem_log(islem_adi, yapilan_islem, kullanici_id) VALUES ('$urunAdi','Ürün Silme', $kId)";


 if (mysqli_query($baglan,$sql)) {
  if ( mysqli_query($baglan, $sql2)) {
    header("location:../urun.php");
   }
   else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($baglan);
   }
   
 }
 else {
  echo "Error: " . $sql . "<br>" . mysqli_error($baglan);
}
}


// ürün sayısı
$urunSayisi = mysqli_num_rows(mysqli_query($baglan,"SELECT * From urun WHERE kullanici_id=".$_SESSION["idLogin"]));

//stoğu azalan ürün sayısı
$minMiktar = 40;
$stokAzalan = mysqli_num_rows(mysqli_query($baglan, "SELECT * FROM urun WHERE miktar<$minMiktar AND kullanici_id = $kId"));

//Depo Sayısı
$depoSayisi = mysqli_num_rows(mysqli_query($baglan,"Select * From depobilgileri WHERE kullanici_id=".$_SESSION["idLogin"]));

$kAdi = $_SESSION["user"];

//islem sayisi

//$islemSayisi = mysqli_num_rows(mysqli_query($baglan, "SELECT * FROM islem_log WHERE kullanici_id = $kId AND tarih = "));



$page = empty( strip_tags($_GET["page"])) ? 1 :strip_tags($_GET["page"]);
$limit = 5;
$startlimit = ($page*$limit)-$limit;






// personel işlemleri

//Personel Ekle
if(isset($_POST['personelKayit'])){
  $ad = $_POST["personelAdi"];
  $soyad = $_POST["personelSoyadi"];
  $telefon = $_POST["personelTelefon"];
  $adres = $_POST["personelAdres"];
  $img = "user1.jpg";
  //$_POST["personelImg"]




  $sqlpersonel="INSERT INTO personel(ad, soyad, adres, telefon, resim, kullanici_id) VALUES ('$ad', '$soyad', '$adres', '$telefon', '$img', $kId)";
  $sqlpersonel2="INSERT INTO islem_log(islem_adi, yapilan_islem, kullanici_id) VALUES ('$ad $soyad','Personel ekleme', $kId)";
 

 if (mysqli_query($baglan, $sqlpersonel)) {
     if ( mysqli_query($baglan, $sqlpersonel2)) {
      header("location:../calisanlar.php");
     }
     else {
      echo "Error: " . $sqlpersonel2 . "<br>" . mysqli_error($baglan);
    }
    } 
    else {
      echo "Error: " . $sqlpersonel . "<br>" . mysqli_error($baglan);
    }
}
?>