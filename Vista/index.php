<?php include_once __DIR__ . '/../Cruda/Core.Init.CheckOff.php';  ?>

<!DOCTYPE html>
<html>

<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?= \Cruda\Constantes::NOMBRE_SISTEMA ?> - Ingreso</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../lib/indexStyles.css">
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Intranet Vial</h3>
					<h3>Ingreso</h3>
					<div class="d-flex justify-content-end social_icon">
						<span><img src="../lib/img/logo_vialidad.png" style="width:60px" /></span></span>
					</div>
				</div>
				<div class="card-body">
					<form action="Sesion.Login.php" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="Usuario" name="nombre_usuario" required>
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="Contrase&ntilde;a" name="password" required>
						</div>
						<?php if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == \Cruda\Login::LOGIN_ERROR_NOMBRE_USUARIO) { ?>
							<p class="alert alert-danger">Usuario no encontrado</p>
						<?php } ?>
						<?php if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == \Cruda\Login::LOGIN_ERROR_PASS) { ?>
							<p class="alert alert-danger">Contrase&ntilde;a incorrecta</p>
						<?php } ?>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						<a href="#">No poseo una cuenta</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Olvid&eacute; mi contrase&ntilde;a</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>