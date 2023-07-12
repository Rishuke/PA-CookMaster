<main class="container mt-5">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Abonnement Starter - <strong>113.00€ / an</strong></h3>
                </div>
                <div class="card-body">
                    <form action="#" method="post" id="subscription-form">
                        <div class="form-group mb-3">
                            <label for="cardholderName">Nom du titulaire</label>
                            <input type="text" name="cardholderName" id="cardholderName" class="form-control" required="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="cardholderEmail" id="cardholderEmail" class="form-control" value="<?= $_SESSION['user']['email'] ?>" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Numéro de carte</label>
                            <div id="card-number-element" class="form-control StripeElement StripeElement--empty" style="border: 2px solid #FF9B90; border-radius: 10px 10px 0 0;padding: 10px;">
                                <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe name="__privateStripeFrame3916" frameborder="0" allowtransparency="true" scrolling="no" role="presentation" allow="payment *" src="https://js.stripe.com/v3/elements-inner-card-2a31e05a707487ddc8378ee3db0cb39b.html#wait=false&amp;mids[guid]=NA&amp;mids[muid]=7d73f385-5f69-490e-9bc8-118ce647123061a12d&amp;mids[sid]=d1a56157-0a42-4d7a-9523-f4e1c595285ce280c6&amp;style[base][color]=%2332325d&amp;style[base][fontFamily]=%22Roboto%22%2C+Helvetica%2C+sans-serif&amp;style[base][fontSmoothing]=antialiased&amp;style[base][fontSize]=16px&amp;style[base][::placeholder][color]=%23aab7c4&amp;placeholder=Num%C3%A9ro+de+carte&amp;rtl=false&amp;componentName=cardNumber&amp;keyMode=test&amp;apiKey=pk_test_51MmwzkAS99IFK7fGaxQiDVqtXoI2qe8lVuChLxYNlPQntNgsip9YxOLpskqeOwHsELqhpo5SauhHsCRa8JayvYtb00Yr7XAv2h&amp;referrer=https%3A%2F%2Fcookorama.fr%2Fsubscribe%2Fstarter%2Fyearly&amp;controllerId=__privateStripeController3911" title="Cadre sécurisé pour la saisie du numéro de carte" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translate(0px) !important; color-scheme: light only !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: -1px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex" style="border-bottom: 2px solid #FF9B90; border-left: 2px solid #FF9B90; border-right: 2px solid #FF9B90; border-radius: 0 0 10px 10px;">
                                <div id="card-expiry-element" class="form-control mr-2 flex-grow-1 StripeElement StripeElement--empty" style="border-right: 2px solid #FF9B90; border-radius: 0 0 0 10px; padding: 10px;">
                                    <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe name="__privateStripeFrame3917" frameborder="0" allowtransparency="true" scrolling="no" role="presentation" allow="payment *" src="https://js.stripe.com/v3/elements-inner-card-2a31e05a707487ddc8378ee3db0cb39b.html#wait=false&amp;mids[guid]=NA&amp;mids[muid]=7d73f385-5f69-490e-9bc8-118ce647123061a12d&amp;mids[sid]=d1a56157-0a42-4d7a-9523-f4e1c595285ce280c6&amp;style[base][color]=%2332325d&amp;style[base][fontFamily]=%22Roboto%22%2C+Helvetica%2C+sans-serif&amp;style[base][fontSmoothing]=antialiased&amp;style[base][fontSize]=16px&amp;style[base][::placeholder][color]=%23aab7c4&amp;placeholder=MM%2FAA&amp;rtl=false&amp;componentName=cardExpiry&amp;keyMode=test&amp;apiKey=pk_test_51MmwzkAS99IFK7fGaxQiDVqtXoI2qe8lVuChLxYNlPQntNgsip9YxOLpskqeOwHsELqhpo5SauhHsCRa8JayvYtb00Yr7XAv2h&amp;referrer=https%3A%2F%2Fcookorama.fr%2Fsubscribe%2Fstarter%2Fyearly&amp;controllerId=__privateStripeController3911" title="Cadre sécurisé pour la saisie de la date d'expiration" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translate(0px) !important; color-scheme: light only !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: -1px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                                </div>
                                <div id="card-cvc-element" class="form-control flex-grow-1 StripeElement StripeElement--empty" style="border-radius: 0 0 10px 0; padding: 10px;">
                                    <div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe name="__privateStripeFrame3918" frameborder="0" allowtransparency="true" scrolling="no" role="presentation" allow="payment *" src="https://js.stripe.com/v3/elements-inner-card-2a31e05a707487ddc8378ee3db0cb39b.html#wait=false&amp;mids[guid]=NA&amp;mids[muid]=7d73f385-5f69-490e-9bc8-118ce647123061a12d&amp;mids[sid]=d1a56157-0a42-4d7a-9523-f4e1c595285ce280c6&amp;style[base][color]=%2332325d&amp;style[base][fontFamily]=%22Roboto%22%2C+Helvetica%2C+sans-serif&amp;style[base][fontSmoothing]=antialiased&amp;style[base][fontSize]=16px&amp;style[base][::placeholder][color]=%23aab7c4&amp;placeholder=CVC&amp;rtl=false&amp;componentName=cardCvc&amp;keyMode=test&amp;apiKey=pk_test_51MmwzkAS99IFK7fGaxQiDVqtXoI2qe8lVuChLxYNlPQntNgsip9YxOLpskqeOwHsELqhpo5SauhHsCRa8JayvYtb00Yr7XAv2h&amp;referrer=https%3A%2F%2Fcookorama.fr%2Fsubscribe%2Fstarter%2Fyearly&amp;controllerId=__privateStripeController3911" title="Cadre sécurisé pour la saisie du code de sécurité CVC" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; transform: translate(0px) !important; color-scheme: light only !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: -1px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div>
                                </div>
                            </div>
                        </div>

                        <div id="card-errors" role="alert"></div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">
                            <span id="sendButton">Payer maintenant <i class="fa-solid fa-lock fa-xl" style="margin-left: 25px; color: #ffffff;"></i></span>
                            <img src="https://cookorama.fr/ressources/images/loader_circle.gif" id="loader" style="width: 30px; height: 30px; display: none; margin: 0 auto;">
                        </button>

                        <input type="hidden" name="priceId" value="price_1MtELxAS99IFK7fGR6gRyz8p">

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>