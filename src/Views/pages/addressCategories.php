<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
        <section class='message-display'>
      <?php
      ?>
    </section>
    <section class='categories-form'>
      <h3>Adicionar tipo de endereco</h3>
      <?php require_once __DIR__ . '/components/forms/addressCategoryForm.php'?>
    </section>
    <section class='page-display-head'>
      <h1>Categorias</h1>
    </section>
    <section class="page-display">
      <?php if(count($data['categories']) === 0):?>
        <h1>Nenhuma categoria de endereco cadastrada</h1>
      <?php else:
        require_once __DIR__ . '/components/lists/addressCategoryList.php';
      endif; ?>
    </section>
  </div>
<?php require_once __DIR__ . '/components/mainFooter.php';?>
    