<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
 <!-- Head Section -->

<?php 
    include ('includes/head.php'); 
?>
 <link rel="stylesheet" href="./css/home.css">
 <!-- End Head Section -->


<body>
  <!-- Nav Section -->
  <?php include ('includes/admin_nav.php'); ?>
  <!-- End Nav Section -->

    <main class="pt-4 mt-5">
        <div class="container">
            <?php
                include('includes/db.php');

                $q = 'SELECT id_admin, nom_admin, pren_admin, email, sex_admin FROM admin WHERE email = :email';
                $req = $bdd->prepare($q);
                $req->execute([
                                'email' => $_SESSION['email']
                            ]);

                $result = $req->fetch(PDO::FETCH_ASSOC); 
                ?>

                <h3>Image de profil</h3>
                <img style = "display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    width: 300px;
                                    height: 300px" src="uploads/<?= (isset($result['image'])? $result['image']:'pp_neutre.jpg')?>" alt="Image de profil">

                <h3>Nom</h3>
                <p><?= $result['nom_admin'] ?></p>	

                <h3>Prénom</h3>
                <p><?= $result['pren_admin'] ?></p>

                <h3>Email</h3>
                <p><?= $result['email'] ?></p>

                <h3>Sexe</h3>
                <p><?= ($result['sex_admin']=='M')?'<td>Masculin</td>' : '<td>Féminin</td>' ?></p>
                <?php
                    echo '<a href="form_modification.php?id=' . $result['id_admin'] . '" class="btn btn-sm me-2 btn-primary">Modifier</a>';
            ?>
        </div>
    </main>

  <!-- Footer Section -->

  <?php include ('includes/footer.php'); ?>
  
   <!-- End Footer Section -->

  <!-- aos script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom script -->
  <script src="./main.js"></script>
</body>

</html>