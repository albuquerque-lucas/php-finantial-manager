<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
    <section class='message-display'>
      <?php
      ?>
    </section>
    <section class="suppliers-form">
      <?php if(!isset($data['suppliers'])): ?>
        <h1>Ainda nao ha nenhum fornecedor cadastrado.</h1>
        <?php else: ?>
          <?php require_once __DIR__ . '/components/forms/suppliersForm.php' ?>
      <?php endif; ?>
    </section>
    <section class='page-display-head'>
      <h1>Fornecedores</h1>
    </section>
    <section class="page-display">
      <?php require_once __DIR__ . '/components/lists/suppliersList.php';?>
    </section>
  </div> 
<?php require_once __DIR__ . '/components/mainFooter.php';?>
    