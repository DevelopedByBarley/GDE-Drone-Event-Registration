<?php


$csrf = $params['csrf'] ?? null;
$prev = $params['prev'] ?? null;
$errors = $params['errors'] ?? null;
$lang = $_COOKIE['lang'] ?? null;

?>

<div class="container-fluid bg-secondary-dark bg-secondary-dark dark-bg-slate-100  py-0 py-xl-5 mt-8">
  <div class="container" id="registration">
    <div class="row">
      <div class="col col-lg-8 mx-auto">
        <form action="/user/register" method="POST" enctype="multipart/form-data">

          <?php $csrf->generate() ?>

          <div class="row ">
            <div class="col-12 my-4">
              <div class="alert alert-info fw-bold py-2 d-flex align-items-center text-2xl">
                <?= REGISTRATION['instructor'][$lang] ?>
              </div>
            </div>

            <input type="hidden" id="is_instructor" name="is_instructor" class="form-control hidden" value="1" />
            <!-- Prefix -->
            <div class="col-12 col-lg-2 mb-4">
              <label class="form-label" for="prefix"> <?= REGISTRATION['prefix'][$lang] ?></label>
              <input type="text" id="prefix" name="prefix" placeholder="<?= REGISTRATION['prefix'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['prefix'] : '' ?>" maxlength="30" />
              <?php if (!empty($errors['prefix'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['prefix'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- First Name -->
            <div class="col-12 col-lg-5 mb-4">
              <label class="form-label" for="first_name"> <?= REGISTRATION['first_name'][$lang] ?></label>
              <input type="text" id="first_name" name="first_name" placeholder="<?= REGISTRATION['first_name'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['first_name'] : '' ?>" maxlength="100" required validators='{
                  "name": "first_name",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 100}' required />
              <?php if (!empty($errors['first_name'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['first_name'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Last Name -->
            <div class="col-12 col-lg-5 mb-4">
              <label class="form-label" for="last_name"><?= REGISTRATION['last_name'][$lang] ?></label>
              <input type="text" id="last_name" name="last_name" placeholder="<?= REGISTRATION['last_name'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['last_name'] : '' ?>" maxlength="100" required validators='{
                  "name": "last_name",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 100}' required />
              <?php if (!empty($errors['last_name'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['last_name'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Company -->
            <div class="col-12 mb-4">
              <label class="form-label" for="company"><?= REGISTRATION['institution'][$lang] ?></label>
              <input type="text" id="company" name="company" placeholder="<?= REGISTRATION['institution'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['company'] : '' ?>" maxlength="500" required validators='{
                  "name": "company",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 500}' required />

              <?php if (!empty($errors['company'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['company'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Organization Unit -->
            <div class="col-12 col-lg-6 mb-4">
              <label class="form-label" for="org_unit"><?= REGISTRATION['organizational_unit'][$lang] ?></label>
              <input type="text" id="org_unit" name="org_unit" placeholder="<?= REGISTRATION['organizational_unit'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['org_unit'] : '' ?>" maxlength="200" required validators='{
                  "name": "org_unit",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 200}' required />
              <?php if (!empty($errors['org_unit'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['org_unit'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Post -->
            <div class="col-12 col-lg-6 mb-4">
              <label class="form-label" for="post"><?= REGISTRATION['post'][$lang] ?></label>
              <input type="text" id="post" name="post" placeholder="<?= REGISTRATION['post'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['post'] : '' ?>" maxlength="200" required validators='{
                  "name": "post",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 200}' required />
              <?php if (!empty($errors['post'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['post'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Country -->
            <div class="col-12 col-lg-4 mb-4">
              <label class="form-label" for="country"><?= REGISTRATION['country'][$lang] ?></label>
              <input type="text" id="country" name="country" placeholder="<?= REGISTRATION['country'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['country'] : '' ?>" maxlength="300" required validators='{
                  "name": "country",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 200}' required />
              <?php if (!empty($errors['country'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['country'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Post Code -->
            <div class="col-12 col-lg-4 mb-4">
              <label class="form-label" for="post_code"><?= REGISTRATION['post_code'][$lang] ?></label>
              <input type="text" id="post_code" name="post_code" placeholder="<?= REGISTRATION['post_code'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['post_code'] : '' ?>" maxlength="50" required validators='{
                  "name": "post_code",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 10}' required />

              <?php if (!empty($errors['post_code'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['post_code'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- City -->
            <div class="col-12 col-lg-4 mb-4">
              <label class="form-label" for="city"><?= REGISTRATION['city'][$lang] ?></label>
              <input type="text" id="city" name="city" placeholder="<?= REGISTRATION['city'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['city'] : '' ?>" maxlength="300" required validators='{
                  "name": "city",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 100}' required />

              <?php if (!empty($errors['city'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['city'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Street and Number -->
            <div class="col-12  mb-4">
              <label class="form-label" for="street_and_num"><?= REGISTRATION['street_address'][$lang] ?></label>
              <input type="text" id="street_and_num" name="street_and_num" placeholder="<?= REGISTRATION['street_address'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['street_and_num'] : '' ?>" maxlength="500" required validators='{
                  "name": "street_and_num",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 100}' required />
              <?php if (!empty($errors['street_and_num'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['street_and_num'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <!-- Email -->
            <div class="col-12 mb-4">
              <label class="form-label" for="email"><?= REGISTRATION['email'][$lang] ?></label>
              <input type="email" id="email" name="email" placeholder="<?= REGISTRATION['email'][$lang] ?>" class="form-control dark-bg-secondary-dark" value="<?php echo isset($prev) ? $prev['email'] : '' ?>" maxlength="150" required validators='{
                  "name": "email",
                  "required": true,
                  "email": true,
                  "minLength": 12,
                  "maxLength": 50}' required />
              <?php if (!empty($errors['email'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['email'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>





            <div class="col-12 mb-4">
              <label class="form-label" for="authors"><?= REGISTRATION['authors'][$lang] ?></label>
              <input type="text" id="authors" name="authors" placeholder="<?= REGISTRATION['authors'][$lang] ?>" class="form-control dark-bg-secondary-dark" maxlength="1000" value="<?php echo isset($prev['authors']) ? $prev['authors'] : '' ?>" validators='{
                  "name": "authors",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 1000}'
                required />
              <?php if (!empty($errors['authors'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['authors'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <div class="col-12 mb-4">
              <label class="form-label" for="conf_title"><?= REGISTRATION['presentation_title'][$lang] ?></label>
              <input type="text" id="conf_title" name="conf_title" placeholder="<?= REGISTRATION['presentation_title'][$lang] ?>" class="form-control dark-bg-secondary-dark" maxlength="100" value="<?php echo isset($prev['conf_title']) ? $prev['conf_title'] : '' ?>" validators='{
                  "name": "conf_title",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 200}'
                required />
              <?php if (!empty($errors['conf_title'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['conf_title'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <div class="col-12 mb-4">
              <label class="form-label" for="conf_lang"><?= REGISTRATION['presentation_language'][$lang] ?></label>
              <input type="text" id="conf_lang" name="conf_lang" placeholder="<?= REGISTRATION['presentation_language'][$lang] ?>" class="form-control dark-bg-secondary-dark" maxlength="100" value="<?php echo isset($prev['conf_lang']) ? $prev['conf_lang'] : '' ?>" validators='{
                  "name": "conf_lang",
                  "required": true,
                  "minLength": 3,
                  "maxLength": 100}'
                required />
              <?php if (!empty($errors['conf_lang'])): ?>
                <div class="alert alert-danger p-1" role="alert">
                  <?php foreach ($errors['conf_lang'] as $error): ?>
                    <p class="m-0"><?= $error ?></p>
                  <?php endforeach ?>
                </div>
              <?php endif ?>
            </div>

            <div class="col-12 mb-4">
              <label class="form-label" for="conf_theme"><?= REGISTRATION['suggested_topic'][$lang] ?></label>
              <select id="conf_theme" name="conf_theme" class="form-control dark-bg-secondary-dark" required>
                <option value=""><?= REGISTRATION['suggested_topic'][$lang] ?></option>
                <?php foreach (REGISTRATION['topics'][$lang] as $index => $topic): ?>

                  <option
                    value="<?= htmlspecialchars(REGISTRATION['topics']['hu'][$index]) ?>"
                    <?= (isset($prev['conf_theme']) && REGISTRATION['topics']['hu'][$index] === $prev['conf_theme']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($topic) ?>
                  </option>
                <?php endforeach; ?>
              </select>

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
                <label for="formFile" class="form-label"><?= REGISTRATION['presentation_abstract'][$lang] ?></label>
                <input class="form-control" type="file" id="attachment" name="attachment">
              </div>
            </div>

            <div class="col-12 mb-4">
              <label class="form-label" for="comment"><?= REGISTRATION['comment'][$lang] ?></label>
              <textarea id="comment" name="comment" class="form-control dark-bg-secondary-dark" rows="5" placeholder="<?= REGISTRATION['comment'][$lang] ?>"><?php echo isset($prev) ? $prev['comment'] : '' ?></textarea>
            </div>







            <div class="row">
              <div class="col-12 mb-4">
                <div class="form-check mb-2">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" required />
                  <label class="form-check-label" for="form6Example8"> <?= REGISTRATION['accept_data'][$lang] ?></label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" required />
                  <label class="form-check-label " for="form6Example8">
                    <?= REGISTRATION['data_management'][$lang] ?>
                  </label>
                </div>
              </div>
            </div>


            <!-- Submit button -->

            <div class="mt-5">
              <button type="submit" class="btn bg-blue hover-bg-blue-hover text-white btn-block mb-4"><?= WELCOME['reg']['title'][$lang] ?></button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>