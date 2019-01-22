<?php include_once 'header/main.php'?>
<?php include_once 'widgets/navbar.php'?>

<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading"><h6>Yeni Yapılacak Ekle</h6></div>
		<div class="panel-body">
			<form id="todo">
				
				<div class="form-group">
					<label for="exampleFormControlTextarea1"></label>
					<textarea class="form-control" name="task" id="exampleFormControlTextarea1" rows="3" placeholder="Kaydı giriniz"></textarea>
				</div>
				<div class="form-group">
				  <label><input type="radio" name="completed" value="0" checked> Bekliyor</label>  <label><input value="1" type="radio" name="completed" >Tamamlandı</label>
				</div>			
				
				<button type="button" class="btn btn-primary">
					Submit
				</button>
			</form>
		</div>
		<hr>
		<div class="panel-footer">
			<div class="alert alert-success  fade" role="alert">
			  <strong>Tebrikler</strong>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>				
			
		</div>
		
	</div>
</div>

<?php include_once 'footer/main.php'?>
<script src="Public/js/todo-add.js?v=<?=$fvers ?>"></script>
