<?php
session_start();
if(!isset($_SESSION['username']))
{
	 session_unset();
     header("Location:prijava.php");
}
if(isset($_REQUEST['komentar']))
{
	$komentar =htmlspecialchars($_REQUEST['komentar'],ENT_QUOTES,'utf-8');
	
	$veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	// $veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
	 
     $rezultat = $veza->prepare("delete from komentar where id ='".$komentar."';");
     $rezultat->execute();    
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	 header("Location:adminpanel.php");
	 
}
