
<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
    <h1>Products</h1>
    <section class="product-display">
      <?php if (isset($products)):?>
        <ul class="product-list">
        <?php foreach($products as $product): ?>
          <li class="product-list-item">
              <?= $product->title ?>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
        <h1>Nenhum produto cadastrado.</h1>
      <?php endif; ?>

    </section>
    </div>
    <?php require_once __DIR__ . '/components/mainFooter.php';?>
    