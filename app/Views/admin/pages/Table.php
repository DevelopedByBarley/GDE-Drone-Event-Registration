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
        <th>Szervezeti egység / Beosztás</th>
        <th>Ország</th>
        <th>Irányítószám , Helyiség , Utca / házszám</th>
        <th>Előadó?</th>
        <th>Ebéd</th>
        <th>Komment</th>
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
                <p class="fw-bold mb-1"><?= $user['prefix'] ?? '' ?>. <?= $user['first_name'] ?? 'Error' ?> <?= $user['last_name'] ?? 'Error' ?></p>
                <p class="text-muted mb-0"><?= $user['email'] ?? 'Error' ?></p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1"><?= $user['company'] ?? 'Error' ?></p>
          </td>
          <td>
            <p class="fw-bold mb-1"><?= $user['org_unit'] ?? '' ?></p>
            <p class="text-muted mb-0"><?= $user['post'] ?? 'Error' ?></p>
          </td>
          <td>
            <p class="text-muted mb-0"><?= $user['country'] ?? 'Error' ?></p>
          </td>
          <td>

            <p class="text-muted mb-0">
              <span class="badge <?= $user['is_instructor'] === 1 ? 'bg-sky-500 ' : 'bg-rose-500' ?>  rounded-pill d-inline">
                <?= $user['post_code'] ?? 'Nem' ?>
              </span>
              <?= $user['city'] ?? 'Error' ?>
            </p>
            <p class="text-muted mb-0"><?= $user['street_and_num'] ?? 'Error' ?></p>
          </td>
          <td>
            <span class="badge bg-<?= $user['is_instructor'] ? 'sky' : 'rose' ?>-500 rounded-pill d-inline">
              <?= $user['is_instructor'] ? 'Igen' : 'Nem' ?>
            </span>
          </td>
          <td>
            <span class="badge bg-<?= $user['lunch'] ? 'sky' : 'rose' ?>-500 rounded-pill d-inline">
              <?= $user['lunch'] ? $user['lunch']  : 'nem' ?>
            </span>
          </td>

          <td class="overflow-y-scroll">
            <div class="max-h-5 max-w-10">
              <?php if ($user['comment']): ?>
                <?= $user['comment'] ?>
              <?php else: ?>
                <span class="badge bg-rose-500 rounded-pill d-inline">
                  Nincs
                </span>
              <?php endif ?>

            </div>
          </td>


          <td>
            <?php if ((int)$user['is_instructor'] === 1 && !empty($user['attachment'])): ?>
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