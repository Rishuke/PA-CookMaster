<?php session_start();
if(!isset($_SESSION['email'])){
	header('location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <?php
        $title='Mon profil';
        include_once 'includes/head.php';
    ?>

    <body>
         
        <?php 

        //Navigation
            include_once 'includes/admin_nav.php';


        //Header
            include_once 'includes/header.php';

        ?>
           
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
                        <img src="uploads/<?= (isset($result['image'])? $result['image']:'pp_neutre.jpg')?>" alt="Image de profil">
                        
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
    
        
        <?php
        
            //Footer 
            include_once 'includes/footer.php'

        ?>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
