<?php 
      session_start();
?>

<!DOCTYPE html>
<html lang="en">
 <!-- Head Section -->

 <?php include  'includes/head.php'; ?>
 <!-- End Head Section -->


<body>
  <!-- Nav Section -->
  <?php include 'includes/nav.php'; ?>
  <!-- End Nav Section -->
  <section id="form" data-aos="fade-down">
    <div class="container">
      <h3 class="form__title">
        Login
      </h3>
      <div class="message">
         <?php
           include('includes/message.php');
          ?>
        </div>
      <div class="form__wrapper">
        <form method="POST" action="login_verif.php" enctype="multipart/form-data">
          
          <div class="form__group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form__group">
            <label for="subject">Password</label>
            <input type="password" id="subject" name="mdp" required>
          </div>
          
          <button type="submit" class="btn primary-btn">Log in</button>
        </form>
      </div>
    </div>
  </section>
  

  <!-- Footer Section -->

  <?php include 'includes/footer.php'; ?>
  
   <!-- End Footer Section -->

  <!-- aos script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom script -->
  <script src="./main.js"></script>
</body>

</php>