<?php 
	require('./php/connection.php');
	$idZapis = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Редактор заметки</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style_redaktor.css">
</head>
<body>
	<div class="verh">

		<img src="picture/icons8-журнал-100.png" class="icon">
		<div class="name">
			<a href="index.php" class="bloknot">БЛОКНОТ</a>
			<a href="index.php" class="back"> НАЗАД</a>
	    </div>

	</div>

	
	<div class="niz">
	<form method="POST" action="/php/edit_zapis.php">
		<?php
			echo '<input type="hidden" name="zapis_id" value="'.$idZapis.'">';
			
			$queryZapiska = "SELECT * FROM zapiski WHERE id_zapis = $idZapis;";
			$resultZapiska = mysqli_query($link, $queryZapiska);
			
			while ($zapiska = mysqli_fetch_assoc($resultZapiska))
			{
				echo '<input type="hidden" name="blotnot_id" value="'.$zapiska['id_bloknot'].'">';
				echo '<textarea placeholder="" name="zapis_text" rows="5" class="text" required>'. $zapiska['text_zapis'] .'</textarea>';
			}
		?>
	
		

		<div>
			<input type="submit" value="СОХРАНИТЬ ИЗМЕНЕНИЯ" class="save" name="edit"> </input>
			<input type="submit" value="" class="delete" name="delete"></input>
		</div>

	

	</div>


</body>
</html>