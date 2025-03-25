<?php
session_start(); // S'assurer que la session est démarrée
?>


<nav class="navbar navbar-expand-lg navbar-light sticky-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/gallery/logo-n.png" height="45" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
              <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="index.php">Acceuil</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="#">A propos</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="categories.php">Catégories</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="livres.php">Livres</a></li>
              <?php if (isset($_SESSION['user_uuid']) && isset($_SESSION['user_name'])): ?>
                    <!-- Si l'utilisateur est connecté -->
                    <div class="d-flex align-items-center">
                        <button class="btn btn-primary dropdown-toggle py-2 px-4 shadow-none" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Salut, <?= htmlspecialchars($_SESSION['user_name']); ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>


                            <li>
                                <a class="dropdown-item" href="users/logout.php">
                                    <i class="fas fa-sign-out-alt"></i> Déconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <!-- Si l'utilisateur n'est pas connecté -->
                    <a href="users/login.php" class="btn btn-primary py-2 px-4 shadow-none">Mon compte</a>
                <?php endif; ?>
            </ul>
            <form class="d-flex my-3 d-block d-lg-none">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-primary" type="submit">Rechercher</button>
            </form>
            <div class="dropdown d-none d-lg-block">
              <button class="btn btn-outline-light ms-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-800"></i></button>
              <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton1" style="top:55px">
                <form>
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                </form>
              </ul>
            </div>
          </div>
        </div>
      </nav>


<!-- Boîte Modale pour connexion -->
<div class="modal fade text-center" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Connexion requise</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vous devez être connecté pour emprunter un livre.
                <br><br>
                <a href="users/login.php" class="btn btn-primary shadow-none">Se connecter</a> <!-- Redirige vers page login -->
                <a href="users/register.php" class="btn btn-secondary shadow-none">Créer un compte</a> <!-- Redirige vers page inscription -->
            </div>
        </div>
    </div>
</div>
