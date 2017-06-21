<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>TaskManager</title>
	<!-- Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
	</script>
	<link href="/css/styles.css" rel="stylesheet">
</head>
<body>
	<header>
		<nav class="navbar navbar-default header">
			<div class="container">
				<div class="navbar-header">
					<button aria-expanded="false" class="navbar-toggle collapsed" data-target="#nb_collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="/">TaskManager</a>
				</div>
				<div class="collapse navbar-collapse" id="nb_collapse">
					<ul class="nav navbar-nav">
						<li>
							<a href="/task/add">Создать новую задачу</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<?php if(empty($_COOKIE['nosaveadmin'])){ ?>
	<a href="/login/"><span aria-hidden="true" class="glyphicon glyphicon-log-in"></span> Войти как админ</a>
						  <?php	} ?>

						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="container-fluid content-wrapper">
		<div class="container content">
					<?php include 'application/views/'.$content_view; ?>
			</div>
		</div>
	</div>
	<footer>
		<div class="container-fluid footer">
			<div class="row">
				<div class="col-sm-12 text-center">
					Denis Raygorodski
				</div>
			</div>
		</div>
	</footer>
	<!-- Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
</body>
</html>
