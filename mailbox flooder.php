<?php

if (isset($_POST['email']))
{
    $email = $_POST['email'];
   // $email ='sa02908@st.habib.edu.pk';
    echo"$email";

	/*------------------------------------*\
		Validation
	\*------------------------------------*/
    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
	for ($x = 0; $x <= 1; $x++) {
	$name = generateRandomString();
	$title = generateRandomString();
	$message = generateRandomString();

	//Sanitize input data using PHP filter_var().
	$sender_name        = $name;
	$sender_email       = 'sonlkn1248014hipnkme@glknasd0914uoma.com';
	$message_content    = $message;

	//additional php validation
	if(strlen($message_content)<3) //check empty message
	{
		$output = json_encode(array('type'=>'error_message_content', 'text' => 'Message content is too short.'));
		die($output);
	}
	if(strlen($sender_name)<3) // If length is less than 3 it will output JSON error.
	{
		$output = json_encode(array('type'=>'error_sender_name', 'text' => 'Provided name is too short.'));
		die($output);
	}
	if(!filter_var($sender_email, FILTER_VALIDATE_EMAIL)) //email validation
	{
		$output = json_encode(array('type'=>'error_sender_email', 'text' => 'E-mail format is incorrect.'));
		die($output);
	}

	/*------------------------------------*\
		E-mail send
	\*------------------------------------*/

	//Recipient email, Replace with own email here
	$to_email = $email;

	//email headers
	$headers  = "Content-type: text/html; charset=utf-8" . "\r\n";
	$headers .= "Reply-To: " . $sender_email . "\r\n";
	$headers .= "X-Mailer: PHP/" . phpversion();

	//email subject
	$message_subject = $sender_name . ".";

	//email content
	$message_body  = $name . " &lt;" . $sender_email ;

	//send mail function
	$send_mail = mail($to_email, $message_subject, $message_body, $headers);





	/*------------------------------------*\
		E-mail status
	\*------------------------------------*/

	//If mail couldn't be sent output error. Check your PHP email configuration.
	if(!$send_mail)
	{
		$output = json_encode(array('type'=>'error', 'text' => 'There was an error while sending message.'));
		echo"error";
		die($output);
	}
	else
	{
		$output = json_encode(array('type'=>'message', 'text' => 'Your spam emails have been sent successfully. Enjoy and relax!'));
		echo"success \n";
	}
}
echo"Your spam emails have been sent successfully. Enjoy and relax! \n";

}
?>

<form action="email_sender_try.php" method="post">
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>
