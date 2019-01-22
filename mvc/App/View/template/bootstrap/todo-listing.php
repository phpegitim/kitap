<?php include_once 'header/main.php'?>
<?php include_once 'widgets/navbar.php'?>

<div class="container-fluid">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Görev</th>
				<th scope="col">Durum</th>
				<th scope="col">Oluşturulma Tarihi</th>
				<th scope="col">İşlemler</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (!empty($todos)) {
				$compFieldTextArr = [0 => 'Bekliyor', 1 => 'Tamamlandı'];
				foreach ($todos as $key => $value) {
					echo '
					<tr data-id="', $value['id'], '">
				      <th scope="row">', $value['id'], '</th>
				      <td>', $value['task'], '</td>
				      <td>', $compFieldTextArr[$value['completed']], '</td>
				      <td>', date('d.m.Y H:i:s',strtotime($value['create_time'])), '</td>
				      <td>
				      	<a href="todo/edit/', $value['id'], '" type="button" class="btn btn-info btn-sm">Güncelle</a> 
				      	<button type="button" class="btn btn-danger btn-sm">Sil</button></td>
				    </tr>
	    		';
				}
			}else
				echo '<tr><td colspan="4">Kayıt bulunamadı</td></tr>'
			?>
		</tbody>
	</table>
	<a href="todo/add" class="btn btn-primary btn-m active" role="button" aria-pressed="true">Yeni kayıt</a>
</div>

<?php include_once 'footer/main.php'?>
<script src="Public/js/todo-listing.js?v<?=$fvers?>"></script>
