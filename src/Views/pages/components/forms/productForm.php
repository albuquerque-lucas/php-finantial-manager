<form action="/products" method="post">
  <div class="project-first-inputs">
    <input type="text" name="product-title" placeholder="Nome">
    <input type="number" step="0.01" name="product-price" placeholder="Preco">
  </div>
  <div class="project-second-inputs">
    <input type="text" name="product-description" placeholder="Breve descricao">
    <label for="product-category">Categoria:</label>
    <select name="product-category">
      <?php foreach($data['categories'] as $category): ?>
        <option value="<?= $category->id ?>">
          <?= $category->name(); ?>
        </option>
      <?php endforeach; ?>
    </select>
    
  </div>
  <button class='form-button'>Enviar</button>
</form>