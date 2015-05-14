<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Proizvodi</TITLE>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="skripta.js" type="text/javascript"> </script>
<script src="proizvodiSkripta.js" type="text/javascript"> </script>



</HEAD>
<BODY onload="hideTreeLoadProducts()">

<div id="logo">
<img src="slike/logo.png" alt="logo">
</div>

<div id="navigation">
<?php include('navigacija.php');?>
</div>

<div class="introduction">
<h1> Firma Razvitak d.o.o. se odlikuje nizom kvalitetnih proizvoda koje Vam stavljamo na raspolaganje. U nastavku su prikazani isti zajedno sa pripadnim opisima te cijenama. </h1>
</div>


<div id="dialog-form-create" title="Kreiraj proizvod">

  <p id="validateTipsCreate">Sva polja su obavezna.</p>
 
  <form  id="formCreate" method="post">
    <fieldset>
	<legend></legend>
      <label for="nameCreate">Naziv </label>
      <input type="text" name="nameCreate" id="nameCreate" class="dialogFormInput"> <br>
      <label for="descriptionCreate">Opis</label>
      <input type="text" name="descriptionCreate" id="descriptionCreate" class="dialogFormInput"> <br>
      <label for="priceCreate">Cijena</label>
      <input type="text" name="priceCreate" id="priceCreate" class="dialogFormInput"> <br>
 
      <input type="button" tabindex="1" value="OK" onclick="addProduct()">  <input type="button" value="Odustani" onclick="hideModal('createProduct')" >  <br>
    </fieldset>
  </form>
</div>

<div id="dialog-form-edit" title="Izmijeni proizvod" style="display:none">
  <p id="validateTipsEdit">Sva polja su obavezna.</p>
 
  <form action="blank" id="formEdit">
    <fieldset>
	<legend></legend>
      <label for="nameEdit">Naziv </label>
      <input type="text" name="nameEdit" id="nameEdit"class="dialogFormInput"> <br>
      <label for="descriptionEdit">Opis</label>
      <input type="text" name="descriptionEdit" id="descriptionEdit" class="dialogFormInput"> <br>
      <label for="priceEdit">Cijena</label>
      <input type="text" name="priceEdit" id="priceEdit" class="dialogFormInput"> <br>
 
      <input type="button" id="editButton" tabindex="1" value="OK">  <input type="button" value="Odustani" onclick="hideModal('editProduct')" >  <br>
   
    </fieldset>
  </form>
</div>



<div id="tableDiv">

<table id="productTable">
<tr>
<th> Naziv </th>
<th colspan="1"> Opis </th>
<th> Cijena </th>
<th>  </th>
</tr>

</table>
<button id="create-product" onclick="showModalCreate()">Kreiraj proizvod</button>
</div>




<div id="treeDiv">
<p> Ispod su prikazani orginalni proizvodi koje Vam nudimo razvrstani u kategorije sa priloženim slikama.</p>

<ul id="treeList">
    <li id="blokovi" class="headElement">
	<a onclick = "toggle(this);">Blokovi</a>
	<ul>
        <li id="blok16">
		<a onclick = "toggle(this);">Blok 16</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
		</ul>
		</li>
		
        <li id="blok18">
		<a onclick = "toggle(this);">Blok 18</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
      
        </ul>
        </li>
        <li id="blok20">
		<a onclick = "toggle(this);">Blok 20</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
      
        </ul>
        </li>
        <li id="blok22">
		<a onclick = "toggle(this);">Blok 22</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
        </ul>
        </li>
    </ul>
    </li>
	
    <li id="cigle" class="headElement">
	<a onclick = "toggle(this);">Cigle</a>
	<ul>
        <li id="cigla16">
		<a onclick = "toggle(this);">Cigla 16</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
		</ul>
		</li>
		
        <li id="cigla18">
		<a onclick = "toggle(this);">Cigla 18</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
      
        </ul>
        </li>
        <li id="cigla20">
		<a onclick = "toggle(this);">Cigla 20</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
      
        </ul>
        </li>
        <li id="cigla22">
		<a onclick = "toggle(this);">Cigla 22</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
        </ul>
        </li>
    </ul>
    </li>
	
    <li id="ukrasni" class="headElement">
	<a onclick = "toggle(this);">Ukrasni blokovi</a>
	<ul>
        <li id="ukrasni16">
		<a onclick = "toggle(this);">Ukrasni blok 16</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
		</ul>
		</li>
		
        <li id="ukrasni18">
		<a onclick = "toggle(this);">Ukrasni blok 18</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
      
        </ul>
        </li>
        <li id="ukrasni20">
		<a onclick = "toggle(this);">Ukrasni blok 20</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
      
        </ul>
        </li>
        <li id="ukrasni22">
		<a onclick = "toggle(this);">Ukrasni blok 22</a>
		<ul>
            <li><img src="slike/razvitak.png" alt="slika" class="imageContent" onmouseover="enlargeImage(this)" onmouseout="shrinkImage(this)"></li>
        </ul>
        </li>
    </ul>
    </li>
</ul>
</div>

<div id="footer"><p>Copyright &copy; Almin Halilović</p></div>



</BODY



</HTML>