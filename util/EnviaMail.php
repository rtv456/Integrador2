<?php
require_once 'mail/PHPMailerAutoload.php';

class EnviaMail
{
	
	public function Envia($para, $asunto, $cuerpo)
	{
				
		$mail = new PHPMailer(true);     
		try {
			$mail->SMTPDebug = 0;   
			$mail->isSMTP();         

		   
			$mail->Host = 'smtp.gmail.com';             
													 
			$mail->Username = 'cliniclosolivos@gmail.com';       
			$mail->Port = 587;                       
			$mail->setFrom('cliniclosolivos@gmail.com', 'Clinica Los Olivos - Citas web');
			$mail->Password = 'olivos2021';        


			$mail->SMTPAuth = true;                  
			$mail->SMTPSecure = 'tls';          


			$mail->addAddress($para);               
			$mail->CharSet = "UTF-8";              


			$mail->isHTML(true);                                  
			$mail->Subject = $asunto;
			$mail->Body    = $cuerpo;
	
			$mail->send();
			$stat =  'ok';
		} catch (Exception $e) {
			
			$stat = $mail->ErrorInfo;
		}
		
        return $stat;
		
	}
	
		
}