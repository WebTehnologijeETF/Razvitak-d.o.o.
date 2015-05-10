<div id="mainPart">
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

 <div class="<?php if($counter%2 == 0) echo "newsLeft"; else echo "newsRight";?>">

 
 <?php echo "<p class='author'> Autor: $fileContent[1] </p>"; ?>
 <?php echo "<p class='datePosted'> Objavljeno: $fileContent[0]</p>"; ?>
 
 <?php if($fileContent[3] != "\r\n"): ?>
	 
	 <?php echo " <img src='$fileContent[3]' alt='Slika'>"; ?>
	 
	<?php echo "<h2 ><a href='" . $fileContent[3] . "' title='slikica'></a></h2>"; ?>
	 	
    <?php endif; ?>
 
 <?php echo "<h3>" . ucfirst(strtolower($fileContent[2])) . "</h3>";?>
	
 	<?php echo " <p>$description</p>"; ?>
	
	
	<?php if($detailsExist == true): ?>
	<details >
                <summary>Detaljnije</summary>
					<?php echo " $details"; ?>
               
            </details>
	     <?php endif; ?>	
 

</div>

<?php if($counter%2!=0): ?>
<?php echo "<br/>"; ?>
<?php endif; ?>
<?php	
	endfor;
?>

</div>
