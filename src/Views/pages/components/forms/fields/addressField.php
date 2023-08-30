<div class="address-field">
      <h5>Endereco adicional 1:</h5>
      <label for="address-one-street">Rua:</label>
      <input type="text" name="address-one-street" placeholder="Rua das Rosas">
      <label for="address-one-street">Numero:</label>
      <input type="text" name="address-one-street" placeholder="78">
      <label for="address-one-street">Bairro:</label>
      <input type="text" name="address-one-street" placeholder="Bairro">
      <label for="address-one-street">Cidade:</label>
      <input type="text" name="address-one-street" placeholder="Cidade">
      <label for="address-one-street">Codigo postal:</label>
      <input type="text" name="address-one-street" placeholder="00000-000">
      <label for="address-one-street">Pais:</label>
      <input type="text" name="address-one-street" placeholder="Pais">
      <label for="address-one-street">Tipo de endereco:</label>
      <select name="address-one-type">
        <?php foreach($data['address-type'] as $addressType): ?>
          <option value=<?= $addressType->id(); ?>>
          <?= $addressType->name(); ?>
        </option>
        <?php endforeach; ?>
      </select>
    </div>