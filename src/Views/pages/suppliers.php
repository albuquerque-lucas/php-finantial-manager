<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
    <section class='message-display'>
      <?php
      ?>
    </section>
    <section class='page-display-head suppliers-header'>
      <div class="button-box">
        <a href="/create-supplier">
          <button class="btn btn-primary create-button">Cadastrar</button>
        </a>
      </div>
      <h1>Fornecedores</h1>
    </section>
    <section class="page-display mt-3">
      <?php if(!isset($data['suppliers'])): ?>
        <h1 class="mt-3">Ainda nao ha nenhum fornecedor cadastrado.</h1>
        <?php else: ?>
          <?php require_once __DIR__ . '/components/lists/suppliersList.php';?>
        <?php endif; ?>
    </section>
  </div> 
<?php require_once __DIR__ . '/components/mainFooter.php';?>
    