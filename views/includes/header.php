<header id="header" class="fixed-top d-flex align-items-center ">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <div class="logo me-auto">
      <h1><a href="/">Wicookin</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="<?= ACCESS ?>/img/logo_wicookin.png" alt="" class="img-fluid"></a>-->
    </div>


    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) : ?>
      <nav id="navbar" class="navbar order-last order-lg-0 d-flex align-items-center">
        <ul>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/' ? ' active' : '' ?>" href="/">Accueil</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/menu' ? ' active' : '' ?>" href="/menu">Menu</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/subscription' ? ' active' : '' ?>" href="/subscription">Abonnement</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/events' ? ' active' : '' ?>" href="/events">Evènements</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/chefs' ? ' active' : '' ?>" href="/chefs">Chefs</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/contact' ? ' active' : '' ?>" href="/contact">Contact</a></li>



          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <!-- <i class="bi bi-bell"></i> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
              </svg>
              <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>Lorem Ipsum</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>30 min. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                  <h4>Atque rerum nesciunt</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>1 hr. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                  <h4>Dicta reprehenderit</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>4 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
              </li>

            </ul><!-- End Notification Dropdown Items -->

          </li>

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <!-- <i class="bi bi-chat-left-text bi-3x"></i> -->
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
              </svg>
              <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="dropdown-footer">
                <a href="#">Show all messages</a>
              </li>

            </ul><!-- End Messages Dropdown Items -->

          </li><!-- End Messages Dropdown -->



          </li><!-- End Messages Dropdown -->

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg>

            </a>

          </li>

          <li class="dropdown"> <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="uploads/<?= $_SESSION['user']['profile_picture'] ? $_SESSION['user']['profile_picture'] : 'pp_neutre.jpg' ?>" alt="Profile" class="rounded-circle"><span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?></span></i></a>
            <ul>
              <li class="dropdown-header text-center">
                <h6><?= $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']; ?></h6>
                <span><?= $_SESSION['user']['type'] ?></span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a href="/profile">
                  <i class="bi bi-person"></i>
                  <span>Profil</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bi bi-gear"></i>
                  <span>Paramètres</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bi bi-question-circle"></i>
                  <span>Aide</span>
                </a>
              </li>
              <li>
                <a href="/logout">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Déconnexion</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>



        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    <?php else : ?>
      <nav id="navbar" class="navbar order-last order-lg-0 d-flex align-items-center">
        <ul>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/' ? ' active' : '' ?>" href="/">Accueil</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/menu' ? ' active' : '' ?>" href="/menu">Menu</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/events' ? ' active' : '' ?>" href="/events">Evènements</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/chefs' ? ' active' : '' ?>" href="/chefs">Chefs</a></li>
          <li><a class="nav-link scrollto<?= $_SERVER['REQUEST_URI'] == '/contact' ? ' active' : '' ?>" href="/contact">Contact</a></li>

        </ul>



        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <a class="book-a-table-btn scrollto" href="/register">Inscription</a>
      <a class="book-a-table-btn scrollto" href="/login">Connexion</a>
    <?php endif; ?>


  </div>
</header>