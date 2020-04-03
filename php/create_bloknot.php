<?php

require('./connection.php');

$name = $_POST['name_bloknot'];
$query = "INSERT INTO `bloknoti` (`id_bloknot`, `bloknot_name`) VALUES (NULL, '$name');";
$result = mysqli_query($link, $query);

echo '<script>window.location="./../index.php"</script>';