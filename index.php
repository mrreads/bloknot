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
			<a href="create.php" class="back"> СОЗДАТЬ БЛОКНОТ </a>
	    </div>
	</div>

	<div class="niz"> 
		<div class="left">

			<?php
				if (isset($idBloknot))
				{
					$queryName = "SELECT bloknot_name FROM bloknoti WHERE id_bloknot = $idBloknot";
					$resultName = mysqli_query($link, $queryName);
					$name = mysqli_fetch_row($resultName)[0];
					echo '<div class="nazvanie">'. $name .'</div>';

					$queryZapiski = "SELECT * FROM zapiski WHERE id_bloknot = $idBloknot";
					$resultZapiski = mysqli_query($link, $queryZapiski);
					echo '<div class="zametki">';
					while ($zapiska = mysqli_fetch_assoc($resultZapiski))
					{
						echo '<p class="zametka">'. $zapiska['text_zapis'] .' <a class="delete" href="redaktor.php?id='.$zapiska['id_zapis'].'"> </a> </p>';
					}
					echo '</div>';

				}
				else
				{
					echo '<div class="nazvanie"> выберите блокнот</div>';
				}
			?>
        	
		</div>

		<div class="right" id="module"> 
			<div id="myDIV">

			<?php
				$queryBloknoti = "SELECT * FROM bloknoti;";
				$resultBloknoti = mysqli_query($link, $queryBloknoti);
				
				while ($bloknot = mysqli_fetch_assoc($resultBloknoti))
				{
					if ($idBloknot == $bloknot['id_bloknot'])
					{
						echo '<a class="btn active" href="index.php?id='. $bloknot['id_bloknot'].'">'. $bloknot['bloknot_name'] .'</a>';
					}
					else
					{
						echo '<a class="btn" href="index.php?id='. $bloknot['id_bloknot'].'">'. $bloknot['bloknot_name'] .'</a>';
					}
					
				}
			?>

			</div>
		</div>

	</div>

</body>
</html>