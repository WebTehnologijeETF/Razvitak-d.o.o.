<?php
session_start();
if(!isset($_SESSION['username']))
{
	 session_unset();
     header("Location:prijava.php");
}
if(isset($_REQUEST['korisnik']))
{
	$korisnik =htmlspecialchars($_REQUEST['korisnik'],ENT_QUOTES,'utf-8');
	
	if($_SESSION['brojKorisnika']>1){
	$veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	// $veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
	 
     $rezultat = $veza->prepare("delete from korisnici where username =:username;");
	 $rezultat->bindValue(":username", $korisnik, PDO::PARAM_INT);
     $rezultat->execute();    
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	}
	 
	 header("Location:adminpanelkorisnici.php");
	 
}