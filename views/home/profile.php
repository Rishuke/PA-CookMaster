<div class="container">
  <div class="pagetitle">
    <h1>Profil</h1>
    <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav> -->
  </div><!-- End Page Title -->



    <!--   --><?php //= var_dump($_SESSION['user']) ?><!-- -->
  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">


            <?php foreach ($params['infosUser'] as $user) : ?>
              <img src="uploads/<?= $user->profile_picture ? $user->profile_picture : 'pp_neutre.jpg' ?>" alt="Profile" class="rounded-circle">
              <h2><?= $user->firstname . ' ' . $user->lastname ?></h2>
              <h3><?= $user->type ?></h3>
            <?php endforeach ?>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview">Profil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#edit">Modifier profil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#settings">Paramètres</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#change-password">Modifier votre mot de passe</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="overview">
                <h5 class="card-title">Détails de profil</h5>
                <?php foreach ($params['infosUser'] as $user) : ?>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom</div>
                    <div class="col-lg-9 col-md-8"><?= $user->lastname ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Prénom</div>
                    <div class="col-lg-9 col-md-8"><?= $user->firstname ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Genre</div>
                    <div class="col-lg-9 col-md-8"><?= $user->gender ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Date de naissance</div>
                    <div class="col-lg-9 col-md-8"><?= isset($user->date_of_birth) ? date('d/m/Y', strtotime($user->date_of_birth)) : '' ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8"><?= $user->type ?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Téléphone</div>
                    <div class="col-lg-9 col-md-8"><?= $user->phonenumber ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?= $user->email ?></div>
                  </div>
                <?php endforeach ?>


                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Adresse</h5>


                  <?php foreach ($params['infosUserAddress'] as $address) : ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Rue</div>
                      <div class="col-lg-9 col-md-8">
                        <?= isset($address->street) ? $address->street : '' ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Code postal</div>
                      <div class="col-lg-9 col-md-8">
                        <?= isset($address->zipcode) ? $address->zipcode : '' ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Ville</div>
                      <div class="col-lg-9 col-md-8">
                        <?= isset($address->city) ? $address->city : '' ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Pays</div>
                      <div class="col-lg-9 col-md-8">
                        <?= isset($address->country) ? $address->country : ''  ?>
                      </div>
                    </div>
                  <?php endforeach ?>

                </div>

              </div>


              <div class="tab-pane fade profile-edit pt-3" id="edit">

                <!-- Profile Edit Form -->
                <form action="/profile/edit-profile" method="post" role="form">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image de profil</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="uploads/<?= $user->profile_picture ? $user->profile_picture : 'pp_neutre.jpg' ?>" alt="Profile">
                      <div class="pt-2">
                        <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="lastname" type="text" class="form-control" id="lastname" value="<?= $user->lastname ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="firstname" class="col-md-4 col-lg-3 col-form-label">Prénom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="firstname" type="text" class="form-control" id="firstname" value="<?= $user->firstname ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Rue</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="rue" type="text" class="form-control" id="Address" value="<?= isset($address->street) ? $address->street : '' ?>">
                    </div>

                  </div>


                  <div class="row mb-3">
                    <label for="Code" class="col-md-4 col-lg-3 col-form-label">Code Postal</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="zipcode" type="text" class="form-control" id="Address" value="<?= isset($address->zipcode) ? $address->zipcode : '' ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Code" class="col-md-4 col-lg-3 col-form-label">Ville</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="city" type="text" class="form-control" id="Address" value="<?= isset($address->city) ? $address->city : '' ?>">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="Code" class="col-md-4 col-lg-3 col-form-label">Pays</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="Address" value="<?= isset($address->country) ? $address->country : ''  ?>">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phonenumber" type="text" class="form-control" id="Phone" value="<?= $user->phonenumber ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="<?= $user->email ?>">
                    </div>
                  </div>


                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>

                </form>

              </div><!-- End Profile Edit Form -->

              <div class="tab-pane fade pt-3" id="settings">

                <!-- Settings Form -->
                <form>

                  <div class="row mb-3">
                    <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="changesMade" checked>
                        <label class="form-check-label" for="changesMade">
                          Changes made to your account
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" checked>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers">
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="change-password">
                <!-- Change Password Form -->
                <form action="/profile/change-password" method="post" role="form">

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe </label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newPassword" type="password" class="form-control" id="newPassword" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer mot de passe</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="confirmPassword" type="password" class="form-control" id="renewPassword" required>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>



</div>