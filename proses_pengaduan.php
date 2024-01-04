<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_pelapor = mysqli_real_escape_string($con, $_POST["nama_pelapor"]);
    $email_pelapor = mysqli_real_escape_string($con, $_POST["email_pelapor"]);
    $telepon_pelapor = mysqli_real_escape_string($con, $_POST["telepon_pelapor"]);
    $tanggal_pengaduan = mysqli_real_escape_string($con, $_POST["tanggal_pengaduan"]);
    $deskripsi_pengaduan = mysqli_real_escape_string($con, $_POST["deskripsi_pengaduan"]);

    // Masukkan data ke dalam tabel pengaduan
    $sql = "INSERT INTO pengaduan (nama_pelapor, email_pelapor, telepon_pelapor, tanggal_pengaduan, deskripsi_pengaduan) 
            VALUES ('$nama_pelapor', '$email_pelapor', '$telepon_pelapor', '$tanggal_pengaduan', '$deskripsi_pengaduan')";

    if (mysqli_query($con, $sql)) {
        // Notifikasi pengaduan berhasil
        echo "<script>alert('Pengaduan berhasil dikirim.');</script>";
        // Redirect ke index.php setelah 2 detik
        echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Tutup koneksi
mysqli_close($con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 300px;
            padding: 16px;
            background-color: white;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid black;
            border-radius: 4px;
        }

        input[type=text],
        input[type=email],
        input[type=tel],
        input[type=date],
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        input[type=submit]:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Form Pengaduan</h2>
        <form action="proses_pengaduan.php" method="post">
            <label for="nama_pelapor">Nama:</label><br>
            <input type="text" id="nama_pelapor" name="nama_pelapor"><br>
            <label for="email_pelapor">Email:</label><br>
            <input type="email" id="email_pelapor" name="email_pelapor"><br>
            <label for="telepon_pelapor">Telepon:</label><br>
            <input type="tel" id="telepon_pelapor" name="telepon_pelapor"><br>
            <label for="tanggal_pengaduan">Tanggal Pengaduan:</label><br>
            <input type="date" id="tanggal_pengaduan" name="tanggal_pengaduan"><br>
            <label for="deskripsi_pengaduan">Isi Pengaduan:</label><br>
            <textarea id="deskripsi_pengaduan" name="deskripsi_pengaduan" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>
