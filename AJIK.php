<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> WEB WARUNG AJIK </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h1 {
            font-family: arial;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #666;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    
<h1> Warung Makan AJIK</h1>

<?php
// Function untuk menghitung total harga pesanan
function hitungTotalHarga($harga, $jumlah) {
    return $harga * $jumlah;
}

// Data menu makanan
$menuMakanan = array(
    "Nasi Goreng" => 15000,
    "Mie Goreng" => 12000,
    "Ayam Bakar" => 25000,
    "Sate Ayam" => 20000
);

// Memproses formulir ketika tombol submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pesanan = isset($_POST['pesanan']) ? $_POST['pesanan'] : array();
    $totalHarga = 0;

    // Menampilkan ringkasan pesanan
    echo "<h2>Ringkasan Pesanan</h2>";
    echo "<ul>";
    foreach ($pesanan as $item => $jumlah) {
        if ($jumlah > 0) {
            $hargaItem = $menuMakanan[$item];
            $totalHargaItem = hitungTotalHarga($hargaItem, $jumlah);
            $totalHarga += $totalHargaItem;
            echo "<li>$item: $jumlah x Rp " . number_format($hargaItem) . " = Rp " . number_format($totalHargaItem) . "</li>";
        }
    }
    echo "</ul>";

    // Menampilkan total harga
    echo "<p>Total Harga: Rp " . number_format($totalHarga) . "</p>";
}
?>

<!-- Formulir pemesanan makanan -->
<form method="post" action="">
    <h2>Pemesanan Makanan</h2>

    <?php
    // Menampilkan pilihan menu makanan
    foreach ($menuMakanan as $item => $harga) {
        echo "<label for='$item'>$item (Rp " . number_format($harga) . ")</label>";
        echo "<input type='number' name='pesanan[$item]' placeholder='Jumlah' min='0'>";
    }
    ?>

    <button type="submit">Pesan Sekarang</button>
</form>

</body>
</html>
