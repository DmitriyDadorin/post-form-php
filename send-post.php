<?php
	$jsonst = json_decode( file_get_contents('php://input'));
	$name_field = 'name';
	$tel_field = 'tel';
	$email_field = 'email';
	$model_field = 'model';
	$message_field = 'message';
	$name = $jsonst->$name_field;	
	$tel = $jsonst->$tel_field;
	$email = $jsonst->$email_field;
	$model = $jsonst->$model_field;
	$message_text = $jsonst->$message_field;
	$subject = 'Новая заявка';
	$headers= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html;charset=utf-8 \r\n";
	$message = "<p>Новая заявка</p>
	<p><strong>Название организации или ФИО частного лица:</strong> $name</p>
	<p><strong>Телефон:</strong> <a href='tel:$tel'>$tel</a></p>
	<p><strong>Email:</strong> $email</p>
	<p><strong>Model:</strong> $model</p>
	<p><strong>Сообщение:</strong> $message_text</p>
	";
	$to      = 'ПОЧТА ПОЛУЧАТЕЛЯ';
	$headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'Content-type: text/html;charset=utf-8' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $message, $headers);
	echo $message;
?>
