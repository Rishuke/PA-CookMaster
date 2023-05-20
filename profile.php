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
            include_once 'includes/nav.php';


        //Header
            include_once 'includes/header.php';

        ?>
           
           <main class="pt-4 mt-5">
                <div class="container">
                    <?php
                        include('includes/db.php');

                        $q = 'SELECT num_mem, nom_mem, pren_mem, email, sex_mem, statut FROM membres WHERE email = :email';
                        $req = $bdd->prepare($q);
                        $req->execute([
                                        'email' => $_SESSION['email']
                                    ]);

                        $result = $req->fetch(PDO::FETCH_ASSOC); 
                        ?>

                        <h3>Image de profil</h3>
                        <img src="uploads/<?= (isset($result['image'])? $result['image']:'pp_neutre.jpg')?>" alt="Image de profil">
                        
                        <h3>Nom</h3>
                        <p><?= $result['nom_mem'] ?></p>	
                        
                        <h3>Prénom</h3>
                        <p><?= $result['pren_mem'] ?></p>
                        
                        <h3>Email</h3>
                        <p><?= $result['email'] ?></p>

                        <h3>Sexe</h3>
                        <p><?= ($result['sex_mem']=='M')?'<td>Masculin</td>' : '<td>Féminin</td>' ?></p>

                        <h3>Statut</h3>
                        <p><?= $result['statut'] ?></p>
                        <?php
                            echo '<a href="form_modification.php?id=' . $result['num_mem'] . '" class="btn btn-sm me-2 btn-primary">Modifier</a>';
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
