<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
 <!-- Head Section -->

 <?php include ('includes/head.php'); ?>
 <link rel="stylesheet" href="./css/home.css">
 <!-- End Head Section -->


<body>
  <!-- Nav Section -->
  <?php include ('includes/admin_nav.php'); ?>
  <!-- End Nav Section -->
 

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

  <!-- Footer Section -->

  <?php include ('includes/footer.php'); ?>
  
   <!-- End Footer Section -->

  <!-- aos script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom script -->
  <script src="./main.js"></script>
</body>

</html>


