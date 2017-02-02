<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
		<meta name="viewport" content="width =device-width" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<title>Test task</title>
	</head>
<body>
	<div class="hover">
		<div class="message">
			<form action="/test_task/" method="post">
				<div class="panel panel-primary">
					<div class="panel-heading">Удаление файла</div>
					<div class="panel-body">
						<div class="alert alert-info" role="alert">
							<table class="table">
								<tr>
									<td><i class="fa fa-question-circle question"></i></td>
									<td>
										<span>Удалить файл <code><span class="file"></span></code>?</span>			
										<input type="text" class="hide-name" name="file">
									</td>
								</tr>
							</table>
						</div>
						<table class="table">
							<tr>
								<td colspan="2" style="text-align: right;">
									<button type="submit" class="btn btn-success">Да</button>
									<button type="button" class="btn btn-danger reset">Нет</button>
								</td>
							</tr>
						</table>
					</div>
				</div>			
			</form>
		</div>		
	</div>
	<header>
		<nav class="navbar navbar-inverse">
		<button class="menu"></button>
			<div class="wrapper">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="/test_task">
							Test task
						</a>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<aside>
		<span class="title-menu">Меню</span>
		<button class="close-menu"></button>
		<ul class="nav navbar-nav">
			<li><a href="/test_task">Главная</a></li>
			<li><a href="upload">Загрузить файл</a></li>
		</ul>
	</aside>
	<div class="wrapper">
		<main>
			<?php include_once( 'pages/' . $content); $data ?>
		</main>
	</div>
	<footer>
		<div class="wrapper">
			<code>Тестовое задание | 2017</code>
		</div>		
	</footer>
</body>
<script src="js/scripts.js"></script>
</html>