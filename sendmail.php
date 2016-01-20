<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$host = $_SERVER['HTTP_HOST'];
	$asunto = "Contacto desde el sitio web";
	$to = "rociomorenomuro@hotmail.com"; 
	$nombre = utf8_decode(strip_tags($_POST["nombre"]));
	$telefono = strip_tags($_POST["telefono"]);
	$Ciudad34 = strip_tags($_POST["Ciudad34"]);
	//$numero = strip_tags($_POST["numero"]);
	$email = strip_tags($_POST["email"]);
	$mensaje = utf8_decode(strip_tags($_POST["mensaje"]));

	$headers = "From: PB CORE DRILLING <noreply@" . $host . ">\r\n";
	//$headers .= "Reply-To: ". $to . "\r\n";
//	$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= '<table align="center" rules="all" style="border-color: #666;" cellpadding="10">';
	//$message .= '<tr><td colspan="2" style="text-align:center"><img height="66px" src="images/iconos-17.png" alt="" /></td></tr>';
	$message .= '<tr><td colspan="2"><h1 align="center" style="font-weight:100;color:#696969">Contacto</h1></td></tr>';
	$message .= "<tr style='background: #eee;'><td><strong>Nombre:</strong> </td><td>" . ucwords($nombre) . "</td></tr>";
	//$message .= "<tr><td><strong>Numero de Cliente:</strong> </td><td>" . $numero . "</td></tr>";
	//$message .= "<tr><td><strong>Ciudad:</strong> </td><td>" . $Ciudad34 . "</td></tr>";
	//$message .= "<tr><td><strong>Telefono:</strong> </td><td>" . $telefono . "</td></tr>";
	$message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
	$message .= "<tr><td><strong>Comentario:</strong> </td><td>" . $mensaje . "</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";
	
	if(mail($to, $asunto, $message, $headers)){
		
		$to2 = "rociomorenomuro@hotmail.com";
		// ob_start();
		// echo '<p align="center" style="background-color: #dff0d8;">Mensaje enviado</p>';
		header("Location: index.html?send=sent");
		// ob_end_flush();
	}

	else{
		echo "No se ha podido enviar el mensaje";
		// echo '<a href="/">Regresar al inicio</a>';
	}
}