<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Kontakt</TITLE>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="skripta.js" type="text/javascript"> </script>

</HEAD>
<BODY>

<?php include("phpValidation.php"); ?>

<div id="logo">
<img src="slike/logo.png" alt="logo">
</div>

<div id="navigation">
<ul>
<li><a onclick="ajaxMenu('naslovnica.html')">Naslovnica </a> </li>
<li > <a  onclick="ajaxMenu('proizvodi.html')"> Proizvodi </a> </li>
<li > <a  onclick="ajaxMenu('onama.html')"> O nama </a> </li>
<li > <a  onclick="ajaxMenu('kontakt.html')">Kontakt </a> </li>
</ul>
</div>
<div class="introduction">
<h2> Dostupni smo putem sljedećih kontakt podataka: </h2>
<p class ="contactText"> Adresa: Redže Porobića 259, Odžak </p>
 <p class="contactText"> Email: almin.halilovic@hotmail.com </p>
 <p  class="contactText"> Broj telefona: 012-345-678 </p>
 <p class="contactText"> Fax: 012-345-678 </p>
</div>

<div id="contactForm">
<form action="phpValidation.php" method="get">
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
 <p> <input type="text" id="nameInput" name="ime">  </p>
 <p> <input type="text" id="mailInput">  </p>
 <p> <input type="text" id="firmInput"> </p>
 <p> <input type="text" id="stateInput"> </p>
 <p> <input type="text" id="cityInput"> </p>
 <textarea name="textArea" rows=1 cols=1 id="textArea"> </textarea> 
 
 </div>
 
<div id="contactFormButtons">
<p> <input type="submit" value="Pošalji" onclick="validateForm()"> <input type="reset" value="Poništi">  </p>
</div>
</form>
</div>

 

<div id="footer"><p>Copyright &copy; Almin Halilović</p></div>


</BODY
</HTML>