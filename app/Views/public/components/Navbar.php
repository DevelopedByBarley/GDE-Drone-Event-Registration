<?php $csrf = $params['csrf'] ?? null ?>

<div class="fixed-top">
  <?php require_once 'app/Views/public/components/Banner.php' ?>
  <nav class="navbar navbar-expand-lg border-bottom pr-font bg-slate-100">
    <div class="container">
      <a class="navbar-brand " href="/">
        <img src="/public/assets/images/GDE_logo.png" style="height: 60px; width: 150px;" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 d-flex gap-2 justify-content-end">
          <li class="nav-item">
            <a class="nav-link hover-bg-blue hover-text-slate-50 py-3 px-4 rounded" href="<?= $_SERVER['REQUEST_URI'] !==  "/" ? '/#info' : '#info' ?>">Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hover-bg-blue hover-text-slate-50 py-3 px-4 rounded" href="<?= $_SERVER['REQUEST_URI'] !==  "/" ? '/#program' : '#program' ?>">Program</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hover-bg-blue hover-text-slate-50 py-3 px-4 rounded" href="<?= $_SERVER['REQUEST_URI'] !==  "/" ? '/#registration' : '#registration' ?>"><?= WELCOME['reg']['title'][$_COOKIE['lang']] ?></a>
          </li>
          <li class="nav-item px-3 d-md-none">
            <div class="bg-blue p-1 hover-bg-blue-hover rounded-circle transition text-white d-flex align-items-center justify-content-center" style="height: 35px; width: 35px;">
              <a href="/lang/<?= $_COOKIE['lang'] === "hu" ? "en" : "hu" ?>">
                <img src="/public/assets/images/icons/<?= $_COOKIE['lang'] ? $_COOKIE['lang'] . '_flag.jpg' : 'hu_flag.jpg' ?>" class="img-fluid" alt="">
              </a>
          </li>

          <!--     <li class="nav-item">
            <a class="nav-link hover-bg-blue hover-text-slate-50 py-3 px-4 rounded" href="#contact">Kapcsolat</a>
          </li> -->

        </ul>
      </div>
    </div>
  </nav>
</div>