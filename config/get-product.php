<?php 
include 'conections.php';

if ($conn->connect_error) {
    die(json_encode(['error' => 'Koneksi gagal']));
}

$sql = "SELECT brand, model, pricw, image FROM product"; // Ganti sesuai field
$result = $conn->query($sql);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);
?>