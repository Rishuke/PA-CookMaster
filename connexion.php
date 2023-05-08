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
           
           <main>
                <div class="container">
                    <h1>Connexion</h1>
                    <div class="message">
                        <?php include('includes/message.php'); ?>
                    </div>
                    <form method="POST" action="verification_connexion.php" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Votre email</label>
                            <input type="email" name="email" class="form-control" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Votre mot de passe</label>
                            <input type="password" name="mdp" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
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
