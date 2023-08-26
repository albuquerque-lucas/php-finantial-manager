<form action="../../../../../index.php" method="post">
  <div class="project-first-inputs">
    <input type="text" name="product-title" placeholder="Nome">
    <input type="number" name="product-price" placeholder="Preco">
    <input type="text" name="product-description" placeholder="Breve descricao">
  </div>
  <div class="project-second-inputs">
    <select name="product-category">
      <?php foreach($categories as $category): ?>
        <option value="<?= $category->name ?>">
          <?= $category->name ?>
        </option>
      <?php endforeach; ?>
    </select>
    
  </div>
  <button class="btn-send">Enviar</button>
</form>