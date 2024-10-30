<?php

$daftarmenu = array(
    "pecel" => 10000,
    "nasi kuning" => 12000,
    "spaghetti" => 20000,
    "air mineral" => 3000,
    "cendol" => 5000,
    "es kopi" => 7000,
    "es teh" => 2500,
);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menu = $_POST['menu'];
    $jumlah = (int) $_POST['jumlah'];

    if (array_key_exists($menu, $daftarmenu)) {
        $hargaMenu = $daftarmenu[$menu];
        $totalHarga = $hargaMenu * $jumlah;

        echo "<h1>Pesanan Anda</h1>";
        echo "<p>Menu: $menu</p>";
        echo "<p>Jumlah: $jumlah</p>";
        echo "<p>Total Harga: Rp" . $totalHarga . "</p>";
        echo "<a href='asesmen.php'>Pesan Lagi</a>";
    } else {
        echo "<p>Menu tidak ditemukan.</p>";
        echo "<a href='asesmen.php'>Kembali ke Menu</a>";
    }
} else {
    echo "<p>Tidak ada data yang diterima.</p>";
    echo "<a href='asesmen.php'>Kembali ke Menu</a>";
}

?>