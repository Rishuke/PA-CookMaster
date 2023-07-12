<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2><span>Contactez</span>-Nous</h2>
      <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
    </div>
  </div>

  <div class="map">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83919.59801513135!2d2.3454660999999997!3d48.857079250000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x5294b40ec9d30600!2s4th%20arrondissement%20of%20Paris%2C%20Paris%2C%20France!5e0!3m2!1sen!2sus!4v1623601240004!5m2!1sen!2sus" frameborder="0" allowfullscreen></iframe>

  </div>

  <div class="container mt-5">

    <div class="info-wrap">
      <div class="row">
        <div class="col-lg-3 col-md-6 info">
          <i class="bi bi-geo-alt"></i>
          <h4>Emplacement:</h4>
          <p>4ème arrondissement<br>Paris, FRANCE</p>
        </div>

        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
          <i class="bi bi-clock"></i>
          <h4>Créneaux Horaires:</h4>
          <p>Lundi-Dimanche:<br>09h00 - 23h00</p>
        </div>

        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
          <i class="bi bi-envelope"></i>
          <h4>Email:</h4>
          <p>info@wicookin.fr<br>contact@wicookin.fr</p>
        </div>

        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
          <i class="bi bi-phone"></i>
          <h4>Appel:</h4>
          <p>+33 751380075<br>+33 748669714</p>
        </div>
      </div>
    </div>

    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
      <div class="row">
        <div class="col-md-6 form-group">
          <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
        </div>
        <div class="col-md-6 form-group mt-3 mt-md-0">
          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
        </div>
      </div>
      <div class="form-group mt-3">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
      </div>
      <div class="form-group mt-3">
        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
      </div>
      <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
      </div>
      <div class="text-center"><button type="submit">Send Message</button></div>
    </form>

  </div>
</section>
<!-- End Contact Section -->