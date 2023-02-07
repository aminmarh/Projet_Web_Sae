<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Creation de compte</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../assets/img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
<!--===============================================================================================-->
	</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../assets/img/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="creationCompteBD.php" method="post">
					<span class="login100-form-title">
						Creation de compte
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Veuillez saisir un nom">
						<input class="input100" type="text" name="nom" placeholder="Nom de famille">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa-solid fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Veuillez saisir un prenom">
						<input class="input100" type="text" name="prenom" placeholder="Prenom">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa-solid fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Un mail valide est requis: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Un mot de passe est requis">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Créer un compte
						</button>
					</div>

					<?php 
						if(isset($_GET['reg_err']))
						{
							$err = htmlspecialchars($_GET['reg_err']);

							switch($err)
							{
								case 'nom':
									?>
										<br>
										<div class="alert alert-danger">
											<strong>Erreur</strong> Nom non valide
										</div>
									<?php
								break;

								case 'prenom':
									?>
										<br>
										<div class="alert alert-danger">
											<strong>Erreur</strong> Prenom non valide
										</div>
									<?php
								break;
								
								case 'already':
								?>
									<br>
									<div class="alert alert-danger">
										<strong>Erreur</strong> Compte déjà existant
									</div>
								<?php 
							}
						}
                	?>

					<div class="text-center p-t-75">
						<span class="txt1">
							Vous avez un compte ?
						</span>
						<a class="txt2" href="connexion.php">
							Connectez-vous
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>

			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->	
	<script src="https://kit.fontawesome.com/cf00848303.js" crossorigin="anonymous"></script>	
<!--===============================================================================================-->	
	<script src="../assets/js/jquery-3.6.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../assets/js/main_login.js"></script>

</body>
</html>