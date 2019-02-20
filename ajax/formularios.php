<?php
			include('../config.php');
				$data = array();
				$assunto = 'Nova mensagem do site!';
				$corpo = '';
				foreach ($_POST as $key => $value) {
					$corpo.=ucfirst($key).": ".$value;
					$corpo.="<hr>";
				}
				$info = array('assunto'=>$assunto,'corpo'=>$corpo);
				$mail = new email('smtp.gmail.com','futebolgame90@gmail.com','tioroot99','devPHP');
						$mail->adicionarEmail('futebolgame90@gmail.com','Coder');
				$mail->formatarEmail($info);
				if($mail->enviarEmail()){
							$data['sucesso'] = true;
						}else{
							$data['error'] = true;
					}

					//testando mensagens de erro e sucesso 
					//$data['sucesso'] = false;
					//$data['error'] = true;
			
			//$data['retorno'] = 'erro';
			die(json_encode($data));
?>