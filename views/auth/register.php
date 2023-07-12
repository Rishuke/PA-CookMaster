<section id="" class="contact mt-5 pt-5">
  <div class="container">

    <div class="section-title">
      <h2><span>Inscription</span></h2>
    </div>
  </div>

  <div class="container mt-5">
    <form action="/register" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Nom</label>
          <input type="text" name="lastname" class="form-control" placeholder="Votre nom" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Prénom</label>
          <input type="text" name="firstname" class="form-control" placeholder="Votre prénom" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Sexe</label>
          <select name="gender" class="form-control">
            <option selected disabled value="">Votre genre</option>
            <option value="Male">Masculin</option>
            <option value="Female">Féminin</option>
          </select>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Statut</label>
          <select name="type" class="form-control" required>
            <option disabled selected value="">Votre rôle</option>
            <option value="Customer">Client</option>
            <option value="Chief">Chef</option>
            <option value="Instructor">Formateur</option>
            <option value="Delivery">Livreur</option>
          </select>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Numéro de téléphone</label>
          <input type="text" name="phonenumber" placeholder="Votre numéro de téléphone" class="form-control">
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Date de naissance</label>
          <?php $minDate = date('d-m-Y', strtotime('-18 years')); ?>
          <input type="date" name="date_of_birth" class="form-control">
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Email</label>
          <input type="email" name="email" id="email" placeholder="Votre email" class="form-control" required>
        </div>

        <div class="col-md-6 form-group mt-3 mt-md-0">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Votre mot de passe" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" name="profile_picture" class="form-control">
        </div>
      </div>


      <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
      </div>
      <div class="text-center"><button type="submit">S'inscrire</button></div>
    </form>
  </div>
</section>