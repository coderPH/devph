<?php

	class site {
		public static function atualizarUsuarioOnline() {
			if(isset($_SESSION['online'])){ //se existir a sessao online
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$check = Bd::conectar()->prepare("SELECT id FROM tb_admin_online WHERE token = ?");
				$check->execute(array($_SESSION['online']));

				if ($check->rowCount() == 1) {
					$sql = Bd::conectar()->prepare("UPDATE tb_admin_online SET ultima_acao = ? WHERE token = ? ");
				$sql->execute(array(
					$horarioAtual,$token
				));
				}else{
					$ip = $_SERVER['REMOTE_ADDR'];
					$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
					$sql = Bd::conectar()->prepare("INSERT tb_admin_online VALUES (null,?,?,?) ");
					$sql->execute(array(
						$ip,$horarioAtual,$token
					));
				}

			}else{
				$_SESSION['online'] = uniqid();
				$ip = $_SERVER['REMOTE_ADDR'];
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = Bd::conectar()->prepare("INSERT tb_admin_online VALUES (null,?,?,?) ");
				$sql->execute(array(
					$ip,$horarioAtual,$token
				));
			}
		}

		// Sistema de contador de visitas
	public static function contador(){
		if(!isset($_COOKIE['visita'])){//se nao existir o cookie visita execute isso
			setcookie('visita', 'true',time() + (60*60*24*7)); //aq o cookie se vai em 7 dias basta fazer a conta em segundos
			$sql = Bd::conectar()->prepare("INSERT INTO tb_admin_visitas VALUES (null,?,?)");
			$sql->execute(array($_SERVER['REMOTE_ADDR'],date('Y-m-d')));
		}
	}
	}

?>