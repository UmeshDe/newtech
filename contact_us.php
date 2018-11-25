<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/phpmailer/src/Exception.php';
require './phpmailer/phpmailer/src/PHPMailer.php';
require './phpmailer/phpmailer/src/SMTP.php';

// require_once __DIR__ . '/vendor/autoload.php';


include 'contact_config.php';
session_start();
error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{
	include 'functions.php';

	$name = stripslashes($_POST['name']);
	$email = trim($_POST['email']);
	$phone = stripslashes($_POST['phone']);
	$subject = stripslashes($_POST['subject']);
	$message = "Site visitor information:

	Name: ".$_POST['name']
	."

	E-mail Address: ".$_POST['email']
	."

	Phone: ".$_POST['phone']
	."

	Message: ".$_POST['content'];


	$error = '';

// Check name

	if(!$name)
	{
		$error .= 'Please enter your First name.<br />';
	}
// Check email

	if(!$email)
	{
		$error .= 'Please enter an e-mail address.<br />';
	}

	if($email && !ValidateEmail($email))
	{
		$error .= 'Please enter a valid e-mail address.<br />';
	}


// if(isset($_SESSION['captcha_keystring']) && strtolower($_SESSION['captcha_keystring']) != strtolower($_POST['capthca']))
// {
// $error .= "Incorect captcha.<br />";
// }


	if(!$error)
	{

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

			$email->Subject = $subject;

			$email->Body = $message;

			$email->send();

			echo 'Thank you for your response we will contact you shortly';

		}
		catch (Exception $e)
		{
			echo 'Something went wrong try again after some time';
			// echo $e->errorMessage();
		}
		catch(\Exception $e)
		{
			echo 'Something went wrong try again after some time';
			// echo $e->getMessage();
		}
	}
	else{
		echo '<div class="notification-error">'.$error.'</div>';
	}
}


?>