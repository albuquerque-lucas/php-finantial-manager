
<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
    <section class='categories-form'>
      <h3>Adicionar categoria</h3>
      <?php require_once __DIR__ . '/components/forms/categoryForm.php'?>
    </section>
    <section class="category-display">
      <?php if(count($data['categories']) === 0):?>
        <h1>Nenhuma categoria cadastrada</h1>
      <?php else:
      
        require_once __DIR__ . '/components/lists/categoryList.php';

      endif; ?>
    </section>
  </div>
<?php require_once __DIR__ . '/components/mainFooter.php';?>
    