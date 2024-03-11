<?php include('view/_partials/header.view.php'); ?>



<main class="flex-shrink-0">
  <div class="container">
    <h1 class="my-3">Visos įmonės</h1>
    <?php $companies = $companies->allCompanies(); ?>
    <?php if($companies): ?>
      <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Pavadinimas</th>
          <th scope="col">Kodas</th>
          <th scope="col">PVM Kodas</th>
          <th scope="col">Adresas</th>
          <th scope="col">Tel. nr.</th>
          <th scope="col">El. paštas</th>
          <th scope="col">Veikla</th>
          <th scope="col">Vadovas</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($companies as $key=>$value): ?>
          <tr>
            <td><?=$value['id'];?></td>
            <td><?=htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8');?></td>
            <td><?=htmlspecialchars($value['code'], ENT_QUOTES, 'UTF-8');?></td>
            <td><?=htmlspecialchars($value['vatCode'], ENT_QUOTES, 'UTF-8');?></td>
            <td><?=htmlspecialchars($value['adress'], ENT_QUOTES, 'UTF-8');?></td>
            <td><?=htmlspecialchars($value['phone'], ENT_QUOTES, 'UTF-8');?></td>
            <td><?=htmlspecialchars($value['email'], ENT_QUOTES, 'UTF-8');?></td>
            <td><?=htmlspecialchars($value['activity'], ENT_QUOTES, 'UTF-8');?></td>
            <td><?=htmlspecialchars($value['manager'], ENT_QUOTES, 'UTF-8');?></td>
            <td>
              <a href="/update/<?=$value['id'];?>" class="btn btn-success">Redaguoti</a>
              <a href="/delete/<?=$value['id'];?>" class="btn btn-danger" onClick="confirm('Ar tikrai?');">Šalinti</a>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    <?php
    else: ?>
    <h1 class="mt-5">Sąrašas tuščias, pridėkite įmonę.</h1>
    <?php endif; ?>

  </div>
</main>


<?php include('view/_partials/footer.view.php'); ?>