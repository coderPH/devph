<?php
	
	class Usuario {
		public function atualizarUsuario($nome,$senha,$imagem){
			$sql = Bd::conectar()->prepare("UPDATE tb_admin_usuarios SET nome = ?,senha = ?,img = ? WHERE usuario = ? ");
			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['usuario']))){
				return true;
			}else{
				return false;
			}
		}

		public function usuarioExistente($usuario){
			$sql = Bd::conectar()->prepare("SELECT `id` FROM `tb_admin_usuarios` WHERE usuario=?");
			$sql->execute(array($usuario));
			if ($sql->rowCount() == 1) {
				return true;
			}else{
				return false;
			}
		}

		public function adicionarUsuario($usuario,$senha,$imagem,$nome,$cargo){
			$sql = Bd::conectar()->prepare("INSERT INTO `tb_admin_usuarios` VALUES (NULL,?,?,?,?,?)");
			$sql->execute(array($usuario,$senha,$imagem,$nome,$cargo));
		}
}

?>