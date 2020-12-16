<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Super ToDo</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-light navback">
		<div class="container">
			<a class="navbar-brand text-white" href="#">
				<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Super ToDo
			</a>
		</div>
	</nav>

	<?php	if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) : ?>
		<div class="pt-2 text-white d-flex justify-content-center" style="background-color: purple;"><h5>Tarefa incluída com sucesso!</h5></div>
	<?php	endif;?>

	<?php	if(isset($_GET['inclusao']) && $_GET['inclusao'] == 2) : ?>
		<div class="bg-danger pt-2 text-white d-flex justify-content-center"><h5>Erro na inclusão!!</h5></div>
	<?php	endif;?>

	<div class="container app">
		<div class="row">
			<div class="col-md-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="index.php">Tarefas Pendentes</a></li>
					<li class="list-group-item active"><a href="nova_tarefa.php">Nova Tarefa</a></li>
					<li class="list-group-item"><a href="todas_tarefas.php">Todas as Tarefas</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Nova Tarefa:</h4>
							<hr/>

							<form action="tarefa_controller.php?acao=inserir" method="post">
								<div class="form-group">
									<label>Tarefa:</label>
									<input class="form-control" type="text" name="tarefa" placeholder="Exemplo: Comprar pão">
								</div>
								<button class="btn text-white btn-block">Adicionar</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>



