<!DOCTYPE HTML">
<HTML>
<HEAD>
<TITLE>Naslovnica</TITLE>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="Javascript" type="text/javascript" src="jquery-1.11.2.min.js"></script>
<script src="skripta.js" type="text/javascript"> </script>
</HEAD>
<BODY>

<div id="logo">
<img src="slike/logo.png" alt="logo">

</div>

<div id="navigation">
<ul>
<li><a onclick="ajaxMenu('naslovnica.php')">Naslovnica </a> </li>
<li > <a  onclick="ajaxMenu('proizvodi.html')"> Proizvodi </a> </li>
<li > <a  onclick="ajaxMenu('onama.html')"> O nama </a> </li>
<li > <a  onclick="ajaxMenu('kontakt.php')">Kontakt </a> </li>
</ul>
</div>

<div class="introduction" >
<h1> Dobrodošli na službenu stranicu firme Razvitak d.o.o. </h1>
<h2> Stranica je trenutno u procesu razvoja </h2>
</div>

<?php include 'novosti.php';?>



<div id="footer"><p>Copyright &copy; Almin Halilović</p></div>

</BODY
</HTML>