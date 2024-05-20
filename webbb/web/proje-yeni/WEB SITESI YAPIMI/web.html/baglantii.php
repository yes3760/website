<?php
$vt_sunucu = "localhost"; // Veritabanı sunucusu
$vt_kullanici = "root"; // Veritabanı kullanıcı adı
$vt_sifre = ""; // Veritabanı şifresi (bu durumda boş)
$vt_adi = "abcdek"; // Veritabanı adı
$vt_port = "3306"; // Veritabanı portu (varsayılan MySQL portu)

$baglan = mysqli_connect($vt_sunucu, $vt_kullanici, $vt_sifre, $vt_adi, $vt_port);

if (!$baglan) {
    die("Veri tabanı bağlantı işlemi başarısız: " . mysqli_connect_error());
}

if (isset($_POST["isim"], $_POST["tel"], $_POST["mail"], $_POST["konu"], $_POST["mesaj"])) {
    $adsoyad = mysqli_real_escape_string($baglan, $_POST["isim"]);
    $telefon = mysqli_real_escape_string($baglan, $_POST["tel"]);
    $email = mysqli_real_escape_string($baglan, $_POST["mail"]);
    $konu = mysqli_real_escape_string($baglan, $_POST["konu"]);
    $mesaj = mysqli_real_escape_string($baglan, $_POST["mesaj"]);

    $ekle = "INSERT INTO iletisim (adsoyad, telefon, email, konu, mesaj) VALUES ('$adsoyad', '$telefon', '$email', '$konu', '$mesaj')";

    if (mysqli_query($baglan, $ekle)) {
        echo "<script>alert('MESAJINIZI GÖNDERDİNİZ. BAŞARILI');</script>";
    } else {
        echo "Hata: " . $ekle . "<br>" . mysqli_error($baglan);
    }
} else {
    echo "Lütfen tüm alanları doldurun.";
}

mysqli_close($baglan);
?>
