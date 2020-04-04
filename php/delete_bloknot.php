<?php

require('./connection.php');

$idBloknot = $_GET['id'];

$query = "DELETE FROM `bloknoti` WHERE `bloknoti`.`id_bloknot` = $idBloknot;";
$result = mysqli_query($link, $query);

echo '<script>window.location="./../index.php"</script>';