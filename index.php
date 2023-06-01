<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
 <!-- Head Section -->

 <?php include ('includes/head.php'); ?>
 <link rel="stylesheet" href="./css/home.css">
 <!-- End Head Section -->


<body>
  <!-- Nav Section -->
  <?php include ('includes/nav.php'); ?>
  <!-- End Nav Section -->
  <!-- Hero Section -->
  <section id="hero">
    <div class="container">
      <div class="hero__wrapper">
        <div class="hero__left" data-aos="fade-left">
          <div class="hero__left__wrapper">

            <h1 class="hero__heading">The flavor of tradition</h1>
            <p class="hero__info">
              We are a multi-cuisine restaurant offering a wide variety of food experience in both casual and fine
              dining
              environment.
            </p>
            <div class="button__wrapper">
              <a href="./menu.php" class="btn primary-btn">Explore Menu</a>
              <a href="./booking.php" class="btn">Book Table</a>
            </div>
          </div>
        </div>
        <div class="hero__right" data-aos="fade-right">
          <div class="hero__imgWrapper">
            <img src="./images/heroImg.png">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->
  <!-- Store Info Section -->
  <?php include ('includes/store-info.php'); ?>
  <!-- End Store Info Section -->
  <!-- Our Specials Section -->
  <section id="ourSpecials" data-aos="fade-up">
    <div class="container">
      <div class="ourSpecials__wrapper">
        <div class="ourSpecials__left">
          <div class="ourSpecials__item">
            <div class="ourSpecials__item__img">
              <img src="./images/food-3.png" alt="food img">
            </div>
            <h2 class="ourSpecials__item__title">
              Sweet Potato Fries Bowl
            </h2>
            <h3 class="ourSpecials__item__price">
              $18
            </h3>
            <div class="ourSpecials__item__stars">
              <img src="./images/3star.png" alt="3 stars">
            </div>
            <p class="ourSpecials__item__text">
              These Sweet Potato Fries bowl are a glorious, messy plate of goodness. Crispy sweet potato fries loaded
              with lots of fresh summer vegetables and a lime ranch. By adding a seasoning blend with chipotle powder,
              garlic, and onion, these spicy sweet potato fries are full of flavor.
            </p>
          </div>
          <div class="ourSpecials__item">
            <div class="ourSpecials__item__img">
              <img src="./images/food-1.png" alt="food img">
            </div>
            <h2 class="ourSpecials__item__title">
              Vegan Salad bowl
            </h2>
            <h3 class="ourSpecials__item__price">
              $18
            </h3>
            <div class="ourSpecials__item__stars">
              <img src="./images/3star.png" alt="3 stars">
            </div>
            <p class="ourSpecials__item__text">
              Vegan salad bowl are immensely satisfying with any combination of whole grains, pulses, noodles, raw or
              cooked fruits, and veggies all topped off with a delicious sauce or dressing – each bite is an explosion
              of flavors and textures.
            </p>
          </div>
        </div>
        <div class="ourSpecials__right">
          <h2 class="ourSpecials__title">
            Our Specials
          </h2>
          <p class="ourSpecials__text">
            All of our food is prepared daily at our restaurants to ensure the highest quality, freshest meals are
            delivered to our customers
          </p>
          <a href="./booking.php" class="btn primary-btn">Book Table</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Our Specials Section -->
  <!-- Top Dishes -->
  <section id="dishGrid" data-aos="fade-up">
    <div class="container">
      <h2 class="dishGrid__title">
        Top Dishes
      </h2>
      <div class="dishGrid__wrapper">
        <div class="dishGrid__item">
          <div class="dishGrid__item__img">
            <img src="./images/food-1.png" alt="food img">
          </div>
          <div class="dishGrid__item__info">
            <h3 class="dishGrid__item__title">
              Vegan Salad bowl
            </h3>
            <h3 class="dishGrid__item__price">$12</h3>
            <div class="dishGrid__item__stars">
              <img src="./images/3star.png" alt="3 star">
            </div>
          </div>
        </div>
        <div class="dishGrid__item">
          <div class="dishGrid__item__img">
            <img src="./images/food-2.png" alt="food img">
          </div>
          <div class="dishGrid__item__info">
            <h3 class="dishGrid__item__title">
              Vegan Pesto Zoodles
            </h3>
            <h3 class="dishGrid__item__price">$12</h3>
            <div class="dishGrid__item__stars">
              <img src="./images/3star.png" alt="3 star">
            </div>
          </div>
        </div>
        <div class="dishGrid__item">
          <div class="dishGrid__item__img">
            <img src="./images/food-7.png" alt="food img">
          </div>
          <div class="dishGrid__item__info">
            <h3 class="dishGrid__item__title">
              Hot Green Bowl
            </h3>
            <h3 class="dishGrid__item__price">$12</h3>
            <div class="dishGrid__item__stars">
              <img src="./images/3star.png" alt="3 star">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Top Dishes -->
  <!-- Discount Section -->
  <section id="discount" data-aos="fade-up">
    <div class="container">
      <div class="discount__wrapper">
        <div class="discount__images">
          <div class="discount__img1">
            <img src="./images/food-5.png" alt="Food img">
          </div>
          <div class="discount__img2">
            <img src="./images/food-4.png" alt="Food img">
          </div>
          <div class="discount__img3">
            <img src="./images/food-3.png" alt="Food img">
          </div>
        </div>
        <div class="discount__info">
          <h3 class="discount__text">20% OFF</h3>
          <h3 class="discount__title">Demo Dish For Discount</h3>
          <h3 class="discount__price">
            <span class="discount__oldPrice">$45</span>
            <span class="discount__newPrice">$35</span>
          </h3>
          <div class="discount__stars">
            <img src="./images/3star.png" alt="3 stars">
          </div>
          <a class="btn primary-btn" href="./booking.php">Book Table</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Discount Section -->
  <!-- Events Media -->
  <section id="eventsMedia" data-aos="fade-up">
    <div class="container">
      <div class="eventsMedia__wrapper">
        <div class="eventsMedia__1">
          <img src="./images/eventsMedia1.png" alt="events">
          <a href="#" class="eventsMedia__1__playButton">
            <img src="./images/playIcon.svg" alt="play button">
          </a>
        </div>
        <div class="eventMedia__2">
          <img src="./images/eventsMedia2.png" alt="events">
        </div>
      </div>
    </div>
  </section>
  <!-- End Events Media -->
  <!-- Events Info -->
  <section id="eventsInfo" data-aos="fade-up">
    <div class="container">
      <div class="eventsInfo__wrapper">
        <div class="eventsInfo__left">
          <div class="eventsInfo__item">
            <div class="eventsInfo__item__img">
              <img src="./images/event-corporate.png" alt="corporate events">
            </div>
            <div class="eventsInfo__item__info">
              <h2 class="eventsInfo__item__title">Corporate Events</h2>
              <p class="eventsInfo__item__text">
                Shaif's Cuisine is the perfect venue for your corporate events. We specialize in private parties.
              </p>
            </div>
          </div>
          <div class="eventsInfo__item">
            <div class="eventsInfo__item__img">
              <img src="./images/event-weedings.png" alt="wedding events">
            </div>
            <div class="eventsInfo__item__info">
              <h2 class="eventsInfo__item__title">Weddings</h2>
              <p class="eventsInfo__item__text">
                Shaif's Cuisine offers an intimately unique wedding experience set in a spectacular setting that is
                sophisticated and comfortable.
              </p>
            </div>
          </div>
        </div>
        <div class="eventsInfo__right">
          <h2 class="eventsInfo__title">Book For Events</h2>
          <p class="eventsInfo__text">Book your private event or corporate function at Shaif's cuisine to experience a
            truly unique experience.</p>
          <a href="./contact.php" class="btn primary-btn">Contact Now</a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Events Info -->
  <!-- Why Us section -->
  <section id="whyUs">
    <div class="container">
      <div class="whyUs__wrapper">
        <div class="whyUs__left" data-aos="fade-right">
          <h2 class="whyUs__title">
            Why Choose Our Food
          </h2>
          <p class="whyUs__text">
            Quality of Service, Food, Ambiance, and Value of Money are the primary elements for choosing a restaurant.
            Shaif's Cuisine is one of the most exquisite fine-dinning restaurant in Chittagong cities with a captivating
            view of GEC Hills, perfect ambiance, and scrumptious food.
          </p>
        </div>
        <div class="whyUs__right" data-aos="fade-left">
          <div class="whyUs__items__wrapper">
            <div class="whyUs__item">
              <div class="whyUs__item__icon">
                <img src="./images/whyUs-icon1.svg" alt="quality Food">
              </div>
              <p class="whyUs__item__text">Quality Food</p>
            </div>
            <div class="whyUs__item">
              <div class="whyUs__item__icon">
                <img src="./images/whyUs-icon2.svg" alt="Classical taste">
              </div>
              <p class="whyUs__item__text">Classical taste</p>
            </div>
            <div class="whyUs__item">
              <div class="whyUs__item__icon">
                <img src="./images/whyUs-icon3.svg" alt="Skilled chef">
              </div>
              <p class="whyUs__item__text">Skilled chef</p>
            </div>
            <div class="whyUs__item">
              <div class="whyUs__item__icon">
                <img src="./images/whyUs-icon4.svg" alt="Best service">
              </div>
              <p class="whyUs__item__text">Best service</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Why Us section -->
  <!-- Testimonial Section -->
  <section id="testimonial">
    <div class="container">
      <div class="testimonial__wrapper" data-aos="fade-up">
        <h2 class="testimonial__title">What Our Customers Say</h2>
        <div class="testimonial__items__wrapper">
          <div class="testimonial__item">
            <div class="testimonial__item__img">
              <img src="./images/testimonial_img1.png" alt="Sayed Ahmed">
            </div>
            <div class="testimonial__item__info">
              <h3 class="testimonial__item__name">Sayed Ahmed</h3>
              <div class="testimonial__item__stars">
                <img src="./images/3star.png" alt="3 star">
              </div>
              <p class="testimonial__item__text">
                “Visited Wicookin with friends last Sunday. Really lovely meal and very warm welcome – we would
                recommend this lovely restaurant and will try to go back again”
              </p>
            </div>
          </div>
          <div class="testimonial__item">
            <div class="testimonial__item__img">
              <img src="./images/testimonial_img1.png" alt="Sayed Ahmed">
            </div>
            <div class="testimonial__item__info">
              <h3 class="testimonial__item__name">Arfan</h3>
              <div class="testimonial__item__stars">
                <img src="./images/3star.png" alt="3 star">
              </div>
              <p class="testimonial__item__text">
                "from start to finish, lovely experience. Hostess very pleasant, wait staff john was wonderful and
                attentive, food plentiful and delicious, desserts out of this world"
              </p>
            </div>
          </div>
          <div class="testimonial__item">
            <div class="testimonial__item__img">
              <img src="./images/testimonial_img1.png" alt="Sayed Ahmed">
            </div>
            <div class="testimonial__item__info">
              <h3 class="testimonial__item__name">Fahim & Nishat</h3>
              <div class="testimonial__item__stars">
                <img src="./images/3star.png" alt="3 star">
              </div>
              <p class="testimonial__item__text">
                “A warm and friendly welcome with fantastic customer service. Always great, tasty food served piping
                hot- just the way we love it . Would definitely recommend. We have been repeatedly and it's consistently
                exceeded our expectations"
              </p>
            </div>
          </div>
          <div class="testimonial__item">
            <div class="testimonial__item__img">
              <img src="./images/testimonial_img1.png" alt="Sayed Ahmed">
            </div>
            <div class="testimonial__item__info">
              <h3 class="testimonial__item__name">Hussain</h3>
              <div class="testimonial__item__stars">
                <img src="./images/3star.png" alt="3 star">
              </div>
              <p class="testimonial__item__text">
                “I would just like to say thank you for the excellent service we received in your restaurant last night.
                Although the place was very busy we still had an excellent time and really appreciated the live
                entertainment too!“
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Testimonial Section -->
  <!-- Newsletter Section -->
  <?php include ('includes/newsletters.php'); ?>
  <!-- End Newsletter Section -->

  <!-- Footer Section -->

  <?php include ('includes/footer.php'); ?>
  
   <!-- End Footer Section -->

  <!-- aos script -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- custom script -->
  <script src="./main.js"></script>
</body>

</html>