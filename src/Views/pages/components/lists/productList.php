<table class="page-table table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Imagem</th> 
        <th scope="col">Título</th>
        <th scope="col">Preço</th>
        <th scope="col">Categoria</th>
        <th scope="col">Editar/Excluir</th>
      </tr>
    </thead>
    <?php if (isset($data['products'])): ?>
      <tbody>
        <?php foreach($data['products'] as $product): ?>
          <tr class="product-table-row">
            <th class="product-table-cell" scope="row">
              <?= $product->serial(); ?>
            </th>
            <td class="product-table-cell">
              <img
              src="<?= $product->image(); ?>" 
              alt=""
              class="product-table-image">
            </td>
            <td class="product-table-cell"><?= $product->title(); ?></td>
            <td class="product-table-cell"><?= $product->price(); ?></td>
            <td class="product-table-cell">
              <?= $product->category()->name(); ?>
            </td>
            <td class="product-table-cell forms-table-cell">
              <form action="/update-product">
                  <input type="hidden" value=<?= $product->id(); ?>>
                  <button>
                    Editar
                  </button>
                </form>
                <form action="/delete-product" method="post">
                  <input
                  type="hidden"
                  value=<?= $product->id(); ?>
                  name="product-delete"
                  >
                  <button>
                    Excluir
                  </button>
                </form>
            </td>
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