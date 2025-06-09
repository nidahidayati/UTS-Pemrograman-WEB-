<?php
$koneksi = mysqli_connect("localhost", "root", "", "bioskop");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nama = $_POST['nama'];
$film = $_POST['film'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO booking (nama_pemesan, judul_film, jumlah_tiket)
        VALUES ('$nama', '$film', '$jumlah')";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-box {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            width: 400px;
        }
        h2 {
            color: #28a745;
        }
        p {
            font-size: 16px;
            color: #333;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <?php
        if (mysqli_query($koneksi, $sql)) {
            echo "<h2>Booking Berhasil!</h2>";
            echo "<p>Terima kasih, <strong>$nama</strong>.</p>";
            echo "<p>Film: <strong>$film</strong></p>";
            echo "<p>Jumlah Tiket: <strong>$jumlah</strong></p>";
        } else {
            echo "<h2 style='color: red;'>Booking Gagal!</h2>";
            echo "<p>Error: " . mysqli_error($koneksi) . "</p>";
        }
        mysqli_close($koneksi);
        ?>
        <a class="btn" href="form_booking.html">Kembali ke Form</a>
    </div>
</body>
</html>
