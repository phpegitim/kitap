<?php include_once 'header/main.php'?>
<?php include_once 'widgets/navbar.php'?>

<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h6>Profil</h6>
		</div>
		<div class="panel-body">
			<form id="profile">

				<div class="form-group">
					<label for="exampleInputEmail1">Kullanıcı adı</label>
					<input type="user_name" class="form-control" disabled="disabled" value="<?=$user['user_name']?>" placeholder="E-Mail adresinizi giriniz">
					
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Parola</label>
					<input type="password" name="password" class="form-control"  aria-describedby="passwordHelp"  placeholder="Parolanızı giriniz">
					<small id="passwordHelp" class="form-text text-muted">Şifrenizi kimseyle paylaşmayın</small>
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">İsim</label>
					<input type="text" name="first_name" class="form-control" value="<?=$user['first_name']?>" placeholder="İsiminizi giriniz">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Soyisim</label>
					<input type="text" name="last_name" class="form-control" value="<?=$user['last_name']?>" placeholder="Soyisminizi giriniz">
				</div>				

				<button type="button" class="btn btn-primary">
					Güncelle
				</button>
			</form>
		</div>
		<hr>
		<div class="panel-footer">
			<div class="alert alert-success  fade" role="alert">
				<strong>Profil Başarıyla Güncellendi</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		</div>

	</div>

</div>

<?php include_once 'footer/main.php'?>
<script src="Public/js/user-profile.js?v=<?=$fvers ?>"></script>
