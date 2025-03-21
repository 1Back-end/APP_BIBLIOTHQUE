<!DOCTYPE html>
<html>
<head>
	<!-- Basic admin Info -->
	<meta charset="utf-8">
	<title><?php echo strtoupper(ucfirst(str_replace(".php", "", basename($_SERVER['PHP_SELF']))));?></title>

	<link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="../vendors1/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors1/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors1/styles/style.css">
	<link rel="stylesheet" type="text/css" href="../vendors1/styles/main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				
			</div>
			<div class="user-notification">
				<div class="dropdown">
					
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
						</div>
					</div>
				</div>
			</div>
			<?php
			session_start();
			if (!isset($_SESSION["admin_uuid"])) {
				header("Location: ../login/login.php");
				exit();
			}
			?>
			<div class="user-info-dropdown">
				<div class="dropdown text-success" id="userInfo">
					<a class="dropdown-toggle text-success" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon shadow-none">
					<?php
						$avatar_path = "../uploads/";
						$default_avatar = "https://i.pinimg.com/564x/07/01/e5/0701e5a1cd4f91681f76cf3691176680.jpg";
						$avatar = isset($_SESSION['photo']) && !empty($_SESSION['photo']) && file_exists($avatar_path . $_SESSION['photo'])
								? $avatar_path . $_SESSION['photo'] 
								: $default_avatar;

						$username = ucfirst(strtolower($_SESSION['username'] ?? 'Utilisateur Lamda')); // Gestion du cas où la session est vide
						?>
						<img id="userPhoto" src="<?= htmlspecialchars($avatar) ?>" width="50" height="50" class="rounded-circle" 
						style="border-radius: 50%; object-fit: cover; aspect-ratio: 1/1;">
					</span>

					<small id="userName" class="user-name fw-bold font-14 text-capitalize" style="color: #28a745;">
						<?= htmlspecialchars($username) ?>
					</small>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="../admin/profil.php"><i class="fas fa-user"></i> Profil</a>
						<a class="dropdown-item" href="../login/logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
					</div>

				</div>
			</div>
			
		</div>
	</div>

	
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="#">
				<h3 class="text-uppercase text-white">
                BookFlow
				</h3>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
			<ul  id="accordion-menu">
				<li>
					<a href="../admin/dashboard.php" class="dropdown-toggle no-arrow">
						<span class="micon fas fa-tachometer-alt"></span><span class="mtext">Tableau de bord</span>
					</a>
				</li>
				<li>
                    <a href="../admin/categories.php" class="dropdown-toggle no-arrow">
                        <span class="micon fas fa-th-list"></span><span class="mtext">Catégories</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/auteurs.php" class="dropdown-toggle no-arrow">
                        <span class="micon fas fa-pencil-alt"></span><span class="mtext">Auteurs</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/livres.php" class="dropdown-toggle no-arrow">
                        <span class="micon fas fa-book"></span><span class="mtext">Livres</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/emprunts.php" class="dropdown-toggle no-arrow">
                        <span class="micon fas fa-hand-holding"></span><span class="mtext">Emprunts</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/retours.php" class="dropdown-toggle no-arrow">
                        <span class="micon fas fa-undo"></span><span class="mtext">Retours</span>
                    </a>
                </li>


				<li>
					<a href="../admin/liste_users.php" class="dropdown-toggle no-arrow">
						<span class="micon fas fa-users"></span><span class="mtext">Utilisateurs</span>
					</a>
				</li>

			</ul>
			</div>
		</div>
	</div>
	</div>
	</div>

	</div>
	<!-- js -->
	<!-- js -->
	<script src="../vendors1/scripts/core.js"></script>
	<script src="../vendors1/scripts/script.min.js"></script>
	<script src="../vendors1/scripts/process.js"></script>
	<script src="../vendors1/scripts/layout-settings.js"></script>
	<script src="../vendors1/scripts/dashboard.js"></script>
</body>
</html>