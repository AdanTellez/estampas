<?php
    // Start the session
    session_start();
?>
<html>
<head>
	<title>Editar Clase</title>
	<?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
    $id_clase  = $_SESSION["id_clase"];	
	$color     = mysqli_real_escape_string($mysqli, $_POST['color']);
	$valor     = mysqli_real_escape_string($mysqli, $_POST['valor']);
	// checking empty fields
    
	if(empty($color) || empty($valor)){
				
		echo "Debe llenar todos los campos";

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else {
        $result = mysqli_query($mysqli, "SELECT color, id_clase FROM clase WHERE color='$color'");
        $res = mysqli_fetch_array($result);
        if($color==$res['color'] and $id_clase!=$res['id_clase']){

                echo "<font color='red'>Ya exitse una clase con ese color</font><br/>";
                echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
        }
        else{
           // if all the fields are filled (not empty) 
            
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE clase SET color='$color',valor='$valor' WHERE id_clase='$id_clase'");
            $result2 = mysqli_query($mysqli, "UPDATE estampa SET precio='$valor' WHERE id_clase='$id_clase'");
            
            //display success message
            echo "<font color='green'>Clase modificada correctamente.";
            echo "<br/><a href='index.php'>Regresar a Inicio</a>"; 
        }
		
	}
}

?>
</body>
</html>
