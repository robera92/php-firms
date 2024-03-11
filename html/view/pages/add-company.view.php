<?php include('view/_partials/header.view.php'); ?>

    <h1 class="mb-5">Pridėkite naują imonę</h1>

    <?php if($error): ?>
      <div class="alert alert-warning" role="alert"><?=$error;?></div>
    <?php endif; ?>

    <form class="mb-4" method="POST">
      <div class="mb-3">
      <label for="name" class="form-label">Pavadinimas</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" required>
      </div>
      <div class="mb-3">
      <label for="code" class="form-label">Įmonės kodas</label>
        <input type="text" class="form-control" id="code" name="code" value="<?= isset($_POST['code']) ? htmlspecialchars($_POST['code']) : '' ?>" required>
      </div>
      <div class="mb-3">
      <label for="vatCode" class="form-label">PVM kodas</label>
        <input type="text" class="form-control" id="vatCode" name="vatCode" value="<?= isset($_POST['vatCode']) ? htmlspecialchars($_POST['vatCode']) : '' ?>">
      </div>
      <div class="mb-3">
        <label for="adress" class="form-label">Adresas</label>
        <input type="text" class="form-control" id="adress" name="adress" value="<?= isset($_POST['adress']) ? htmlspecialchars($_POST['adress']) : '' ?>" required>
      </div>
      <div class="mb-3">
      <label for="phone" class="form-label">Tel. numeris</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>" required>
      </div>
      <div class="mb-3">
      <label for="email" class="form-label">El. paštas</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
      </div>
      <div class="mb-3">
      <label for="activity" class="form-label">Veikla</label>
        <input type="text" class="form-control" id="activity" name="activity" value="<?= isset($_POST['activity']) ? htmlspecialchars($_POST['activity']) : '' ?>" required>
      </div>
      <div class="mb-3">
      <label for="manager" class="form-label">Vadovas</label>
        <input type="text" class="form-control" id="manager" name="manager" value="<?= isset($_POST['manager']) ? htmlspecialchars($_POST['manager']) : '' ?>">
      </div>
      <button type="submit" name="save" class="btn btn-primary">Pridėti</button>
    </form>


<?php include('view/_partials/footer.view.php'); ?>