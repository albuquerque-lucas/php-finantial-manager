<table class="page-table table table-dark table-hover">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Descricao</th>
        <th scope="col">Produtos Cadastrados</th>
        <th scope="col">Editar/Excluir</th>
      </tr>
    </thead>
    <?php if (isset($data['categories'])): ?>
      <tbody>
        <?php foreach($data['categories'] as $category): ?>
          <tr class="category-table-row">
            <th class="category-table-cell" scope="row">
              <?= $category->serial()  ?>
            </th>
            <td class="category-table-cell"><?= $category->name(); ?></td>
            <td class="category-table-cell"><?= count($category->products()) ?></td>
            <td class="category-table-cell forms-table-cell">
              <form action="/update-category">
                  <input type="hidden" value=<?= $category->id(); ?>>
                  <button>
                    Editar
                  </button>
                </form>
                <form action="/delete-category" method="post">
                  <input
                  type="hidden"
                  value=<?= $category->id(); ?>
                  name="category-delete"
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
          <td colspan="4"><h1>Nenhuma categoria cadastrada.</h1></td>
        </tr>
      </tbody>
    <?php endif; ?>
  </table>