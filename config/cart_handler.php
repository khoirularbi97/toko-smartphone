<?php
session_start();

// Ambil data POST
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$name = $data['name'];
$price = $data['price'];

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Jika produk sudah ada, tambahkan qty
if (isset($_SESSION['cart'][$id])) {
  $_SESSION['cart'][$id]['qty'] += 1;
} else {
  $_SESSION['cart'][$id] = [
    'id' => $id,
    'name' => $name,
    'price' => $price,
    'qty' => 1
  ];
}

// Hitung total item
$totalItems = 0;
foreach ($_SESSION['cart'] as $item) {
  $totalItems += $item['qty'];
}

echo json_encode(['status' => 'success', 'totalItems' => $totalItems]);
?>