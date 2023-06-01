<?php 
      session_start();

?>

<!DOCTYPE html>
<html lang="en">
 <!-- Head Section -->

 <?php include ('includes/head.php'); ?>
 <!-- End Head Section -->


<body>
  <!-- Nav Section -->
  <?php include ('includes/nav.php'); ?>
  <!-- End Nav Section -->
  <section id="form" data-aos="fade-down">
    <div class="container">
      <h3 class="form__title">
        Register
      </h3>
      <div class="message">
         <?php
            include('includes/message.php');
          ?>
      </div>
      <div class="form__wrapper">
        <form method="POST" action="register_verif.php" enctype="multipart/form-data">
          <div class="form__group">
            <label>First Name</label>
            <input type="text" name="firstname" required>
          </div>
          <div class="form__group">
            <label>Last Name</label>
            <input type="text" name="lastname" required>
          </div>
          <div class="form__group">
            <label>Sexe</label>
            <select name="sexe">
              <option selected disabled>Choose</option>
              <option value="M">Male</option>
              <option value="F">Female</option>
            </select>
          </div>
          <div class="form__group">
            <label>Statut</label>
            <select name="statut">
              <option selected disabled>Choose</option>
              <option value="Customer">Customer</option>
              <option value="Chief">Chief</option>
              <option value="Teacher">Teacher</option>
              <option value="Delivery">Delivery Person</option>
            </select>
          </div>
          <div class="form__group">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" required>
          </div>
          <div class="form__group">
            <label>Email</label>
            <input type="email" name="email" required>
          </div>
          <div class="form__group">
            <label>Password</label>
            <input type="password" name="password" required>
          </div>
          <div class="form__group">
            <label>Image</label>
            <input type="file" id="image" name="image">
          </div>
         
          <button type="submit" class="btn primary-btn">Sign up</button>
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

</html>