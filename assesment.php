<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Menu</title>
</head>
<body>
    <h1>Daftar Menu</h1>
    <ul>
        <li>nasi kuninng =  12000</li>
        <li>spagheti = 20000</li>
        <li>pecel = 10000</li>
        <li>ari mineral = 3000</li>
        <li>cendol = 5000</li>
        <li>es kopi = 7000</li>
        <li>es teh = 2500</li>
    </ul>
    <form action="asesmenproses.php" method="POST">
    <label for="menu">Pilih Menu:</label><br>
    <input type="text" id="menu" name="menu" placeholder="Masukkan nama menu" required><br><br>

    <label for="jumlah">Masukkan Jumlah:</label><br>
    <input type="number" id="jumlah" name="jumlah" min="1" required><br><br>

    <input type="submit" value="Pesan">
</form>

</body>
</html>