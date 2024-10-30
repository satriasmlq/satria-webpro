<?php
// Function untuk menghitung rata-rata
function hitungRataRata($angka1, $angka2) {
    return ($angka1 + $angka2) / 2;
}

// Function untuk menghitung penjumlahan
function hitungPenjumlahan($angka1, $angka2) {
    return $angka1 + $angka2;
}

// Mengecek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = (float)$_POST['angka1'];
    $angka2 = (float)$_POST['angka2'];
    $pilihan = (int)$_POST['pilihan'];

    // Memproses pilihan user
    switch ($pilihan) {
        case 1:
            echo "Rata-rata dari $angka1 dan $angka2 adalah: " . hitungRataRata($angka1, $angka2);
            break;
        case 2:
            echo "Penjumlahan dari $angka1 dan $angka2 adalah: " . hitungPenjumlahan($angka1, $angka2);
            break;
        case 3:
            echo "Rata-rata: " . hitungRataRata($angka1, $angka2) . "<br>";
            echo "Penjumlahan: " . hitungPenjumlahan($angka1, $angka2);
            break;
        case 4:
            echo "Keluar dari program.";
            exit;
        default:
            echo "Pilihan tidak valid.";
    }
} else {
    // Jika form belum disubmit, tampilkan form input
    echo '<form method="post" action="">
            Masukkan angka pertama: <input type="text" name="angka1"><br><br>
            Masukkan angka kedua: <input type="text" name="angka2"><br><br>
            Pilih opsi:<br>
            1. Tampilkan rata-rata<br>
            2. Tampilkan penjumlahan<br>
            3. Tampilkan rata-rata dan penjumlahan<br>
            4. Keluar<br>
            <input type="text" name="pilihan" placeholder="Masukkan pilihan (1-4)"><br><br>
            <input type="submit" value="Kirim">
          </form>';
}
?>