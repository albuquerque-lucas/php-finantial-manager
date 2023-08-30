<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default create-container">
    <section class="create-form-header">
      <div class="button-box">
        <a href="/suppliers" class="align-self-start mx-3">
          <button class="btn btn-primary">
            Voltar
          </button>
        </a>
      </div>
      <h1>Cadastrar fornecedor</h1> 
    </section>
    <?php require_once __DIR__ . '/components/forms/suppliersForm.php';?>
  </div> 
<?php require_once __DIR__ . '/components/mainFooter.php';?>
