<?php
	
	class email {

		private $mailer;

		public function __construct($host,$username,$senha,$name){
			
			$this->mailer = new PHPMailer;

			//$this->mailer->SMTPDebug = 3;                               // Enable verbose debug output

			$this->mailer->isSMTP();                                      // Set mailer to use SMTP
			$this->mailer->Host = $host;  // Specify main and backup SMTP servers smtp.gmail.com
			$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
			$this->mailer->Username = $username;                 // SMTP username
			$this->mailer->Password =  $senha;                           // SMTP password
			$this->mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted 
			$this->mailer->Port = 587;     
			$this->mailer->CharSet = 'UTF-8';
			$this->mailer->SMTPOptions = array(
			    'ssl' => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
			);
			$this->mailer->setFrom($username,$name);
			$this->mailer->isHTML(true);                               

			}
			public function adicionarEmail($email,$nome){
				$this->mailer->addAddress($email,$nome);
			}

			public function formatarEmail($info){
				$this->mailer->Subject = $info['assunto'];
				$this->mailer->Body    = $info['corpo'];
				$this->mailer->AltBody = strip_tags($info['corpo']);
			}

			public function enviarEmail(){
				if($this->mailer->send()){
					return true;
				}else{
					return false;
				}
			}
	}

?>