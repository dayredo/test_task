<section class="info">
	<h3><code>Главная</code></h3>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Список загруженных файлов
		</div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				Вывод списка файлов из Базы Данных, с возможностью сортировки по Id, Имени и Дате.
			</div> 
			<table class="table">
				<tr class="default">
					<th>
						Id:
						<a href="/test_task?sort=by_id_asc" class="sort-asc sort-by-id-asc"></a>
						<a href="/test_task?sort=by_id_desc" class="sort-desc sort-by-id-desc"></a>
					</th>
					<th></th>
					<th>
						Имя файла:
						<a href="/test_task?sort=by_name_asc" class="sort-asc sort-by-name-asc"></a>
						<a href="/test_task?sort=by_name_desc" class="sort-desc sort-by-name-desc"></a>
					</th>
					<th>
						Дата загрузки:
						<a href="/test_task?sort=by_date_asc" class="sort-asc sort-by-date-asc"></a>
						<a href="/test_task?sort=by_date_desc" class="sort-desc sort-by-date-desc"></a>
					</th>
					<th>Действия:</th>
				</tr>
				<?php foreach( $data as $key => $value ):	?>
					<tr class="info files" id="<?php echo $value[id] ?>">
						<td class="id_<?php echo $value[id] ?>"><?php echo $value[id] ?></td>
						<td class="icon"></td>
						<td class="name_<?php echo $value[id] ?>"><?php echo $value[name] ?></td>
						<td class="date_<?php echo $value[id] ?>"><?php echo $value[date_create] ?></td>
						<td>
							<button type="button" class="btn btn-primary delete" id="<?php echo $value[id] ?>"></button>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>	
</section>