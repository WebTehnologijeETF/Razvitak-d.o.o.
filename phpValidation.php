<?php

function  validateName($name)
{
	if(strlen(preg_replace('/\s+/','',$name)) == 0) // ne smije biti prazno ime
		return false;
	
	return true;
}

function validateMail($mail)
{
	$mailRegex ="/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i";
	
	if(strlen(preg_replace('/\s+/','',$mail)) == 0 || preg_match($mailRegex, $mail) == false) 
        return false;
	
	return true;	
}
<<<<<<< HEAD
function validateFirm($firm)
{
	return ctype_alnum($firm);
}
=======
>>>>>>> origin/master

function validateMessage($message)
{
	if(strlen(preg_replace('/\s+/','',$message)) == 0) // ne smije biti prazno ime
		return false;
	
	return true;
	
}

<<<<<<< HEAD
function isFormSubmitted(){
	return ($_SERVER['REQUEST_METHOD'] == 'POST');
}

function validateAll($ime, $mail, $message, $firm){
	if( validateName($ime) && validateMail($mail) && validateMessage($message) && validateFirm($firm))
		return true;
	return false;
}
=======
>>>>>>> origin/master




?>