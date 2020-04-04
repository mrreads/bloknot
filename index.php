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
			<a href="create.php" class="back"> СОЗДАТЬ БЛОКНОТ</a>
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
						echo '
							<div class="zametka-div">
								<a class="zametka active" href="index.php?id='. $bloknot['id_bloknot'].'">'. $bloknot['bloknot_name'] .'</a>
								<a href="php/delete_bloknot.php?id='.$bloknot['id_bloknot'].'" class="delete delete-bloknot"> </a>
							</div>	
							';
					}
					else
					{
						echo '
						<div class="zametka-div">
							<a class="zametka" href="index.php?id='. $bloknot['id_bloknot'].'">'. $bloknot['bloknot_name'] .'</a>
							<a href="php/delete_bloknot.php?id='.$bloknot['id_bloknot'].'" class="delete delete-bloknot"> </a>
						</div>	
						';
					}
					
				}
				
				echo '</div>';
			?>
        	
		</div>

		<div class="right" id="module">
			<?php
				if (isset($idBloknot))
				{
					echo '<div class="plus"><a href="create.php?id='.$idBloknot.'" class="btn_plus"> </a></div>';
				}
				else
				{
					echo `<br>`;
				}
			?>
			
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
					echo '<h2> Выберите блокнот </h2>';
				}

			?>

			</div>
		</div>

	</div>

</body>
</html>