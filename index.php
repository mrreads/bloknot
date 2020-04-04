<?php 
	require('./php/connection.php');
	$idBloknot = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Блокноты</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style_bloknot.css">
</head>
<body>
	<div class="verh">
		<img src="picture/icons8-журнал-100.png" class="icon">
		<div class="name">
			<a href="index.php" class="bloknot">БЛОКНОТ</a>
			<a href="create.php" class="back"> СОЗДАТЬ БЛОКНОТ или ЗАПИСКУ </a>
	    </div>
	</div>

	<div class="niz"> 
		<div class="left">

			<?php

				$queryBloknoti = "SELECT * FROM bloknoti;";
				$resultBloknoti = mysqli_query($link, $queryBloknoti);

				echo '<div class="nazvanie">'. $name .'</div>';


				echo '<div class="zametki">';

				while ($bloknot = mysqli_fetch_assoc($resultBloknoti))
				{
					if ($idBloknot == $bloknot['id_bloknot'])
					{
						echo '<a class="zametka active" href="index.php?id='. $bloknot['id_bloknot'].'">'. $bloknot['bloknot_name'] .' </a>';
					}
					else
					{
						echo '<a class="zametka" href="index.php?id='. $bloknot['id_bloknot'].'">'. $bloknot['bloknot_name'] .' </a>';
					}
					
				}
				
				echo '</div>';
			?>
        	
		</div>

		<div class="right" id="module"> 
			<div id="myDIV">

			<?php
				if (isset($idBloknot))
				{
					$queryZapiski = "SELECT * FROM zapiski WHERE id_bloknot = $idBloknot";
					$resultZapiski = mysqli_query($link, $queryZapiski);
					
					while ($zapiska = mysqli_fetch_assoc($resultZapiski))
					{
						echo '<p class="btn">'. $zapiska['text_zapis'] .' 
								<a href="redaktor.php?id='.$zapiska['id_zapis'].'" class="delete edit"> </a>		
								<a href="php/delete_zapis.php?id='.$zapiska['id_zapis'].'&bloknot='.$idBloknot.'" class="delete "> </a> 
							</p>';
					}
				}
				else
				{
					echo '<h2> Ввыберите блокнот </h2>';
				}

			?>

			</div>
		</div>

	</div>

</body>
</html>