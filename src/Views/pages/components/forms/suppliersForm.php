<form action="/suppliers" method="post" class="suppliers-form">
  <div class="supplier-first-inputs">
    <input type="text" name="supplier-firstname" class="form-control" placeholder="Nome">
    <input type="text" name="supplier-lastname" class="form-control" placeholder="Sobrenome">
  </div>
  <div class="supplier-second-inputs">
    <input type="email" name="supplier-email" class="form-control" placeholder="email@example.com">
  </div>
  <div class="supplier-third-inputs telephone-inputs">
    <div class="phone-one-container">
      <label for="phone-one">Telefone principal</label>
      <input type="tel" id="telefone" name="phone-one" pattern="[0-9]{2} [0-9]{4}-[0-9]{4}" placeholder="+55 00 2345-6789" required>
      <label for="phone-one-type">Tipo</label>
      <select name="phone-one-type">
        <?php foreach($data['phone-types'] as $phoneType): ?>
          <option value=<?= $phoneType->id(); ?>>
            <?= $phoneType->name(); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="phone-two-container">
      <label for="phone-two">Telefone secundário</label>
      <input type="tel" id="telefone" name="phone-two" pattern="[0-9]{2} [0-9]{4}-[0-9]{4}" placeholder="+55 00 2345-6789" required>
      <label for="phone-two-type">Tipo</label>
      <select name="phone-two-type">
        <?php foreach($data['phone-types'] as $phoneType): ?>
          <option value=<?= $phoneType->id(); ?>>
            <?= $phoneType->name(); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="supplier-fourth-inputs address-inputs">
    <div class="address-field">
      <h5>Endereco Principal:</h5>
      <label for="address-one-street">Rua:</label>
      <input type="text" name="address-one-street" placeholder="Rua das Margaridas">
      <label for="address-one-street">Numero:</label>
      <input type="text" name="address-one-street" placeholder="33">
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
  </div>
  <button class='form-button'>Enviar</button> 
</form>
