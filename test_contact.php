<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

// require_once __DIR__ . '/vendor/autoload.php';


try
{


$email = new PHPMailer(TRUE);

$email->IsSMTP();
$email->Host = "smtp.gmail.com";

$email->SMTPAuth = true;
$email->Username = 'surendrasawant081@gmail.com';
$email->Password = 'smdxnnrhdydebutx';

$email->setFrom('surendrasawant081@gmail.com','Surendra Sawant');

$email->addAddress('sawantsurendra96@gmail.com','Test');

$email->Subject = 'These is testing mail';

$email->Body = 'There is a great phpmailer';

$email->send();

}
catch (Exception $e)
{
	echo $e->errorMessage();
}
catch(\Exception $e)
{
	echo $e->getMessage();
}


?>