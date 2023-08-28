
<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">

    <section class="product-form">
      <?php if(isset($data['categories'])): ?>
      <?php require_once __DIR__ . '/components/forms/productForm.php' ?>
      <?php else: ?>
        <h1>Ainda nao ha nenhuma categoria cadastrada.</h1>
        <h2>Nao sera possivel cadastrar produtos.</h2>
      <?php endif; ?>
    </section>
    <section class='product-display-head'>
      <form action="/serialize-products" method="post">
        <button>Serializar</button>
      </form>
      <h1>Produtos</h1>
    </section>
    <section class="product-display">
  <table class="product-table table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Imagem</th>
        <th scope="col">Título</th>
        <th scope="col">Preço</th>
      </tr>
    </thead>
    <?php if (isset($data['products'])): ?>
      <tbody>
        <?php foreach($data['products'] as $product): ?>
          <tr class="product-table-row">
            <th class="product-table-cell" scope="row"><?= $product->serial ?? $product->id ?></th>
            <td class="product-table-cell">
              <img src="<?= $product->urlImage ?>" alt="" class="product-table-image">
            </td>
            <td class="product-table-cell"><?= $product->title ?></td>
            <td class="product-table-cell"><?= $product->price ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    <?php else: ?>
      <tbody>
        <tr>
          <td colspan="4"><h1>Nenhum produto cadastrado.</h1></td>
        </tr>
      </tbody>
    <?php endif; ?>
  </table>
</section>

    </div>
    <?php require_once __DIR__ . '/components/mainFooter.php';?>
    