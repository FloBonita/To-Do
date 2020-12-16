<?php

	require __DIR__."../../todo_scripts/tarefa_model.php";
	require __DIR__."../../todo_scripts/tarefa_service.php";
	require __DIR__."../../todo_scripts/conexao.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; 

	if($acao == 'inserir') {
		$tarefa = new Tarefa();
		$conn = new Conexao();
		$tarefa->__set('tarefa', $_POST['tarefa']);
		$tarefaServ = new TarefaService($conn, $tarefa);
		$inseriu = $tarefaServ->inserir();
		if($inseriu) {
			header('Location: nova_tarefa.php?inclusao=1');
		}else{
			header('Location: nova_tarefa.php?inclusao=2');
		}
	} else if($acao == 'recuperaTarefasPendentes') {
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);
		$conn = new Conexao();
		$tarefaServ = new TarefaService($conn, $tarefa);
		$tarefas = $tarefaServ->recuperaTarefas();
	} else if($acao == 'recuperaTarefas') {
		$tarefa = new Tarefa();
		$conn = new Conexao();
		$tarefaServ = new TarefaService($conn, $tarefa);
		$tarefas = $tarefaServ->recuperaTarefas();
	} else if($acao == 'concluirTarefa') {
		$tarefa = new Tarefa();
		$conn = new Conexao();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);
		$tarefaServ = new TarefaService($conn, $tarefa);
		$tarefaServ->concluirTarefa();
		if(isset($_GET['pagina']) && $_GET['pagina'] == 'index') {
			header('location: index.php');
		}else {
			header('location: todas_tarefas.php');
		}
	} else if($acao == 'excluirTarefa') {
		$tarefa = new Tarefa();
		$conn = new Conexao();
		$tarefa->__set('id', $_GET['id']);
		$tarefaServ = new TarefaService($conn, $tarefa);
		$tarefaServ->removerTarefa();

		if(isset($_GET['pagina']) && $_GET['pagina'] == 'index') {
			header('location: index.php');
		} else {
			header('location: todas_tarefas.php');
		}
	} else if ($acao == 'atualizarTarefa') {
		$tarefa = new Tarefa();
		$conn = new Conexao();
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);
		$tarefaServ = new TarefaService($conn, $tarefa);
		$tarefaServ->atualizaTarefa();
		if(isset($_GET['pagina']) && $_GET['pagina'] == 'index') {
			header('location: index.php');
		} else {
			header('location: todas_tarefas.php');
		}
	}
?>









