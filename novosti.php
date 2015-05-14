<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<div id="mainPart">
<body>
<?php 


$files = scandir("novosti");
$dates = array();
$news = array();
$counter=0;

for ($i=2; $i<count($files); $i++) {
    $tempDate = file("novosti/".$files[$i]);
    array_push($dates, $tempDate[0]);
	array_push($news, $files[$i]);
}
// bubble sort zbog zahtjeva o sortiranju novosti po datumu
for ($i=0; $i<count($news) - 1; $i++) {
        if (new DateTime($dates[$i]) < new DateTime($dates[$i+1])) {
            $temp = $dates[$i+1];
            $dates[$i+1] = $dates[$i];
            $dates[$i] = $temp;
            $temp = $news[$i+1];
            $news[$i+1] = $news[$i];
            $news[$i] = $temp;
            
        }
    }

	for ($i=0; $i<count($news); $i++):
	$counter=$i;
  $fileContent = file("novosti/".$news[$i]);
    $detailsExist=false;
	$details = "";
    $description="";
    for ($j=4; $j<count($fileContent);$j++) {
        if($fileContent[$j] == "--\r\n") {
            $detailsExist = true;
            continue;
        }
        if ($detailsExist == false) {
            $description .= " ".$fileContent[$j];
        }
        else {
            $details .= " ".$fileContent[$j];
        }
    }
?>
<?php if($counter%2==0) echo"<div class='newsContainer'>" ?>
 <div class="<?php if($counter%2 == 0) echo "newsLeft"; else echo "newsRight";?>">

 
 <?php echo "<p class='author'> Autor: " .htmlentities($fileContent[1],ENT_QUOTES). "</p>"; ?>
 <?php echo "<p class='datePosted'> Objavljeno: " .htmlentities($fileContent[0],ENT_QUOTES)."</p>"; ?>
 
 <?php if($fileContent[3] != "\r\n"): ?>
	 
	 <?php echo " <img src='".htmlentities($fileContent[3],ENT_QUOTES)."' alt='Slika'>"; ?>
	 
	<?php echo "<h2 ><a href='" .htmlentities($fileContent[3],ENT_QUOTES)."' title='Slika'></a></h2>"; ?>
	 	
    <?php endif; ?>
 
 <?php echo "<h3>" . ucfirst(strtolower(htmlentities($fileContent[2],ENT_QUOTES))) . "</h3>";?>
	
 	<?php echo " <p>".htmlentities($description,ENT_QUOTES)."</p>"; ?>
	
	
	<?php if($detailsExist == true): ?>
	<details >
                <summary>Detaljnije</summary>
					<?php echo htmlentities($details,ENT_QUOTES); ?>
               
            </details>
	     <?php endif; ?>	
 

</div>

<?php if($counter%2!=0) echo"</div>" ?>

<?php	endfor;?>

</div>

</body>
</html>
