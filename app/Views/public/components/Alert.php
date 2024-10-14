<?php
$alert = $_SESSION["alert"] ?? null;
?>


<?php if (isset($alert)) : ?>
  <div id="alert-modal" class="text-center toast p-2 align-items-center text-white bg-<?= $alert["bg"] ?> border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        <h1 class="text-2xl"><?php echo $alert["message"]; ?></h1>
      </div>
    </div>
  </div>

  <script src="/public/js/alert.js"></script>
<?php endif; ?>


<?php
if (isset($alert)) {
  // Az alert session lejárt, töröljük
  unset($_SESSION['alert']);
}
?>