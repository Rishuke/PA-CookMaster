<?php session_start();
if(!isset($_SESSION['email'])){
	header('location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <?php
        $title='Membres';
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
                    <h1>Membres</h1>
                        <?php include('includes/db.php');
                        $q = 'SELECT num_mem, nom_mem, pren_mem, email, statut, confirm FROM membres';
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
                                <th>Statut</th>
                                <th>Confirmer</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                foreach($results as $user){
                                    echo '<tr>';
                                    echo '<td>' . $user['num_mem'] . '</td>';
                                    echo '<td>' . $user['nom_mem'] . '</td>';
                                    echo '<td>' . $user['pren_mem'] . '</td>';
                                    echo '<td>' . $user['email'] . '</td>';
                                    echo  '<td>'. $user['statut'] . '</td>';
                                    echo  ($user['confirm']==1)?'<td>OUI</td>' : '<td>NON <a href="confirm.php?id=' . $user['num_mem'] . '" class="btn btn-sm me-2 btn-success">Confirmer</a></td>';
                                    echo '<td>';
                                    echo '<a href="form_modification.php?id=' . $user['num_mem'] . '" class="btn btn-sm me-2 btn-primary">Modifier</a>';
                                    echo '<a href="delete.php?id=' . $user['num_mem'] . '" class="btn btn-sm me-2 btn-danger">Supprimer</a>';
                                    echo '<a href="banish.php?id=' . $user['num_mem'] . '" class="btn btn-sm me-2 btn-danger">Bannir</a>';
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