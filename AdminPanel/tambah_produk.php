<?php
// session_start();
require '../function/admin.php';

// if (cekLoginAdmin()  === false) {
//     $_SESSION['pesan'] = "Anda belum masuk!! Silahkan masuk terlebih dahulu!";
//     header('location:../User/login.php');
// }
if (isset($_POST['simpan'])) {
    tambahProduk($_POST);
}
?>
<?php require "tamplate/navbar.php"; ?>

<div class="main-content" id="main-content">
    <div class="container mt-5">
        <div class="card rounded-4 border-0">
            <div class="card-body p-4">
                <h3 class="mb-3">
                    <i data-feather="box" class="me-2"></i> Add Product
                </h3>
            </div>

                <?php if (isset($_GET['pesan'])) : ?>
                    <div class="alert alert-warning"><?= htmlspecialchars($_GET['pesan']) ?></div>
                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="Brand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="Brand" name="brand" required>
                        </div>
                        <div class="col-md-6">
                            <label for="model" class="form-label">Model / Seri</label>
                            <input type="text" class="form-control" id="model" name="model" required>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stock" required>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="foto" class="form-label">Image</label>
                            <input type="file" class="form-control" id="foto" name="image" accept="image/*">
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end gap-2">
                        <a href="produk_list.php" class="btn btn-outline-secondary btn-lg">
                            <i data-feather="arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-success btn-lg" name="simpan">
                            <i data-feather="save" ></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require 'tamplate/footer.php';?>; ?>
