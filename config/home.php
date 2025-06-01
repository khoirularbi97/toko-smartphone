<?php
function home()
{
    global $con;

    $pd = mysqli_query($con, "SELECT * FROM product ORDER BY id_product DESC LIMIT 10");
    $produks = [];
    while ($produk = mysqli_fetch_object($pd)) {
        $produks[] = $produk;
    }
    $data = [
        'judul' => 'Selamat Datang di TechnoId',
        'produk' => $produks,
    ];
    return $data;
}

?>