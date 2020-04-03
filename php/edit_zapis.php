<?php

require('./connection.php');

$idZapis = $_POST['zapis_id'];
$idBloknot = $_POST['blotnot_id'];
$text = $_POST['zapis_text'];

if (isset($_POST['edit']))
{
    
    $query = "UPDATE `zapiski` SET `text_zapis` = '$text' WHERE `zapiski`.`id_zapis` = $idZapis;";
    $result = mysqli_query($link, $query);
    
    echo '<script>window.location="./../index.php?id='.$idBloknot.'"</script>';
}

if (isset($_POST['delete']))
{
    $query = "DELETE FROM `zapiski` WHERE `zapiski`.`id_zapis` = $idZapis;";
    $result = mysqli_query($link, $query);
    
    echo '<script>window.location="./../index.php?id='.$idBloknot.'"</script>';
}


