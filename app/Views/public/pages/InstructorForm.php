<?php


$csrf = $params['csrf'] ?? null;
$prev = $params['prev'] ?? null;
$errors = $params['errors'] ?? null;

?>

<div class="container-fluid bg-secondary-dark bg-secondary-dark dark-bg-slate-100 py-5 mt-10">
  <div class="container" id="registration">
    <div class="row">
      <div class="col col-lg-8 mx-auto">
        <form action="/user/register" method="POST" enctype="multipart/form-data">

          <?php $csrf->generate() ?>

          <div class="row ">
            <div class="col-12 my-4">
              <div class="alert alert-info fw-bold py-2 d-flex align-items-center text-2xl">
                Előadói regisztráció
              </div>
            </div>

            <input type="hidden" id="is_instructor" name="is_instructor" class="form-control hidden" value="1" required/>

            <div class="col-12 col-lg-6 mb-4">
              <label class="form-label" for="name">Név</label>
              <input type="text" id="name" name="name" placeholder="Teljes név" class="form-control" required value="<?php echo isset($prev) ? $prev['name'] : '' ?>" validators='{
                "name": "name",
                "split": true,
                "required": true,
                "minLength": 5,
                "maxLength": 50
              }' />
              <?php if (!empty($errors['name'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['name'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Company -->
            <div class="col-12 col-lg-6 mb-4">
              <label class="form-label " for="company">Cég / Intézmény neve</label>
              <input type="text" id="company" name="company" placeholder="Cég / Autós iskola pontos neve" class="form-control" value="<?php echo isset($prev) ? $prev['company'] : '' ?>" validators='{
             "name": "company",
             "required": true,
             "minLength": 5,
             "maxLength": 100
         }' required />
              <?php if (!empty($errors['company'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['company'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>
          </div>



          <!-- Email -->
          <div class="row">
            <div class="col-12  mb-4">
              <label class="form-label" for="email">E-mail</label>
              <input type="email" id="email" name="email" placeholder="E-mail cím" class="form-control" value="<?php echo isset($prev) ? $prev['email'] : '' ?>" validators='{
             "name": "email",
             "email": true,
             "required": true,
             "minLength": 5,
             "maxLength": 50
         }' required />
              <?php if (!empty($errors['email'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['email'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Phone -->
            <div class="col-12  mb-4">
              <label class="form-label " for="phone">Telefonszám</label>
              <input type="text" id="phone" name="phone" class="form-control" placeholder="Telefonszám pl. +36-20-123-4567" value="<?php echo isset($prev) ? $prev['phone'] : '' ?>" validators='{
             "name": "phone",
             "required": true,
             "phone": true,
             "minLength": 9,
             "maxLength": 17
         }' required />
              <?php if (!empty($errors['phone'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['phone'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>
          </div>

          <div class="col-12 mb-4">
            <label class="form-label" for="name">Konferencia témája</label>
            <input type="text" id="conf_theme" name="conf_theme" placeholder="Konferencia témája" class="form-control" required value="<?php echo isset($prev) && isset($prev['conf_theme']) ? $prev['conf_theme'] : '' ?>" validators='{
                "name": "conf_theme",
                "required": true,
                "minLength": 5,
                "maxLength": 50
              }' />
            <?php if (!empty($errors['conf_theme'])): ?>
              <div class="alert alert-danger p-1" role="alert">
                <?php foreach ($errors['conf_theme'] as $error): ?>
                  <p class="m-0"><?= $error ?></p>
                <?php endforeach ?>
              </div>
            <?php endif ?>
          </div>

          <div class="col-12 mb-4">
            <div class="mb-3">
              <label for="formFile" class="form-label">Csatolmány feltöltése (pdf, doc, docx)</label>
              <input class="form-control" type="file" id="attachment" name="attachment">
            </div>
          </div>





          <!-- Checkbox -->
          <div class="row">
            <div class="col-12 mb-4">
              <div class="form-check mb-2">
                <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" required />
                <label class="form-check-label" for="form6Example8"> Az <a href="#" class="main-red">adatkezelési tájékoztatót</a> elolvastam, elfogadom </label>
              </div>
            </div>
            <!--   <div class="col-12 mb-4">
              <div class="form-check mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" required />
                <label class="form-check-label " for="form6Example8">
                  Hozzájárulok, hogy a rendezvényen kép- és videófelvétel készülhet rólam, melyet a szervezők marketing és kommunikációs célokra felhasználhatnak.
                </label>
              </div>
            </div> -->
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn bg-blue hover-bg-blue-hover text-white btn-block mb-4">Regisztrácó</button>
        </form>
      </div>
    </div>

  </div>
</div>