<?php

class Painel {
	// variaveis dos cargos
	public static $cargos = [
			'0'=> 'Cliente',
			'1'=> 'Divulgador',
			'2'=> 'Atendente',
			'3'=> 'Front-End',
			'4'=> 'Back-End'
		];


	public static function logado(){
		return isset($_SESSION['login']) ? true : false;
	}

	public static function sair(){
		setcookie('lembrar','true', time()-1,'/');
		session_destroy();
		header('Location: '.INCLUDE_PATH_PAINEL);
	}

  // Sistema de carregarpagina dinamica
	public static function carregarPagina(){
		if(isset($_GET['url'])){
			$url = explode('/', $_GET['url']); // aq explode o delimitor q é a barra
			if (file_exists('pages/'.$url[0].'.php')){ // verifica se existe a pagina
				include('pages/'.$url[0].'.php'); //se existir incluir ela
			}else{
				//pagina nao existe
				header('Location: '.INCLUDE_PATH_PAINEL);
			}
		}else{
			include('pages/home.php');
		}
	}
	// Sistema de listar usuarios online
	public static function listarUsuariosOnline(){
		self::limparUsuariosOnline();//reponsavel por limpar usuarios q esteja mais de 1m off
		$sql = Bd::conectar()->prepare("SELECT * FROM tb_admin_online");
		$sql->execute();
		return $sql->fetchAll();
	}
	// Sistema de limpar usuarios online/inativo
	public static function limparUsuariosOnline(){
		$date = date('Y-m-d H:i:s');
		$sql = Bd::conectar()->exec("DELETE FROM tb_admin_online WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
	}
	// Sistema de pegar o total de visitas
	public static function pegarTotalVisitas(){
		$sql = Bd::conectar()->prepare("SELECT * FROM tb_admin_visitas");
		$sql->execute();
		return $sql->fetchAll();
	}

	// Sistema de pegar visitas hoje
	public static function pegarVisitasHoje(){
		$sql = Bd::conectar()->prepare("SELECT * FROM tb_admin_visitas WHERE dia = ?");
		$sql->execute(array(date('Y-m-d')));
		return $sql->fetchAll();
	}

	// Sistema de alerta de sucesso ou falso
	public static function alerta($tipo,$mensagem){
		if ($tipo == 'sucesso') {
			echo '<div class="edit-sucesso"><i class="fas fa-check"></i> '.$mensagem.'</div>';
		}elseif ($tipo == 'erro') {
			echo '<div class="edit-erro"><i class="fas fa-exclamation"></i> '.$mensagem.'</div>';
		}
	}
	// Sistema de validação de imagem verifica se é valida ou nao
	public static function imagemValida($imagem){
		if ($imagem['type'] == 'image/jpeg' ||
			$imagem['type'] == 'imagem/jpg' ||
			$imagem['type'] == 'imagem/png') {

			$tamanho = intval($imagem['size']/1024);
				if ($tamanho < 300) 
					return true;
				else
					return false;
				
		}else{
			return false;
		}
	}
	// Sistema de enviar imagem
	public static function uploadFile($file){
		$formatoArquivo = explode('.',$file['name']);
		$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
		if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
			return $file['name'];
		else
			return false;
		
	}
	// Sistema de deletar imagem
	public static function deletarFile($file){
		@unlink('/uploads/'.$file); // o @ serve para nao mostra o erro
	}

	// Sistema de inserir
	public static function inserir($array){//sempre q inserimos uma devida função $_POST passamos a ela e aqui retorna um array
			$certo = true;
			$nome_tabela = $array['nome_tabela'];
			$query = "INSERT INTO `$nome_tabela` VALUES (null";
		foreach ($array as $key => $value) {
			$nome = $key;
			$valor = $value;
			if($nome == 'acao' || $nome == 'nome_tabela')
				continue;
			if ($value == '') {
				$certo = false;
				break;
			}
			$query.=",?";
			$parametros[] = $value;
		}
		$query.=")";
		
		if ($certo == true) {
			$sql = Bd::conectar()->prepare($query);
			$sql->execute($parametros);
			}
		
		return $certo;
	}
	// Sistema de listamento depoimento
	public static function selecionaTudo($tabela,$inicio = null,$fim = null){
		if($inicio == null && $fim == null)
			$sql = Bd::conectar()->prepare("SELECT * FROM `$tabela`");
		else
			$sql = Bd::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $inicio,$fim");
			$sql->execute();
			return $sql->fetchAll();
	}
	// Sistema de excluir depoimento
	public static function deletar($tabela,$id=false){
		if ($id==false) {
			$sql = Bd::conectar()->prepare("DELETE FROM `$tabela`");
		}else{
			$sql = Bd::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
			
		}
		$sql->execute();
	}
	// Sistema de redirecionamento
	public static function redirecionamento($url){
		echo '<script>location.href="'.$url.'"</script>';
		die();
	}
}

?>