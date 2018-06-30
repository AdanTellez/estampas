<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id  = $_GET['id'];
$aux = $_GET['aux'];

switch ($aux) {
	//se borra una estampa
    case 1:
        $result = mysqli_query($mysqli, "DELETE FROM estampa WHERE id_estampa=$id");

            echo "<font color='green'>Estampa eliminada correctamente.";
        break;
        //Se borra un album
    case 2:
        $result = mysqli_query($mysqli, "DELETE FROM estampa WHERE id_album=$id");
        $result2 = mysqli_query($mysqli, "DELETE FROM album WHERE id_album=$id");

            echo "<font color='green'>Album eliminado correctamente.";
        break;
}
    echo "<br/><a href='index.php'>Regresar a Inicio</a>"; 
?>

