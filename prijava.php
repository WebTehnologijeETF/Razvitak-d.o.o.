<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="skripta.js" type="text/javascript"> </script>
    <title>Komentari</title>
  </head>
  <body>
  <div id="logo">
<img src="slike/logo.png" alt="logo">

</div>
  
  <div id="navigation">
<?php include('navigacija.php');?>
</div>

  
    <div id="commentsMainPart">


<?php
session_start();
if(isset($_SESSION['username']))
{
     header("Location:adminpanel.php");
}

if(isset($_POST['inputUsername']) && isset($_POST['inputPassword']))
{
	
	$username=htmlspecialchars($_POST['inputUsername'],ENT_QUOTES,'utf-8');
	$password=htmlspecialchars($_POST['inputPassword'],ENT_QUOTES,'utf-8');
	
     $veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
	 //$veza= new PDO("mysql:dbname=almin;host=http://almin-razvitak.rhcloud.com/;charset=utf8","adminXGlP9gh","almin");
     $veza->prepare("set names utf8");
     $rezultat = $veza->prepare("SELECT username FROM korisnici WHERE username= '".$username."' and password='" .md5($password)."';");
     $rezultat->execute();
	 if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }
	 $broj=$rezultat->rowCount();
	 if($broj==0)
		 echo "<h2> Pogresno </h2>";
	 
	 else
	 {
		 $_SESSION['username']=$username;
		  header("Location:adminpanel.php");
		  
	 }
	 
	//header("Location:" .$_SERVER['REQUEST_URI']);
	
	 unset($_POST);
	 
}
?>

<div>

<form id="loginForm" method="post" action="prijava.php"  >
<label for="inputUsername"> Username </label> <input type="text" id="inputUsername" name="inputUsername"> <br> <br>
<label for="inputUsername"> Password </label> <input type="password" id="inputPassword" name="inputPassword"> <br> <br>

<input type="submit" value="Prijava" >
</form>

</div>

</div>

</body>
</html>
