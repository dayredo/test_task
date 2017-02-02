<section>
	<h3><code>Загрузка файла</code></h3>
	<div class="panel panel-primary">
		<div class="panel-heading">Загрузить файл:</div>
			<div class="panel-body">
			<div class="alert alert-info" role="alert">
				Имя файла должно начинаться с <code>prices</code>, иначе загрузка будет приостановлена.<br>
				Файл должен иметь расширение .txt.
			</div>
			<form action="upload" method="post" enctype="multipart/form-data">
				<table class="table">
					<tr>
						<td>
							<div class="input-group">
  								<span class="input-group-addon" id="basic-addon1">Загрузить файл:</span>
  								<input type="file" class="form-control file" name="price">
 
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<button class="btn btn-primary">Загрузить файл</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	
</section>