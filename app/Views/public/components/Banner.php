<div class="w-100 py-2 z-1 d-none d-xl-block" style="background-image: linear-gradient(90deg, rgba(0,153,186,1) 30%, rgba(0,206,124,1) 90%);">
  <div class="container">
    <div class="row">
      <div class="col-8 bg-blue rounded text-white d-flex align-items-center justify-content-between">
        <p class="m-0 p-0">
          <i class="fa-solid fa-location-dot me-1"></i>
          1119 Budapest, Fejér Lipót u. 70.
        </p>
        <a href="mailto:info@gde.hu" class="m-0 p-0 text-decoration-none text-white cursor-pointer">
          <i class="fa-solid fa-envelope me-1"></i>
          info@gde.hu
        </a>
        <a href="tel:+36 20 999 8900" class="m-0 p-0 text-decoration-none text-white cursor-pointer">
          <i class="fa-solid fa-mobile-retro me-1"></i>
          +36 20 999 8900
        </a>
        <a href="tel:+36 20 277 0107" class="m-0 p-0 text-decoration-none text-white cursor-pointer">
          <i class="fa-solid fa-mobile-retro me-1"></i>
          <?= $_COOKIE['lang'] === 'hu' ? 'Tanulmányi ügyek' : 'Study cases' ?>: +36 20 277 0107
        </a>
      </div>
      <div class="col-4">
        <div class="row d-flex justify-content-end gap-2">
          <div class="col-1">
            <a href="https://www.facebook.com/GaborDenesEgyetem">
              <div class="bg-blue hover-bg-blue-hover rounded-circle transition text-white d-flex align-items-center justify-content-center" style="height: 35px; width: 35px;">
                <span>
                  <i class="fa-brands fa-facebook-f ikon"></i>
                </span>
              </div>
            </a>
          </div>
          <div class="col-1">
            <a href="https://www.linkedin.com/school/gabordenesegyetem/" class="bg-red-500">
              <div class="bg-blue hover-bg-blue-hover rounded-circle transition text-white d-flex align-items-center justify-content-center" style="height: 35px; width: 35px;">
                <span>

                  <i class="fa-brands fa-linkedin-in ikon"></i>
                </span>
              </div>
            </a>
          </div>
          <div class="col-1">
            <a href="https://www.instagram.com/gabor_denes_egyetem/" class="bg-red-500">
              <div class="bg-blue hover-bg-blue-hover rounded-circle transition text-white d-flex align-items-center justify-content-center" style="height: 35px; width: 35px;">
                <span>
                  <i class="fa-brands fa-instagram ikon"></i>
                </span>
              </div>
            </a>
          </div>
          <div class="col-1">
            <a href="https://neptun.gde.hu/hallgato/login" class="bg-red-500">
              <div class="bg-blue hover-bg-blue-hover rounded-circle transition text-white d-flex align-items-center justify-content-center" style="height: 35px; width: 35px;">
                <small>N[h]</small>
              </div>
            </a>
          </div>
          <div class="col-1">
            <a href="https://neptun.gde.hu/oktato/login.aspx" class="bg-red-500">
              <div class="bg-blue hover-bg-blue-hover rounded-circle transition text-white d-flex align-items-center justify-content-center" style="height: 35px; width: 35px;">
                <small>N[o]</small>
              </div>
            </a>
          </div>
          <div class="col-1">
            <a href="#" class="bg-red-500">
              <div class="bg-blue p-1 hover-bg-blue-hover rounded-circle transition text-white d-flex align-items-center justify-content-center" style="height: 35px; width: 35px;">
                <a href="/lang/<?= $_COOKIE['lang'] === "hu" ? "en" : "hu" ?>">
                  <img src="/public/assets/images/icons/<?= $_COOKIE['lang'] ? $_COOKIE['lang'] . '_flag.jpg' : 'hu_flag.jpg' ?>" class="img-fluid" alt="">
                </a>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>