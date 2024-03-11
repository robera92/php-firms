<?php include('view/_partials/header.view.php'); ?>

    <h1 class="mb-5">Redaguoti imonę</h1>

    <?php if($error): ?>
      <div class="alert alert-warning" role="alert"><?=$error;?></div>
    <?php endif; ?>

    <form class="mb-4" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Pavadinimas</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= isset($company_data['name']) ? htmlspecialchars($company_data['name']) : '' ?>" required>
      </div>
      <div class="mb-3">
        <label for="code" class="form-label">Įmonės kodas</label>
        <input type="text" class="form-control" id="code" name="code" value="<?= isset($company_data['code']) ? htmlspecialchars($company_data['code']) : '' ?>" required>
      </div>
      <div class="mb-3">
        <label for="vatCode" class="form-label">PVM kodas</label>
        <input type="text" class="form-control" id="vatCode" name="vatCode" value="<?= isset($company_data['vatCode']) ? htmlspecialchars($company_data['vatCode']) : '' ?>">
      </div>
      <div class="mb-3">
        <label for="adress" class="form-label">Adresas</label>
        <input type="text" class="form-control" id="adress" name="adress" value="<?= isset($company_data['adress']) ? htmlspecialchars($company_data['adress']) : '' ?>" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Tel. numeris</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($company_data['phone']) ? htmlspecialchars($company_data['phone']) : '' ?>" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">El. paštas</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= isset($company_data['email']) ? htmlspecialchars($company_data['email']) : '' ?>" required>
      </div>
      <div class="mb-3">
        <label for="activity" class="form-label">Veikla</label>
        <input type="text" class="form-control" id="activity" name="activity" value="<?= isset($company_data['activity']) ? htmlspecialchars($company_data['activity']) : '' ?>" required>
      </div>
      <div class="mb-3">
        <label for="manager" class="form-label">Vadovas</label>
        <input type="text" class="form-control" id="manager" name="manager" value="<?= isset($company_data['manager']) ? htmlspecialchars($company_data['manager']) : '' ?>">
      </div>
      <button type="submit" name="save" class="btn btn-primary">Redaguoti</button>
    </form>


<?php include('view/_partials/footer.view.php'); ?>