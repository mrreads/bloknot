<?php 
	require('./php/connection.php');
	$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Создание блокнота/заметки</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/style_create.css">
</head>
<body>
	<div class="verh">

		<img src="picture/icons8-журнал-100.png" class="icon">
		<div class="name">
			<a href="index.php" class="bloknot">БЛОКНОТ</a>
			<a href="index.php" class="back"> НАЗАД </a>
	    </div>

	</div>

	
	<div class="niz">


		<div class="left">

			<form action="/php/create_bloknot.php" class="zametka" method="POST">
    			<input type="text" name="name_bloknot" placeholder="назови свой блокнот" class="name_bloknot" required>
        		<input type="submit" value="СОЗДАТЬ БЛОКНОТ" name="add" class="submit">  
			</form>

	    </div>


		<div class="right">  
			<form action="/php/create_zapis.php" class="zametka" method="POST">
    			<select name="bloknot_id">
				<?php
					$queryBloknoti = "SELECT * FROM bloknoti;";
					$resultBloknoti = mysqli_query($link, $queryBloknoti);
					
					while ($bloknot = mysqli_fetch_assoc($resultBloknoti))
					{
						if ($id == $bloknot['id_bloknot'])
						{
							echo '<option value="'.$bloknot['id_bloknot'].'" selected>'. $bloknot['bloknot_name'] .'</option>';
						}
						else
						{
							echo '<option value="'.$bloknot['id_bloknot'].'">'. $bloknot['bloknot_name'] .'</option>';
						}
						
					}
				?>
				</select>

    			<textarea placeholder="пиши что захочешь..." name="bloknot_text" rows="5" class="text" required></textarea>
        		<input type="submit" value="ДОБАВИТЬ ЗАМЕТКУ" name="add" class="submit">  
			</form>
		</div>


</body>
</html>