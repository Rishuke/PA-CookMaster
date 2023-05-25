<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('location: index.php');
        exit;
    }

    require 'functions/compteur.php';
  
    $annee = (int)date('Y');
    $annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
    

    $mois = [
        '01' => 'Janvier',
        '02' => 'Février',
        '03' => 'Mars',
        '04' => 'Avril',
        '05' => 'Mai',
        '06' => 'Juin',
        '07' => 'Juillet',
        '08' => 'Août',
        '09' => 'Septembre',
        '10' => 'Octobre',
        '11' => 'Novembre',
        '12' => 'Décembre'
    ];
    $mois_selection = empty($_GET['mois']) ? null : (int)$_GET['mois'];

    if( $annee_selection && $mois_selection){
        $total = nombres_vues_mois($annee_selection, $mois_selection);
        $detail= nombres_vues_details_mois($annee_selection, $mois_selection);
    }else {
        $total = nombres_vues();
    }

?>

<!DOCTYPE html>
<html lang="en">

    <?php
        $title='Dashboard';
        include_once 'includes/head.php';
    ?>

    <body>
         
        <?php 

        //Navigation
            include_once 'includes/admin_nav.php';


        //Header
            include_once 'includes/header.php';

        ?>
           
           <main class="pt-4 mb-5">
                <div class="column">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="list-group">
                                <?php for ($i=0; $i<5; $i++): ?>
                                    <a class="list-group-item <?= $annee - $i === $annee_selection ? 'active' : ''; ?>" href="dashboard.php?annee=<?=$annee - $i ?>"><?=$annee - $i ?></a>
                                    <?php if ($annee - $i === $annee_selection): ?>
                                        <div class="list-group">
                                        <?php foreach($mois as $numero => $nom): ?>
                                            <a class="list-group-item <?= $numero == $mois_selection ? 'active' : ''; ?>" href="dashboard.php?annee=<?=$annee_selection ?>&mois=<?= $numero ?>">

                                                <?= $nom ?> 
                                        
                                            </a>

                                        <?php endforeach; ?>
                                    <?php endif ?>
                                <?php endfor ?>
                                

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="card mb-4">

                            <div class="card-body">
                                <strong style="fon-size:3em;"><?= $total ?></strong><br>
                                    Visite<?=$total > 1 ? 's' : ''?> total 

                            </div>

                        </div>

                        <?php if(isset($detail)): ?>
                            <h2>Détails des visites pour le mois</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Jour</th>
                                        <th>Nombre de visites</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($detail as $ligne): ?>
                                        <tr>
                                            <td><?= $ligne['jour'] ?></td>
                                        
                                            <td><?= $ligne['visites'] ?> visite<?= $ligne['visites'] > 1 ? 's' : ''?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </main>
    
        
        <?php
        
            //Footer 
            include_once 'includes/admin_footer.php'

        ?>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>




