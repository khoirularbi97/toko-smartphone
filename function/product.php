<?php
require '../config/conections.php';

function produk()
{

    global $con;

    $query  = mysqli_query($con, "SELECT * FROM product WHERE IsDeleted = 0 ORDER BY id_product DESC");
    $row = [];
    while ($row = mysqli_fetch_object($query)) {
        $product[] = $row;
    }
    $data = [
        'judul' => 'Product ePhone Store',
        'produk' => $product,
    ];
    return $data;
}
