<?php
session_start();
include ('includes/db.php');
if(isset ($_GET['id']) && !empty ($_GET['id'])){
    $getId=$_GET['id'];
    $req='SELECT id, nom, prenom, email, sexe, statut FROM utilisateur WHERE id= ?';
    $recupUser = $bdd->prepare($req);
    $recupUser-> execute(array($getId));
    if ($recupUser ->rowCount()>0){
        $user = $recupUser->fetch(PDO::FETCH_ASSOC);
      
    }else{
        echo "Aucun membre n'a été trouvé";
    }
}

else{
    echo "L'identifiant n'a pas été récupéré";
}

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
        Modify Admin Info
      </h3>
      <div class="message">
         <?php
            include('includes/message.php');
          ?>
      </div>
      <div class="form__wrapper">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form__group">
            <label>First Name</label>
            <input type="text" name="firstname">
          </div>
          <div class="form__group">
            <label>Last Name</label>
            <input type="text" name="lastname">
          </div>
          <div class="form__group">
            <label>Email</label>
            <input type="email" name="email">
          </div>
         
          <button type="submit" class="btn primary-btn">Add</button>
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