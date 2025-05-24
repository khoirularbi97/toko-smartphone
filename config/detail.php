<?php
require 'auth.php';

function detail($id)
{
    global $con;

    $query =  mysqli_query($con, "SELECT * FROM prduct WHERE id_product = '$id'");

    $data = [
        'produk' => $product = mysqli_fetch_object($query),
        'judul' => $product->brand,
    ];
    return $data;
}
?>