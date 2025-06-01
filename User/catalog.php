<div class="promos" id="promos">
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title d-flex justify-content-between align-items-center">
            <h3 class="title mb-0">New Products</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row flex-nowrap overflow-auto">
        <?php foreach ($produk as $value) : ?>
          <div class="promo-card d-flex flex-column shadow me-3" style="min-width: 200px;">
            <div class="promo-image">
              <img src="<?= $value->image ?>" alt="<?= $value->brand ?>" style="width: 100%; height: auto;" />
            </div>
            <div class="promo-content">
              <h5><?= $value->brand ?></h5>
              <div class="promo-price">Rp<?= number_format($value->price, 0, ',', '.') ?></div>
            </div>
            <div class="promo-icons mt-auto d-flex gap-2">
              <a href="#" onclick="addToCart(<?= $value->id_product ?>, '<?= $value->brand ?>', <?= $value->price ?>)">
                <i data-feather="shopping-cart"></i>
              </a>
              <a href="detail.php?id=<?= $value->id_product ?>">
                <i data-feather="eye"></i>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
