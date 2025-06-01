<?php 
require "../function/admin.php";

$kueriCategory  = mysqli_query($con, "SELECT * FROM category");
$countCategory = mysqli_num_rows($kueriCategory);
?>
<?php 
require "tamplate/navbar.php";
?>

<!-- Modal -->
<div class="modal" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalLabel">Add Category</h1>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" placeholder="Masukkan kategori..." aria-label="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


<div id="main-content" class="main-content">
  <div class="conteiner-fluid">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item" aria-current="page">
            <i data-feather="home"></i><a href="../adminpanel/index.php" style="text-decoration:none;"> Home</a> 
        </li>
        <li class="breadcrumb-item active" aria-current="page"><a href="../adminpanel/category_list.php" style="text-decoration:none;"> Category</li>
      </ol>
    </nav>
  </div>
</div>

<div id="main-content" class="main-content-category">
  <div class="card-custom">
    <!-- Judul -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0">Category</h4>
    </div>

    <!-- Baris Search & Tambah Produk -->
    <div class="d-flex justify-content-between align-items-center mb-3 produk-toolbar flex-wrap">
      <!-- Search kiri -->
      <div class="input-group" style="max-width: 300px;">
        <input type="search" class="form-control" placeholder="Cari kategori..." aria-label="Search">
        <span class="input-group-text bg-primary text-white">
          <i data-feather="search"></i>
        </span>
      </div>

      <!-- Tambah Produk kanan -->
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
      <i data-feather="plus" class="me-1"></i> Add
      </button>


      <!-- <a href="#" class="btn btn-primary">
        <i data-feather="plus" class="me-1"></i> Add
      </a> -->
    </div>

      <div class="table-responsive">
        <table class="table table-hover  align-middle">
          <thead class="table-light">
            <tr>
              <th>Aksi</th>
              <th>Nama Kategori</th>
              <th>Create By</th>
              <th>Create Date</th>
              <th>Last Update By</th>
              <th>Last Update Date</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            if ($countCategory == 0){
              echo "<tr>
              <td colspan='6' class='text-center'>No result</td>
              </tr>";
            }
            else {
              $no = 1;
              while($dataCategory=mysqli_fetch_array($kueriCategory)){
                ?>
                <tr>
                  <td>
                  <a href="" class="btn btn-warning btn-sm">
                  <i data-feather="edit"></i>
                  </a>
                  <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus produk ini?')">
                  <i data-feather="trash"></i>
                  </a>
                  </td>
                  <td><?php echo $dataCategory['nama_cat']?></td>
                  <td><?= htmlspecialchars($dataCategory['CreatedBy']) ?></td>
                  <td><?= htmlspecialchars($dataCategory['CreatedDate']) ?></td>
                  <td><?= htmlspecialchars($dataCategory['LastUpdateBy']) ?></td>
                  <td><?= htmlspecialchars($dataCategory['LastUpdateDate']) ?></td>
                </tr>
                <?php
              }$no++;
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
</div>

  <?php require 'tamplate/footer.php'; ?>

