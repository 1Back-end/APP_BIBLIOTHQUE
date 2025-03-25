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

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">


    <?php include("header.php"); ?>
      
      <!-- <section> close ============================-->
      <!-- ============================================-->
     <?php include("navbar.php"); ?>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-600">
  <?php include("request.php"); ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h6 class="font-sans-serif text-primary fw-bold">Nos Catégories</h6>
        <h1 class="mb-6">Liste de nos Catégories disponibles</h1>
      </div>
    </div>
    <div class="row">
      <?php foreach ($all_categories as $category): ?>
        <div class="col-md-4">
          <div class="card mb-5 mb-md-0 h-100">
            <div class="text-center mb-5">
              <span class="badge bg-black fw-normal text-uppercase bg-secondary">
                <?= htmlspecialchars($category['name']); ?>
              </span>
            </div>
            <div class="card-body px-4 py-6 py-md-5 py-lg-6">
            <p class="text-muted mb-2 my-md-3">Découvrez notre catégorie <?= htmlspecialchars($category['name']); ?>.</p>
              <hr class="border border-1" />
              <ul class="list-unstyled">
                <?php
                $books = get_books_by_category($connexion, $category['id']);
                foreach ($books as $book): ?>
                  <li class="mb-3">
                    <i class="fas fa-check text-info me-2"></i>
                    <?= htmlspecialchars($book['titre']); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
              
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
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&amp;family=Rubik:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
  </body>

</html>