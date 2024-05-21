<?php
$vt_sunucu = "localhost"; // Veritabanı sunucusu
$vt_kullanici = "root"; // Veritabanı kullanıcı adı
$vt_sifre = ""; // Veritabanı şifresi (bu durumda boş)
$vt_adi = "abcdek"; // Veritabanı adı
$vt_port = "3306"; // Veritabanı portu (varsayılan MySQL portu)

$baglan = mysqli_connect($vt_sunucu, $vt_kullanici, $vt_sifre, $vt_adi, $vt_port);

if (!$baglan) {
    die("Veri tabanı bağlantı işlemi başarısız: " . mysqli_connect_error());
} else {
    echo "Bağlantı başarılı";
}
?>
