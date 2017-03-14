<? error_reporting(1);
 
$mail = "informes@bioplasticrrr.com";
 
if($_POST['message']) {
        $message = "<h2>Hola tienes un nuevo mensaje de ".$_SERVER['SERVER_NAME']."</h2><hr>
					<p><strong>Asunto:</strong> ".$_POST['subject']."</p>
					<p><strong>Nombre:</strong> ".$_POST['name']."</p>
					<p><strong>Email:</strong> ".$_POST['email']."</p>
					<p><strong>Mensaje:</strong> ".$_POST['message']."</p>";
		$subject="Formulario de contacto, asunto: ".$_POST['subject'];
		mail($mail, $subject, $message, "Content-type: text/html; charset=utf-8 \r\n");
		echo 'AAAAAAAAAAAAAAA';
}
?>
<?error_reporting( E_ALL & ~( E_NOTICE | E_STRICT | E_DEPRECATED ) ); //Aquí se genera un control de errores "NO BORRAR NI SUSTITUIR"
require_once "Mail.php"; //Aquí se llama a la función mail "NO BORRAR NI SUSTITUIR"
 
$to = ''; //Aquí definimos quien recibirá el formulario
$from = ''; //Aquí definimos que cuenta mandará el correo, generalmente perteneciente al mismo dominio
$host = ''; //Aquí definimos cual es el servidor de correo saliente desde el que se enviaran los correos
$username = ''; //Aqui se define el usuario de la cuenta de correo
$password = ''; //Aquí se define la contraseña de la cuenta de correo que enviará el mensaje
$subject = 'Prueba formulario php'; //Aquí se define el asunto del correo
$body = 'Esto es una prueba para ver si funciona'; //Aquí se define el cuerpo de correo
 
//A partir de aquí empleamos la función mail para enviar el formulario
 
$headers = array ('From' => $from,
'To' => $to,
'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'auth' => true,
'username' => $username,
'password' => $password));
 
$mail = $smtp->send($to, $headers, $body);
 
//Una vez aquí habremos enviado el mensaje mediante el formulario
 
//El siguiente codigo muestra en pantalla un mensaje indicando que el mensaje ha sido enviado y a que cuenta ES OPCIONAL desde Acens lo incluimos para verificar que el formulario de prueba esta funcionando
 
if (PEAR::isError($mail)) {
echo("
" . $mail->getMessage() . "
");
} else {
echo "Mensaje enviado desde POA a ". $to ;
}
 
 
?>