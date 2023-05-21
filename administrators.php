<?php session_start();
if(!isset($_SESSION['email'])){
	header('location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <?php
        $title='adminbres';
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
                <a href="form_ajout.php" class="btn btn-lg me-5 btn-outline-primary mb-4">Ajouter un administrateur</a>
                    <h1>Administrateurs</h1>
                        <?php include('includes/db.php');
                        $q = 'SELECT id_admin, nom_admin, pren_admin, email FROM admin';
                        $req = $bdd->query($q);
                        $results = $req->fetchAll(PDO::FETCH_ASSOC); 
                        ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                foreach($results as $user){
                                    echo '<tr>';
                                    echo '<td>' . $user['id_admin'] . '</td>';
                                    echo '<td>' . $user['nom_admin'] . '</td>';
                                    echo '<td>' . $user['pren_admin'] . '</td>';
                                    echo '<td>' . $user['email'] . '</td>';
                                    echo '<td>';
                                    echo '<a href="form_modification.php?id=' . $user['id_admin'] . '" class="btn btn-sm me-2 btn-primary">Modifier</a>';
                                    echo '<a href="delete.php?id=' . $user['id_admin'] . '" class="btn btn-sm me-2 btn-danger">Supprimer</a>';
                                    echo '<a href="banish.php?id=' . $user['id_admin'] . '" class="btn btn-sm me-2 btn-danger">Bannir</a>';
                                    echo '</td>';
                                    echo '</tr>'; 
                                
                                
                                }
                                
                                
                                ?>



                            </tbody>
                        </table>
                </div>
                <div class="message">
                        <?php include('includes/message.php'); ?>

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