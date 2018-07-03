<?php
    // Start the session
    session_start();
?>
<html>
<head>
	<title>Agregar estampa</title>
	<?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$no         = mysqli_real_escape_string($mysqli, $_POST['no']);
	$precio     = mysqli_real_escape_string($mysqli, $_POST['precio']);
	$inventario = mysqli_real_escape_string($mysqli, $_POST['inventario']);
	//$sold = mysqli_real_escape_string($mysqli, $_POST['sold']);
    $id_clase   = $_SESSION["id_clase"];
    $id_album   = mysqli_real_escape_string($mysqli, $_POST['id_album']);
	// checking empty fields
    
    print $id_clase;
    echo '<br>';
    print $id_album;
    echo '<br>';
    print $no;
    echo '<br>';
    print $precio;
    echo '<br>';
    print $inventario;
    echo '<br>';
    
	if(empty($no) || empty($precio) || empty($inventario)){
				
		echo "Debe llenar todos los campos";

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else {
        $result = mysqli_query($mysqli, "SELECT no, id_album FROM estampa WHERE no='$no' and id_album='$id_album'");
        $res = mysqli_fetch_array($result);
        if($no==$res['no'] and $id_album==$res['id_album']){
            echo "<font color='red'>Ya exitse una estampa con ese número en ese album</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
        }
        else{
           // if all the fields are filled (not empty) 
            
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO estampa(id_estampa, id_clase, id_album, no, precio, inventario, sold) VALUES(0,'$id_clase','$id_album','$no','$precio','$inventario', 0)");
            
            //display success message
            echo "<font color='green'>Estampa agregada correctamente.";
            echo "<br/><a href='index.php'>Regresar a Inicio</a>"; 
        }
		
	}
}
    

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

?>
</body>
</html>
