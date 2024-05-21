<?php
include("baglantii.php");

// Ensure the connection is still open
if ($baglan && mysqli_ping($baglan)) {
    $sec = "SELECT * FROM iletisim";
    $sonuc = $baglan->query($sec);

    if ($sonuc->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>Ad Soyad</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Konu</th>
                <th>Mesaj</th>
              </tr>";
        while ($cek = $sonuc->fetch_assoc()) {
            echo "
            <tr>
                <td>" . htmlspecialchars($cek['adsoyad']) . "</td>
                <td>" . htmlspecialchars($cek['telefon']) . "</td>
                <td>" . htmlspecialchars($cek['email']) . "</td>
                <td>" . htmlspecialchars($cek['konu']) . "</td>
                <td>" . htmlspecialchars($cek['mesaj']) . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Veri tabanında kayıtlı hiçbir veri bulunamamıştır.";
    }
} else {
    echo "Bağlantı sağlanamadı.";
}

// Close the connection
mysqli_close($baglan);
?>
