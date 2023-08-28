
<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
    <section class='categories-form'>
      <h3>Adicionar categoria</h3>
      <?php require_once __DIR__ . '/components/forms/categoryForm.php'?>
    </section>
    <section class="category-display">
      <?php if(count($data['categories']) === 0):?>
        <h1>Nenhuma categoria cadastrada</h1>
      <?php else: ?>
      <ul class="category-list">
        <?php foreach($data['categories'] as $category): ?>
          <li class="category-list-item">
            <div class="info">
              <h6 class="category-code">
                <?= $category->serial ?>
              </h6>
              <h5 class="category-name">
              <?= $category->name ?>
              </h5>
              <h6 class="category-products-amount">
                Produtos </br>
              <?= count($category->products()) ?>
              </h6>
            </div>
            <div class="list-item-buttons">
              <button>Editar</button>
              <button>Excluir</button>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </section>
  </div>
<?php require_once __DIR__ . '/components/mainFooter.php';?>
    