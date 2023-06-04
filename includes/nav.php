<link rel="stylesheet" href="css/nav.css">
<div class="nav">
  <div class="container">
    <div class="nav__wrapper">
      <a href="index.php" class="logo">
          <img src="images/logo_wicookin.png" alt="Wicookin">
      </a>
      <nav>
        <div class="nav__icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12" />
                    <line x1="3" y1="6" x2="21" y2="6" />
                    <line x1="3" y1="18" x2="21" y2="18" />
                  </svg>
        </div>
        <div class="nav__bgOverlay"></div>
        <ul class="nav__list">
          <div class="nav__close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="feather feather-x">
                      <line x1="18" y1="6" x2="6" y2="18" />
                      <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
          </div>
          <div class="nav__list__wrapper">

                  <?php 

                      if(isset($_SESSION['email'])){

                        echo '<li><a class="nav__link" href="index.php">Home</a></li>';
                        echo '<li><a class="nav__link" href="menu.php">Menu</a></li>';
                        echo '<li><a class="nav__link" href="about.php">About</a></li>';
                        echo '<li><a class="nav__link" href="contact.php">Contact</a></li>';
                        
                        include('includes/db.php');

                        $q = 'SELECT  nom_mem, pren_mem, image FROM membres WHERE email = :email';
                        $req = $bdd->prepare($q);
                        $req->execute([
                                        'email' => $_SESSION['email']
                                    ]);

                        $result = $req->fetch(PDO::FETCH_ASSOC); 
                        ?>
                      
                            <img class="user-pic" src="uploads/<?= ($result['image']? $result['image']:'pp_neutre.jpg')?>" alt="Image de profil" onclick="toggleMenu()">

                            <div class="sub-menu-wrap" id="subMenu"> 
                              <div class="sub-menu"> 
                                <div class="user-info">
                                  <img src="uploads/<?= ($result['image']? $result['image']:'pp_neutre.jpg')?>" alt="Image de profil">
                                  <h3>
                                    <?= $result['nom_mem'] . ' ' . $result['pren_mem'] ?>
                                  </h3>
                                  <hr>
                                  <a href="profile.php" class="sub-menu-link">
                                    <img src="images/profile.png" alt="">
                                    <p>View Profile</p>
                                    <span>></span>
                                  </a>

                                  <a href="#" class="sub-menu-link">
                                    <img src="images/setting.png" alt="">
                                    <p>Settings & Privacy</p>
                                    <span>></span>
                                  </a>

                                  <a href="#" class="sub-menu-link">
                                    <img src="images/help.png" alt="">
                                    <p>Help & Support</p>
                                    <span>></span>
                                  </a>

                                  <a href="logout.php" class="sub-menu-link">
                                    <img src="images/logout.png" alt="">
                                    <p>Logout</p>
                                    <span>></span>
                                  </a>

                            
                                </div>
                              </div>
                            </div>

                    <?php                
                        

                      }else{


                        echo '<li><a class="nav__link" href="index.php">Home</a></li>';
                        echo '<li><a class="nav__link" href="menu.php">Menu</a></li>';
                        echo '<li><a class="nav__link" href="about.php">About</a></li>';
                        echo '<li><a class="nav__link" href="contact.php">Contact</a></li>';
                        echo '<li><a href="register.php" class="btn primary-btn">Register</a></li>';
                        echo '<li><a href="login.php" class="btn primary-btn">Login</a></li>';


                      }

                  ?>
                  
          </div>
        </ul>
      </nav>
    </div>                   
  </div>  
</div>

<script>

  let subMenu = document.getElementById("subMenu");

  function toggleMenu(){
    subMenu.classList.toggle("open-menu");
  }
</script>