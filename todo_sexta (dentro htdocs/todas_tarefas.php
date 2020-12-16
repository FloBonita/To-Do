<?php

	$json = file_get_contents('http://localhost/todo_sexta/api');
	$tarefas = json_decode($json);

	// echo '<pre>';
	// echo var_dump($tarefas);
	// echo '</pre>';
	// echo $tarefas[3]->tarefa;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Super ToDo</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<script>
		
		function realizarTarefa(id) {
			location.href = 'index.php?pagina=todas&acao=concluirTarefa&id=' + id;
		}

		function excluirTarefa(id) {
			location.href = 'index.php?pagina=todas&acao=excluirTarefa&id=' + id;
		}

				function editarTarefa(id, tarefa) {
			//console.log(tarefa);
			//injeção do form
			let form = document.createElement('form');
			form.action = 'tarefa_controller.php?pagina=todas&acao=atualizarTarefa';
			form.method = 'post';
			form.className = 'row';

			let inputTarefa = document.createElement('input');
			inputTarefa.type = 'text';
			inputTarefa.name = 'tarefa';
			inputTarefa.className = 'col-8 form-control';
			inputTarefa.value = tarefa;

			let inputId = document.createElement('input');
			inputId.type = 'hidden';
			inputId.name = 'id';
			inputId.value = id;

			let button = document.createElement('button');
			button.type = 'submit';
			button.innerHTML = 'Atualizar';
			button.className = 'col-3 btn btn-success';

			form.appendChild(inputTarefa);
			form.appendChild(inputId);
			form.appendChild(button);

			//console.log('tarefa_'+id);

		 let tarefaEdit = document.getElementById('tarefa_'+id);
		 tarefaEdit.innerHTML = '';
		 tarefaEdit.insertBefore(form, tarefaEdit[0]);

		}

	</script>

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
	<div class="container app">
		<div class="row">
			<div class="col-md-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="index.php">Tarefas Pendentes</a></li>
					<li class="list-group-item"><a href="nova_tarefa.php">Nova Tarefa</a></li>
					<li class="list-group-item active"><a href="todas_tarefas.php">Todas as Tarefas</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Todas as Tarefas:</h4>
							<hr/>

							<?php foreach($tarefas as $tarefa) { ?>
								
							<div class="row mb-3 d-flex align-items-center">
								<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
									<?= $tarefa->tarefa ?>
								</div>
								<div class="col-sm-3 mt-2 d-flex justify-content-between">
									<i class="fas fa-trash fa-lg text-danger" onclick="excluirTarefa(<?= $tarefa->id ?>)"></i>
									
									<?php if($tarefa->status == 'pendente') { ?>
										<i class="fas fa-edit fa-lg text-info" onclick="editarTarefa(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
										<i class="fas fa-check fa-lg text-success" onclick="realizarTarefa(<?= $tarefa->id ?>)"></i>
									<?php } ?>
								</div>							
							</div>
							<!-- <hr/> -->

							<?php } ?>			

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>