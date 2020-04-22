<?php 
	
	function sendEmail($incomemsg, $to, $subject)
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		$headers .= 'From: DukeDen <no-reply@dukeden.com>' . "\r\n";
		$message = '
         <html>
         <head>
        
          <style>
        
          </style>
         </head>
         <body>';

		$message = '<div style="width: 90%; padding: 20px; border-radius: 35px 0 0 0;  margin: 0 auto; background: #61399D;">
   	                <div style=""><img src="http://bulk-sms.bulkgator.com/new/images/logo.png"></div>
                    </div>';
		$message .= '<div style="padding: 20px; width: 90%; margin: 0 auto; color: rgb(0, 86, 128);  font-family: Arial; font-size: 13px;">
		'.$incomemsg.'</div>';
		$send = mail($to, $subject, $message, $headers);

    if ($send) {
     	return true;
   }else{
  		return false;
      } 
	}

?>