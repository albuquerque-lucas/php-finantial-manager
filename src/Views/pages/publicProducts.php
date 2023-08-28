
<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
    <section class='message-display'>
      <?php
      ?>
    </section>
    <section class="product-form">
      <?php if(count($data['categories']) === 0): ?>
        <h1>Ainda nao ha nenhuma categoria cadastrada.</h1>
        <h2>Nao sera possivel cadastrar produtos.</h2>
        <?php else: ?>
          <?php require_once __DIR__ . '/components/forms/productForm.php' ?>
      <?php endif; ?>
    </section>
    <section class='product-display-head'>
      <form action="/serialize-products" method="post">
        <button>Serializar</button>
      </form>
      <h1>Produtos</h1>
    </section>
    <section class="product-display">
      <?php require_once __DIR__ . '/components/lists/productList.php';?>
    </section>
  </div>
<?php require_once __DIR__ . '/components/mainFooter.php';?>
    