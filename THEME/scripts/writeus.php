<?php

extract($_POST);

// Set your admin email here 
$ADMIN_EMAIL = 'email@website.com';

// Check if email is valid 
if ( validEmail($email) ) {
	
	// send mail
	$headers = "From: " . strip_tags($email) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	$body = 'Message from: <br><br>';
	$body .= 'Name: '.$name.'<br>';
	$body .= 'Company: '.$company.'<br><br>';
	$body .= $message;
	
	mail($ADMIN_EMAIL, 'Message sent from '.$name.'', $body, $headers);
	
	echo 'success';
	
} else {
	echo 'invalid';
}

function validEmail($email=NULL)
{
	if($email == 'Yourname@email.com')
		return false;
		
	return preg_match( "/^[\d\w\/+!=#|$?%{^&}*`'~-][\d\w\/\.+!=#|$?%{^&}*`'~-]*@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/ix", $email );
}
