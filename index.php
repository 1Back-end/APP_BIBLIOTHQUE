<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LIB SYSTEM</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">

  </head>


  <body>
    <main class="main" id="top">

      <section class="bg-primary py-2 d-none d-sm-block">

        <div class="container">
          <div class="row align-items-center">
            <div class="col-auto d-none d-lg-block">
              <p class="my-2 fs--1"><i class="fas fa-map-marker-alt me-3"></i><span>Yaoundé, Cameroun.
              </span></p>
            </div>
            <div class="col-auto ms-md-auto order-md-2 d-none d-sm-block">
              <ul class="list-unstyled list-inline my-2">
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-facebook-f text-900"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-pinterest text-900"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-twitter text-900"></i></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><i class="fab fa-instagram text-900"> </i></a></li>
              </ul>
            </div>
            <div class="col-auto">
              <p class="my-2 fs--1"><i class="fas fa-envelope me-3"></i><a class="text-900" href="mailto:vctung@outlook.com">contact@outlook.com </a></p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->
     <?php include("navbar.php"); ?>
      <section class="pt-6 bg-600" id="home">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 w-100" src="assets/img/gallery/hero-header.png" width="470" alt="hero-header" /></div>
            <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
            <h4 class="fw-bold font-sans-serif">Gérez Votre Bibliothèque</h4>
              <h1 class="fs-5 fs-xl-7 mb-5">Accédez aux Meilleurs Livres et Organisez Vos Emprunts Facilement</h1>
              <a class="btn btn-primary me-2" href="#livre" role="button">Emprunter un livre</a>
              <a class="btn btn-outline-secondary" href="#!" role="button">En Savoir Plus</a>

            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0" style="margin-top:-5.8rem">

        <div class="container">
          <div class="row">
            <div class="card card-span bg-secondary">
              <div class="card-body">
                <div class="row flex-center gx-0">
                  <div class="col-lg-4 col-xl-2 text-center text-xl-start"><img src="assets/img/gallery/funfacts.png" width="170" alt="..." /></div>
                  <div class="col-lg-8 col-xl-4">
                      <h1 class="text-light fs-lg-4 fs-xl-5">Prochainement, notre <span class="text-primary">Système de Gestion de Bibliothèque</span>!</h1>
                    </div>
                    <div class="col-lg-12 col-xl-6">
                      <h1 class="display-1 text-light text-center text-xl-end">11 : 02 : 45 : 21</h1>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->
      </section>

      <section id="livre">
      <div class="container">
      <div class="row">
        <h1 class="text-center mb-5">Nos Dernières Publications</h1>
        <?php include("request.php"); ?>
        <?php foreach ($all_books as $book) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top w-100 img-fluid" src="uploads/<?= htmlspecialchars($book['photo']) ?>" alt="<?= htmlspecialchars($book['titre']) ?>" style="height: 300px; object-fit: cover;" />
                    <div class="card-body">
                        <h5 class="font-sans-serif fw-bold fs-md-0 fs-lg-1"><?= htmlspecialchars($book['titre']) ?></h5>
                        <p class="text-muted fs--1"><?= htmlspecialchars($book['categorie_name']) ?> - <?= htmlspecialchars($book['first_name'] . " " . $book['last_name']) ?></p>
                        <p class="text-muted fs--1">ISBN : <?= htmlspecialchars($book['isbn']) ?></p>
                        <a href="<?php echo isset($_SESSION['user_uuid']) ? 'emprunter.php?id=' . htmlspecialchars($book['id']) : '#'; ?>" 
                          class="btn btn-primary btn-sm" 
                          <?php if (!isset($_SESSION['user_uuid'])) : ?> 
                              data-bs-toggle="modal" data-bs-target="#loginModal" 
                          <?php endif; ?>>
                          Emprunter
                        </a>
                        <a href="details.php?id=<?= htmlspecialchars($book['id']) ?>" class="btn btn-outline-secondary btn-sm">Détails</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>
  
      <section>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 col-lg-4 mb-5"><img src="assets/img/gallery/cta.png" width="280" alt="cta" /></div>
            <div class="col-md-6 col-lg-5">
            <h5 class="text-primary font-sans-serif fw-bold">Abonnez-vous maintenant</h5>
            <h1 class="mb-5">Recevez toutes les nouvelles<br />publications de livres directement</h1>
            <form class="row g-0 align-items-center">
              <div class="col">
                <div class="input-group-icon">
                  <input class="form-control form-little-squirrel-control" type="email" placeholder="Entrez votre email" aria-label="email" /><i class="fas fa-envelope input-box-icon"></i>
                </div>
              </div>
              <div class="col-auto">
                <button class="btn btn-primary rounded-0" type="submit">S'abonner maintenant</button>
              </div>
            </form>
          </div>

          </div>
        </div>
        <!-- end of .container-->

      </section>
      
 
    <?php include("footer.php"); ?>
    </main>
    <!-- ===============================================-->
   
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  </body>

</html>