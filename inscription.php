<!DOCTYPE html>
<html lang="en">

    <?php
        $title='Inscription';
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
                    <h1>Inscription</h1>
                    <div class="message">
                        <?php
                            if(isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type'])){
                            echo '<div class="alert alert-' . $_GET['type'] . '" role="alert">' . htmlspecialchars($_GET['message']) . '</div>';
                            }
                        ?>
                    </div>
                    <form method="POST" action="verif_inscription.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Votre nom</label>
                            <input type="text" name="nom"  class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Votre prénom</label>
                            <input type="text" name="prenom"  class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Votre sexe</label>
                            <input class="col-1" type="radio"  name="sexe" value="M" required>
                            <label class="form-label">Masculin</label>
                            <input class="col-1" type="radio" name="sexe" value="F" required>
                            <label class="form-label">Féminin</label>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="birthday">Date de naissance</label>
                            <input type="date" id="birthday" name="birth">
                        </div> -->
                        <div class="mb-3">
                            <label class="form-label">Votre statut</label>
                            <input class="col-1" type="radio"  name="statut" value="Client" required>
                            <label class="form-label">Client</label>
                            <input class="col-1" type="radio" name="statut" value="Chef" required>
                            <label class="form-label">Chef de cuisine</label>
                            <input class="col-1" type="radio"  name="statut" value="Formateur" required>
                            <label class="form-label">Formateur</label>
                            <input class="col-1" type="radio"  name="statut" value="Livreur" required>
                            <label class="form-label">Livreur</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Votre numéro de téléphone</label>
                            <input type="text" name="phone"  class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Votre email</label>
                            <input type="email" name="email"  class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Votre mot de passe</label>
                            <input type="password" class="form-control" name="mdp" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Votre image de profil</label>
                            <input type="file" name="image" class="form-control" accept="image/gif, image/png, image/jpeg">
                            <div class="form-text">Image de 2Mo max.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>


                    </form>

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
