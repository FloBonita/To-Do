<?php
	
	class Conexao {

		private $serv = 'localhost'; //servidor
		private $db = 'todo_sexta'; //nome do banco
		private $user = 'root'; //usuário do banco
		private $pass = ''; //senha do banco

		public function conectar(){
			try{

				$conn = new PDO(
					"mysql:host=$this->serv;dbname=$this->db",
					"$this->user",
					"$this->pass"
				);

				return $conn;

			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}

	}

?>