<?php
    // Start the session
    session_start();
?>
<html>
<head>
	<title>Editar estampa</title>
	<?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$id_clase   = mysqli_real_escape_string($mysqli, $_POST['clase']);
    print $id_clase;
	$id_album   = mysqli_real_escape_string($mysqli, $_POST['album']);
    print $id_album;
	$no         = mysqli_real_escape_string($mysqli, $_POST['no']);
    $precio     = mysqli_real_escape_string($mysqli, $_POST['precio']);
    $inventario = mysqli_real_escape_string($mysqli, $_POST['inventario']);
	//$sold = mysqli_real_escape_string($mysqli, $_POST['sold']);
    $id_estampa = $_SESSION["id_estampa"];
	// checking empty fields
    
	if(empty($no) || empty($precio) || empty($inventario)){
				
		echo "Debe llenar todos los campos";

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else {
        $result = mysqli_query($mysqli, "SELECT no, id_album, id_estampa, id_clase FROM estampa WHERE no='$no' and id_album='$id_album'");
        $res = mysqli_fetch_array($result);
        if($no==$res['no'] and $id_album==$res['id_album']){
            if($id_estampa == $res['id_estampa']){
                //insert data to database   
                if($res['id_clase']!=$id_clase){
                    $result = mysqli_query($mysqli, "SELECT valor FROM clase WHERE id_clase='$id_clase'");
                    $res    = mysqli_fetch_array($result);
                    $valor  = $res['valor'];
                    $result = mysqli_query($mysqli, "UPDATE estampa SET id_clase='$id_clase',id_album='$id_album',no='$no',precio='$valor',inventario='$inventario' WHERE id_estampa='$id_estampa'");
                }else{
                 $result = mysqli_query($mysqli, "UPDATE estampa SET id_clase='$id_clase',id_album='$id_album',no='$no',precio='$precio',inventario='$inventario' WHERE id_estampa='$id_estampa'");  
                }
                //display success message
                echo "<font color='green'>Estampa editada correctamente.";
                echo "<br/><a href='index.php'>Regresar a Inicio</a>"; 
            }else{
                echo "<font color='red'>Ya exitse una estampa con ese número en ese album</font><br/>";
                echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
            }
        }
        else{
           // if all the fields are filled (not empty) 
            
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE estampa SET id_clase='$id_clase',id_album='$id_album',no='$no',precio='$precio',inventario='$inventario' WHERE id_estampa='$id_estampa'");
            
            //display success message
            echo "<font color='green'>Estampa editada correctamente.";
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
