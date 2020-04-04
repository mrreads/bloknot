<?php

require('./connection.php');

$idZapis = $_GET['id'];
$idBloknot = $_GET['bloknot'];

$query = "DELETE FROM `zapiski` WHERE `zapiski`.`id_zapis` = $idZapis;";
$result = mysqli_query($link, $query);

echo '<script>window.location="./../index.php?id='.$idBloknot.'"</script>';