<?php include_once 'header/main.php'?>

<!-- Özel stil tanımlamaları Public klasorune kaydedildi -->
<link href="Public/css/login.css" rel="stylesheet">
<div class="container-fluid">
	<div class="grid">
	    <div class="row">
			<form id="login" class="form-signin text-center">
				<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
				<h1 class="h3 mb-3 font-weight-normal">Lütfen Giriş Yapın</h1>
				<label for="inputEmail" class="sr-only">Email Adresi</label>
				<input type="email" id="inputEmail" name="user_name" class="form-control" placeholder="Email Adresi" required autofocus>
				<label for="inputPassword" class="sr-only">Parola</label>
				<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Parola" required>
			
				<button class="btn btn-lg btn-primary btn-block" type="button">
					Giriş
				</button>
				<p class="mt-5 mb-3 text-muted">
			        <div class="alert alert-danger fade" role="alert">
			  			Lütfen giriş bilgilerinizi kontrol edin..
					</div>
				</p>
			</form>
	    </div>
	    <div class="row">

	  
	    </div>
	</div>
</div>

<?php include_once 'footer/main.php'?>
<script src="Public/js/login.js?v=<?=$fvers?>"></script>
