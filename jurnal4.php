<?php

$products = [
    ['id' => 1, 'name' => 'Buku', 'category' => 'Alat Tulis', 'price' => 20000, 'stok'=> 20],
    ['id' => 2, 'name' => 'Pulpen', 'category' => 'Alat Tulis', 'price' => 5000, 'stok' => 31],
];


function getNewId($products) {
    if (empty($products)) return 1;
    return max(array_column($products, 'id')) + 1;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $newProduct = [
        'id' => getNewId($products),
        'name' => $_POST['name'],
        'category' => $_POST['category'],
        'price' => $_POST['price'],
        'stok' => $_post['stok']
    ];
    $products[] = $newProduct;
}


if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    $products = array_filter($products, function($product) use ($idToDelete) {
        return $product['id'] != $idToDelete;
    });
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_product'])) {
    foreach ($products as &$product) {
        if ($product['id'] == $_POST['id']) {
            $product['name'] = $_POST['name'];
            $product['category'] = $_POST['category'];
            $product['price'] = $_POST['price'];
            $product['stok'] = $_post['stok'];
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
</head>
<body>

<h2>Tambah Barang</h2>
<form method="POST" action="">
    <label>Nama Barang:</label>
    <input type="text" name="name" required>
    <br>
    <label>Kategori Barang:</label>
    <input type="text" name="category" required>
    <br>
    <label>Harga Barang:</label>
    <input type="number" name="price" required>
    <br>
    <label>stok barang:</label>
    <input> type="number" name="stok" reuired> 
    <br>
    <button type="submit" name="add_product">Tambah Barang</button>
</form>

<h2>Daftar Barang</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>stok</th>
        
        
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['category'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['stok'] ?></td>
        <td>
            <a href="?edit=<?= $product['id'] ?>">Edit</a> |
            <a href="?delete=<?= $product['id'] ?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php

if (isset($_GET['edit'])) {
    $idToEdit = $_GET['edit'];
    $productToEdit = null;
    foreach ($products as $product) {
        if ($product['id'] == $idToEdit) {
            $productToEdit = $product;
            break;
        }
    }
    if ($productToEdit):
?>
    <h2>Edit Barang</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $productToEdit['id'] ?>">
        <label>Nama Barang:</label>
        <input type="text" name="name" value="<?= $productToEdit['name'] ?>" required>
        <br>
        <label>Kategori Barang:</label>
        <input type="text" name="category" value="<?= $productToEdit['category'] ?>" required>
        <br>
        <label>Harga Barang:</label>
        <input type="number" name="price" value="<?= $productToEdit['price'] ?>" required>
        <br>
        <label>stok barang:</label>
        <input type="number" name="stok" value="<?= $productToEdit['stok'] ?>" required> 
        <br>
        <button type="submit" name="edit_product">Simpan Perubahan</button>
    </form>
<?php endif; } ?>

</body>
</html>