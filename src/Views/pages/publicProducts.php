
<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">

    <section class="product-form">
      <?php if(isset($categories)): ?>
      <?php require_once __DIR__ . '/components/forms/productForm.php' ?>
      <?php else: ?>
        <h1>Ainda nao ha nenhuma categoria cadastrada.</h1>
        <h2>Nao sera possivel cadastrar produtos.</h2>
      <?php endif; ?>
    </section>
    <h1>Produtos</h1>
    <section class="product-display">
      <?php if (isset($products)):?>
        <ul class="product-list">
        <?php foreach($products as $product): ?>
          <li class="product-list-item">
            <div class="info">
              <img src="<?= $product->urlImage?>" alt="" class="product-list-image">
              <h6>
                <?= $product->title ?>
              </h6>
              <h6>
                Serie</br>
                <?= $product->id ?>
              </h6>
              <h6>
              Preco</br>
                <?= $product->price ?>
              </h6>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
        <h1>Nenhum produto cadastrado.</h1>
      <?php endif; ?>

    </section>
    </div>
    <?php require_once __DIR__ . '/components/mainFooter.php';?>
    