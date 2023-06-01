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
                    <h1>Paiement</h1>
                    <div class="message">
                        <?php
                            if(isset($_GET['message']) && !empty($_GET['message']) && isset($_GET['type'])){
                            echo '<div class="alert alert-' . $_GET['type'] . '" role="alert">' . htmlspecialchars($_GET['message']) . '</div>';
                            }
                        ?>
                    </div>
                    <form method="POST" action=" " enctype="multipart/form-data" id="payment_form">
                        <div class="mb-3">
                        
                            <input type="text" name="nom"  class="form-control" placeholder ="Nom" required>
                        </div>

                        <div class="mb-3">
                        
                            <input type="email" name="email"  class="form-control"  placeholder ="Email" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder ="Votre code de carte bleu" data-stripe ="number" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder ="MM" data-stripe ="exp_month" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder ="YY" data-stripe ="exp_year" required>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder ="CVC" data-stripe ="cvc" required>
                        </div>
                       
                        <button type="submit" class="ui button">Payer</button>


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
        <!-- Stripe -->
        <script src="https://js.stripe.com/v3/">
                var stripe = Stripe ('pk_test_51NBWfmJnaR8BBMgbad4VfLRnnTybklrQGI60dIaJ1qGh8Q1njJsFLLea4hp5YyQe8vC4fKEBs3WrJW3qskTocc2D009AYHKyaw');
                var elements = stripe.elements();

                var style = {

                    base : {
                        color : "#32325d",
                        fontFamily : 'Arial, sans-serif',
                        fontSmoothing : "antialiased",
                        fontSize : "16px",
                        "::placeholder" : {
                            color : "#32325d"
                        }
                    }
                };

                var card = elements.create ('card', {style: style});
                card.mount('#card-element');
                
                card.addEventListener('change', function(event){
                    var displayError = document.getElementById('card-errors');
                    if(event.error){
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                }); 

                var form = document.getElementById('payment_form');

                form.addEventListener('submit', function(event){
                    event.preventDefault();

                    stripe.createToken(card).then(function(result){
                        if(result.error){
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            stripeTokenHandler(result.token);
                        }
                    });
                });


                function stripeTokenHandler(token){
                    var form = document.getElementById('payment_form');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    form.submit();
                }
                    
                
        </script>
    </body>
</html>
