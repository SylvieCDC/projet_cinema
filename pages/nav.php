<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Nav</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/css/nav.css">

</head> 
<body>
<nav class="navbar navbar-expand-xl navbar">
	<a href="#" class="navbar-brand " ><img src="/projet_cinema/assets/images/logo.png" width="300px"></a>  		
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">		
		<form class="navbar-form form-inline">
			<div class="input-group search-box">								
				<input type="text" id="search" class="form-control" placeholder="Search here...">
				<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
			</div>
		</form>
		<div class="navbar-nav ml-auto">
			<a href="/projet_cinema/index.php" class="nav-item nav-link active"><span>Accueil</span></a>
			<a href="/projet_cinema/pages/films.php" class="nav-item nav-link"><span>Films</span></a>
			<a href="/projet_cinema/pages/contact.php" class="nav-item nav-link"><span>Contact</span></a>
			<!-- <a href="/projet_cinema/pages/signup.php" class="nav-item nav-link"><span>Connexion</span></a> -->
		
				<?php					
				//ici admin
				if(isset($_SESSION['id_roles']))
				{
				?>
					<div class="nav-item dropdown">
						<a href="" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action "><img src="/projet_cinema/assets/images/avatars/avatar-1.png" class="avatar" alt="Avatar">
						Bonjour 
						<?php 
						echo $_SESSION["pseudo"];

						if($_SESSION['id_roles'] == 1){
							echo " (Admin)";
						}
						?> <b class="caret"></b></a>
						<div class="dropdown-menu">
							<?php 
									if($_SESSION['id_roles'] == 1)
									{
										?>
									<a href="/projet_cinema/pages/compte.php" class="dropdown-item"><i class="fa fa-user-o"></i> Compte</a>
									<a href="/projet_cinema/CRUD\usersGestion\formulaireUtilisateur.php" class="dropdown-item"><i class="fa fa-calendar-o"></i> Gérer les membres</a>
									<a href="/projet_cinema/CRUD\filmsGestion\formulaireFilms.php" class="dropdown-item"><i class="fa fa-sliders"></i> Gérer Films</a>
									<a href="/projet_cinema/pages/gestion_profil.php" class="dropdown-item"><i class="fa fa-sliders"></i> Gérer profils</a>
									<div class="divider dropdown-divider"></div>';
									<?php		
									}
									if($_SESSION['id_roles'] == 2 ){
										?>
											<a href="/projet_cinema/pages/compte.php" class="dropdown-item"><i class="fa fa-user-o"></i> Compte</a>
											<a href="/projet_cinema/pages/ma_liste.php" class="dropdown-item"><i class="fa fa-calendar-o"></i> Ma Liste</a>
											<a href="/projet_cinema/pages/gestion_profil.php" class="dropdown-item"><i class="fa fa-sliders"></i> Gérer profils</a>
											<div class="divider dropdown-divider"></div>
										<?php
									}
							?>
							<a href="/projet_cinema/config/deconnx.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Déconnexion</a>
						</div>
					</div>
				<?php
					}
					else {
						?>
			<div class="nav-item dropdown mr-5">
				<a href="login.php" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action nav_drop"> Connexion<b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="/projet_cinema/pages/signup.php" class="dropdown-item"><i class="fa fa-user-o"></i> Créer un compte</a>
					<a href="/projet_cinema/pages/login.php" class="dropdown-item"><i class="fa fa-calendar-o"></i> Se connecter</a>
						<?php
					}
				?>
		</div>
	</div>

	
</nav>

</body>
</html>