<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!DOCTYPE html>
<html lang="en">

<?php $title = "Wicookin" ?>

<?php include_once 'includes/head.php' ?>

<body>



  <!-- ======= Top Bar ======= -->
  <?php include_once 'includes/topbar.php' ?>

  <!-- ======= Header ======= -->


  <?php include_once 'includes/header.php'; ?>

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php include_once 'includes/hero.php' ?>
  <!-- End Hero -->

  <main id="main" class="mt-5">
      <div class="message text-center">
          <?php include('includes/message.php'); ?>
      </div>


    <?= $content ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once 'includes/footer.php' ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= ACCESS ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= ACCESS ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= ACCESS ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= ACCESS ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= ACCESS ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= ACCESS ?>/js/main.js"></script>

</body>

</html>