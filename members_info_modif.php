<?php
session_start();
include ('includes/db.php');
if(isset ($_GET['id']) && !empty ($_GET['id'])){
    $getId=$_GET['id'];
    $req='SELECT num_mem, nom_mem, pren_mem, email, statut, num_tel FROM membres WHERE num_mem= ?';
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
        Modify Members Info
      </h3>
      <div class="message">
         <?php
            include('includes/message.php');
          ?>
      </div>
      <div class="form__wrapper">
        <form method="POST" action="members_info_update.php" enctype="multipart/form-data">
          <div class="form__group">
          <input type="hidden" name="id"  class="form-control" value="<?=$user['num_mem'];?>">
            <label>First Name</label>
            <input type="text" name="firstname" value="<?=$user['pren_mem']?>">
          </div>
          <div class="form__group">
            <label>Last Name</label>
            <input type="text" name="lastname" value="<?=$user['nom_mem']?>">
          </div>
          <div class="form__group">
            <label>Statut</label>
            <select name="statut">
              <option value="Customer" <?=($user['statut']=='Customer')?'selected':'';?>>Customer</option>
              <option value="Chief" <?=($user['statut']=='Chief')?'selected':'';?>>Chief</option>
              <option value="Teacher" <?=($user['statut']=='Teacher')?'selected':'';?>>Teacher</option>
              <option value="Delivery" <?=($user['statut']=='Delivery')?'selected':'';?>>Delivery Person</option>
            </select>
          </div>
          <div class="form__group">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" value="<?=$user['num_tel']?>">
          </div>
          <div class="form__group">
            <label>Email</label>
            <input type="email" name="email" value="<?=$user['email']?>">
          </div>
          <button type="submit" class="btn primary-btn">Update</button>
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