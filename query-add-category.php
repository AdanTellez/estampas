<html>
<head>
	<title>Agregar Categoría</title>
	<?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$color = mysqli_real_escape_string($mysqli, $_POST['color']);
    $valor = mysqli_real_escape_string($mysqli, $_POST['valor']);
    //$inventario = mysqli_real_escape_string($mysqli, $_POST['inventario']);
	// checking empty fields
	if(empty($color) || empty($valor)) {
				
		if(empty($color)) {
			echo "<font color='red'>El campo color está vacío.</font><br/>";
		}
        if(empty($valor)) {
			echo "<font color='red'>El campo valor está vacío.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else {
        $result = mysqli_query($mysqli, "SELECT color FROM clase WHERE color='$color'");
        $res = mysqli_fetch_array($result);
        if($color==$res['color']){
            echo "<font color='red'>Ya exitse una clase con ese color</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
        }
        else{
           // if all the fields are filled (not empty) 

            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO clase(id_clase, color, valor) VALUES(0,'$color','$valor')");
            
            //display success message
            echo "<font color='green'>Clase agregada correctamente.";
            echo "<br/><a href='index.php'>Regresar a Inicio</a>"; 
        }
		
	}
}
?>
</body>
</html>