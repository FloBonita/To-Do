<?php

	class TarefaService{

		private $conn;
		private $tarefa;

		public function __construct(Conexao $conn, Tarefa $tarefa){
			$this->conn = $conn->conectar();
			$this->tarefa = $tarefa;
		}

		public function inserir(){
			$query = 'INSERT INTO tb_tarefas(tarefa) VALUES(:tarefa)';
			$stm = $this->conn->prepare($query);
			$stm->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
			$stm->execute();
			if($stm->rowCount() > 0){	
				return true;
			}
			return false;
		}

		public function recuperaTarefas() {
			$query = 'SELECT
						t.id, t.tarefa, s.status
					FROM
						tb_tarefas as t
					  INNER JOIN tb_status as s ON (t.id_status = s.id)';
					

			if($this->tarefa->__get('id_status') == 1) {
				$query = $query.' WHERE t.id_status = 1';
			}

			$query = $query.' ORDER BY data_cadastro DESC';

			$stm = $this->conn->prepare($query);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}

		public function concluirTarefa() {
			$query = "UPDATE tb_tarefas SET id_status = ? WHERE id = ?";
			$stm = $this->conn->prepare($query);
			$stm->bindValue(1, $this->tarefa->__get('id_status'));
			$stm->bindValue(2, $this->tarefa->__get('id'));
			//var_dump($stm);
			return $stm->execute();
		}

		public function removerTarefa() {
			$query = "DELETE FROM tb_tarefas WHERE id = :id";
			$stm = $this->conn->prepare($query);
			$stm->bindValue(':id', $this->tarefa->__get('id'));
			return $stm->execute();
		}

		public function atualizaTarefa() {
			$query = "UPDATE tb_tarefas SET tarefa = ? WHERE id = ?";
			$stm = $this->conn->prepare($query);
			$stm->bindValue(1, $this->tarefa->__get('tarefa'));
			$stm->bindValue(2, $this->tarefa->__get('id'));
			//var_dump($stm);
			return $stm->execute();
		}
	}

?>









