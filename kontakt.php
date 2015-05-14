<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Kontakt</TITLE>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="skripta.js" type="text/javascript"> </script>

</HEAD>
<BODY>

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<?php include("phpValidation.php"); ?>
>>>>>>> origin/master
>>>>>>> origin/master

<div id="logo">
<img src="slike/logo.png" alt="logo">
</div>

<div id="navigation">
<<<<<<< HEAD
<?php include('navigacija.php');?>
=======
<ul>
<li><a onclick="ajaxMenu('naslovnica.html')">Naslovnica </a> </li>
<li > <a  onclick="ajaxMenu('proizvodi.html')"> Proizvodi </a> </li>
<li > <a  onclick="ajaxMenu('onama.html')"> O nama </a> </li>
<li > <a  onclick="ajaxMenu('kontakt.html')">Kontakt </a> </li>
</ul>
>>>>>>> origin/master
</div>
<div class="introduction">
<h2> Dostupni smo putem sljedećih kontakt podataka: </h2>
<p class ="contactText"> Adresa: Redže Porobića 259, Odžak </p>
 <p class="contactText"> Email: almin.halilovic@hotmail.com </p>
 <p  class="contactText"> Broj telefona: 012-345-678 </p>
 <p class="contactText"> Fax: 012-345-678 </p>
</div>

<div id="contactForm">
<<<<<<< HEAD
<?php include('phpValidation.php'); ?>
		<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && validateAll($_POST['ime'], $_POST['mail'], $_POST['textArea'], $_POST['firm'])){ include('potvrdaPodataka.php'); } ?>
<form action="kontakt.php" method="post">
=======
<<<<<<< HEAD
<?php include('phpValidation.php'); ?>
		<?php if($_SERVER['REQUEST_METHOD'] == 'POST' && validateAll($_POST['ime'], $_POST['mail'], $_POST['textArea'], $_POST['firm'])){ include('potvrdaPodataka.php'); } ?>
<form action="kontakt.php" method="post">
=======
<form action="phpValidation.php" method="get">
>>>>>>> origin/master
>>>>>>> origin/master
<h2> Ostavite nam poruku. </h2>

<div class="contactFormText">
<p > Ime i prezime* 
<p>  Email* </p>
<p > Firma </p>
<p> Općina* </p>
<p> Grad* </p>
<p > Poruka* </p>
</div>

<div class="contactFormInput">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master
 <p> <input type="text" id="nameInput" name="ime" <?php if(isFormSubmitted()) echo 'value="' .$_POST['ime'] . '"';?>><span id="nameError" <?php if(isFormSubmitted() && !validateName($_POST['ime'])) echo 'class="spanErrorClass"'; ?>><?php if(isFormSubmitted()){ if(!validateName($_POST['ime'])) echo "Nevalidno ime!"; } ?></span>
 
  </p>
 <p> <input type="text" id="mailInput" name ="mail"  <?php if(isFormSubmitted()) echo 'value="' .$_POST['mail'] . '"';?>><span id="mailError" <?php if(isFormSubmitted() && !validateMail($_POST['mail'])) echo 'class="spanErrorClass"'; ?>><?php if(isFormSubmitted()){ if(!validateMail($_POST['mail'])) echo "Nevalidan mail!"; } ?></span> </p>
 <p> <input type="text" id="firmInput" name="firm" <?php if(isFormSubmitted()) echo 'value="' .$_POST['firm'] . '"';?>><span id="firmError" <?php if(isFormSubmitted() && !validateFirm($_POST['firm'])) echo 'class="spanErrorClass"'; ?>><?php if(isFormSubmitted()){ if(!validateFirm($_POST['firm'])) echo "Nevalidna firma!"; } ?></span> </p>
 <p> <input type="text" id="stateInput"> </p>
 <p> <input type="text" id="cityInput"> </p>
 <textarea name="textArea" rows=1 cols=1 id="textArea" <?php if(isFormSubmitted()) echo 'value="' .$_POST['textArea'] . '"';?>> </textarea> <span id="messageError" <?php if(isFormSubmitted() && !validateMessage($_POST['textArea'])) echo 'class="spanErrorClass"'; ?>><?php if(isFormSubmitted()){ if(!validateMessage($_POST['textArea'])) echo "Nevalidna poruka!"; } ?></span>
  
<<<<<<< HEAD
=======
=======
 <p> <input type="text" id="nameInput" name="ime">  </p>
 <p> <input type="text" id="mailInput">  </p>
 <p> <input type="text" id="firmInput"> </p>
 <p> <input type="text" id="stateInput"> </p>
 <p> <input type="text" id="cityInput"> </p>
 <textarea name="textArea" rows=1 cols=1 id="textArea"> </textarea> 
 
>>>>>>> origin/master
>>>>>>> origin/master
 </div>
 
<div id="contactFormButtons">
<p> <input type="submit" value="Pošalji" onclick="validateForm()"> <input type="reset" value="Poništi">  </p>
</div>
</form>
</div>

 

<div id="footer"><p>Copyright &copy; Almin Halilović</p></div>


</BODY
</HTML>