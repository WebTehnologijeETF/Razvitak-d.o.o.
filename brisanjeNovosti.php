<?php
session_start();
if(!isset($_SESSION['username']))
{
	 session_unset();
     header("Location:prijava.php");
}
if(isset($_REQUEST['vijest']))
{
	$vijest =htmlspecialchars($_REQUEST['vijest'],ENT_QUOTES,'utf-8');
	
	$veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	// $veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
	 
	  $rezultat = $veza->prepare("select id,tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2,vijest, autor, mail from komentar where vijest=".$vijest." order by vrijeme asc;");
     $rezultat->execute();
	 if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
    
     foreach ($rezultat as $komentar) {
	   $rezultat2=$veza->prepare("delete from komentar where id='".$komentar['id']."';");
	   $rezultat2->execute();
	   if (!$rezultat2) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 }
	 
	 
     $rezultat = $veza->prepare("delete from vijest where id ='".$vijest."';");
     $rezultat->execute();    
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 
	 header("Location:adminpanel.php");
	 
}
