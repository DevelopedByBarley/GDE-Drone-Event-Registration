<?php $lang = $_COOKIE['lang'] ?>

<header class="container">
  <div class="row">
    <div class="col-12 mt-6">
      <img src="/public/assets/images/drone.png" alt="" class="w-100">
    </div>
    <div class="col-lg-12" id="info">
      <h2 class="title text-3xl mt-5 mb-2 fw-bolder">
        <?= WELCOME['title'][$lang]; ?>
        <br>
        <span class="text-lg"> (DAAK2023)</span>
      </h2>
      <div class="alert alert-info fw-bold py-2 d-flex align-items-center">
        <?= WELCOME['desc'][$lang]; ?>
      </div>

      <div class="mb-5">

        <h6>
          <?= WELCOME['location'][$lang]; ?>
        </h6>
        <h6>
          <?= WELCOME['language'][$lang]; ?>
        </h6>
      </div>
    </div>
  </div>
</header>
<main>
  <div class="container">
    <div class="row">

      <div class="col-12">
        <div class="alert alert-info fw-bold py-2 d-flex align-items-center">
          <?= WELCOME['goal']['title'][$lang]; ?>
        </div>
        <div class="text-base">
          <p>
            <?= WELCOME['goal']['desc'][$lang]; ?>
        </div>
      </div>

      <div class="col-12">
        <div class="alert alert-info fw-bold py-2 d-flex align-items-center">
          <?= WELCOME['topics'][$lang]; ?>
        </div>

        <ul class="list-group">
          <?php foreach (WELCOME['topics_list'][$lang] as $topic): ?>
            <li class="list-group-item">• <?= htmlspecialchars($topic, ENT_QUOTES, 'UTF-8'); ?></li>
          <?php endforeach; ?>
        </ul>


        <p class="mt-3 border border-blue p-2">
          <?= WELCOME['publication'][$lang]; ?>
        </p>

      </div>

    </div>
  </div>


  <div class="container">
    <div id="program" class="row my-5">
      <div class="col-12 mx-auto">
        <div class="alert alert-info fw-bold py-2 d-flex align-items-center w-100">
          Programterv
        </div>
        <ul class="p-0 bg-white list-group">
          <?php foreach (WELCOME['schedule'][$lang] as $event): ?>
            <li class="list-group-item d-flex align-items-center p-3 light-border-slate-300 border-slate-50 border-top border-bottom">
              <h3 class="text-base main-dark dark-text-slate-50 fw-bolder">
                <?= htmlspecialchars(explode(' ', $event)[0]); // Időpont 
                ?>
              </h3>
              <h3 class="text-base px-5">
                <?= htmlspecialchars(substr($event, strpos($event, ' ') + 1)); // Esemény 
                ?>
              </h3>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>


  <div class="container" id="registration" style="background-image: linear-gradient(90deg, rgba(0,153,186,1) 30%, rgba(0,206,124,1) 90%);">
    <div class="row">

      <div class="col-12 col-md-6 min-h-30 text-center d-flex align-items-center justify-content-center flex-column text-white">
        <h1> <?= WELCOME['reg']['title'][$lang]; ?></h1>
        <div class="d-flex flex-column flex-md-row gap-3 mt-2">
          <a href="/register/guest" class="btn bg-slate-50 hover-text-blue">
            <?= WELCOME['reg']['guest'][$lang]; ?>
          </a>
          <a href="/register/instructor" class="btn bg-slate-50 hover-text-blue ">
            <?= WELCOME['reg']['instructor'][$lang]; ?>
           </a>
        </div>
      </div>
      <div class="col-12 col-md-6 p-0">
        <img src="/public/assets/images/drone.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>


</main>
<footer class="py-5 mt-5 bg-blue text-white" id="contact">
  <p class="text-center">
    Copyright © 2024 – Készítette a <a class="sky-200" href="https://max.hu">Max & Future webteam</a>
  </p>
</footer>