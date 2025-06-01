<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<?php if (!empty($cart)) : ?>
  <ul class="list-group">
    <?php foreach ($cart as $item) : ?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <?= $item['name'] ?> (<?= $item['qty'] ?>)
        <span>Rp<?= number_format($item['price'] * $item['qty'], 0, ',', '.') ?></span>
      </li>
      <?php $total += $item['price'] * $item['qty']; ?>
    <?php endforeach; ?>
  </ul>
  <div class="mt-2 fw-bold">Total: Rp<?= number_format($total, 0, ',', '.') ?></div>
<?php else : ?>
  <p class="text-muted">Keranjang kosong.</p>
<?php endif; ?>