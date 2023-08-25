
<?php require_once __DIR__ . '/components/mainHeader.php';?>
  <div class="main-div-default">
    <h1>Projects</h1>
    <section class="project-display">
      <?php if (isset($projects)):?>
        <ul class="project-list">
        <?php foreach($projects as $project): ?>
          <li class="project-list-item">
              <?= $project?>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php else: ?>
        <h1>Nenhum projeto cadastrado.</h1>
      <?php endif; ?>

    </section>
    </div>
    <?php require_once __DIR__ . '/components/mainFooter.php';?>
    