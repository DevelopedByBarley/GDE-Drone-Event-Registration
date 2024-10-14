<div class="container-fluid min-h-95 d-flex p-5 my-5 align-items-start justify-content-center flex-column-reverse gap-5 table-responsive">

  <div class="btn-group gap-3">
    <a href="/admin/export/instructors" class="btn btn-info text-white">Előadók exportálása</a>
    <a href="/admin/export/guests" class="btn btn-success">Vendégek exportálása</a>
  </div>

  <table class="table align-middle mb-0 rounded rounded-lg shadow">
    <thead class="bg-teal-500">
      <tr>
        <th>Név / E-mail</th>
        <th>Cég / Intézmény név</th>
        <th>Telefonszám</th>
        <th>Előadó</th>
        <th>Konferencia témája</th>
        <th>Csatolmány</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($data['pages'] as $user): ?>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              <div class="ms-3">
                <p class="fw-bold mb-1"><?= $user['name'] ?? 'Error' ?></p>
                <p class="text-muted mb-0"><?= $user['email'] ?? 'Error' ?></p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1"><?= $user['company'] ?? 'Error' ?></p>
          </td>
          <td>
            <?= $user['phone'] ?? 'Error' ?>
          </td>
          <td>
            <span class="badge <?= $user['is_instructor'] === 1 ? 'bg-lime-500 ' : 'bg-rose-500' ?>  rounded-pill d-inline">
              <?= $user['is_instructor'] === 1 ? 'Igen' : 'Nem' ?>
            </span>
          </td>
          <td>
            <?php if ($user['conf_theme']): ?>
              <?= $user['conf_theme'] ?>
            <?php else: ?>
              <span class="badge bg-rose-500 rounded-pill d-inline">
                Nincs
              </span>
            <?php endif ?>
          </td>
          <td>
            <?php if ($user['is_instructor'] === 1 && !empty($user['attachment'])): ?>
              <a download="" href="/public/assets/uploads/<?= $user['attachment'] ?>" class="btn bg-teal-500 hover-bg-teal-400 text-white ">Letöltés</a>
            <?php else: ?>
              <span class="badge bg-rose-500 rounded-pill d-inline">
                Nincs
              </span>
            <?php endif ?>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

    <?php include 'app/Views/public/components/Pagination.php' ?>
  </table>
</div>