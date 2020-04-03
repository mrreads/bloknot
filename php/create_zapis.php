<?php

require('./connection.php');

$id = $_POST['bloknot_id'];
$text = $_POST['bloknot_text'];

$query = "INSERT INTO `zapiski` (`id_zapis`, `text_zapis`, `id_bloknot`) VALUES (NULL, '$text', $id);";
$result = mysqli_query($link, $query);

echo '<script>window.location="./../index.php?id='.$id.'"</script>';