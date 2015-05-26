<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<div id="mainPart">
<body>
<?php 

 $veza = new PDO("mysql:dbname=razvitak;host=localhost;charset=utf8", "root", "");
     $veza->prepare("set names utf8");
     $rezultat = $veza->prepare("select id, naslov, tekst, UNIX_TIMESTAMP(vrijeme) vrijeme2, autor, imaDetalja,detalji,slika from vijest order by vrijeme desc");
     $rezultat->execute();    
	if (!$rezultat) {
          $greska = $veza->errorInfo();
          print "SQL greška: " . $greska[2];
          exit();
     }

//$files = scandir("novosti");
//$dates = array();
$news = array();
foreach($rezultat as $novost)
{
	array_push($news,$novost);
}

$counter=0;

	
	for ($i=0; $i<count($news); $i++):
	$counter=$i;
	$detailsExist=false;
	$details = "";
    $description="";
	$fileContent=$news[$i];
	
	$rez2=$veza->prepare ("SELECT COUNT(*) FROM komentar WHERE komentar.vijest=:vijest;");
	$rez2->bindValue(":vijest", $fileContent['id'], PDO::PARAM_INT);
	$rez2->execute();
        $broj =$rez2->fetchColumn();
       $num= substr( $broj, -1 );
       $tekst="komentara.";
       if($num=="1") $tekst="komentar.";
	
	
	
	
?>
<?php if($counter%2==0) echo"<div class='newsContainer'>" ?>
 <div class="<?php if($counter%2 == 0) echo "newsLeft"; else echo "newsRight";?>">

 
 <?php echo "<p class='author'> Autor: " .htmlentities($fileContent['autor'],ENT_QUOTES). "</p>"; ?>
 <?php echo "<p class='datePosted'> Objavljeno: " .date("d.m.Y. (h:i)",htmlentities($fileContent['vrijeme2'],ENT_QUOTES))."</p>"; ?>

 <?php if($fileContent['slika'] != null): ?>
	 
	 <?php echo " <img src='".htmlentities($fileContent['slika'],ENT_QUOTES)."' alt='Slika'>"; ?>
	 
	<?php echo "<h2 ><a href='" .htmlentities($fileContent['slika'],ENT_QUOTES)."' title='Slika'></a></h2>"; ?>
	 	
    <?php endif; ?>
 

 <?php echo "<h3>" . ucfirst(strtolower(htmlentities($fileContent['naslov'],ENT_QUOTES))) . "</h3>";?>
	
 	<?php echo " <p>".$fileContent['tekst']."</p>"; ?>
	
	
	<?php if($fileContent['imaDetalja'] == true): ?>
	<details >
                <summary>Detaljnije</summary>
					<?php echo htmlentities($fileContent['detalji'],ENT_QUOTES); ?>
               
            </details>
	     <?php endif; ?>	
		 
		 
		  <?php	if($broj==0) print "<p><small> Nema komentara </small> </p>";
        else print "<p><small> <a  href=\"#\" onclick=\"ajaxMenu('komentari.php?vijest=".$fileContent['id']."');\">".$broj. " ".$tekst." </small> </a> </p>"; ?>
   
		 
 

</div>

<?php if($counter%2!=0) echo"</div>" ?>

<?php	endfor;?>

</div>

</body>
</html>
