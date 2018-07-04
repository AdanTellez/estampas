<?php
    // Start the session
    session_start();
?>
<html>
<head>
	<title>Add Data</title>
	<?php include 'header.php';?>    
</head>

<body>
    
    <?php
        include_once("config.php");
    ?>
	<a href="index.php">Volver a Inicio</a>
	<br/><br/>

	<form action="query-add-estampa.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>No.</td>
				<td><input type="number" step="1" name="no"></td>
			</tr>
			<tr> 
				<td>Precio</td>
			<?php
                $id_clase = $_POST['id_clase'];
                $_SESSION["id_clase"] = $id_clase;
                if ($id_clase!=-1){
            ?>    
			
                   <td>
                    <?php
                        //print_r($_POST);
                        
                            $sql = 'SELECT * FROM clase where id_clase='.$id_clase;
                            $query = mysqli_query($mysqli, $sql);

                            echo '<select name="precio" style="width: 200px">';
                                while ($row = mysqli_fetch_array($query)) {
                                    echo '<option value='.$row['valor'].' selected>'.$row['valor'].'</option>';
                                }
                            echo '</select>';
                        
                    ?>
                    </td>
			
            <?php
			    }
                else{
                    echo '<td><input type="number" step=".1" name="precio"></td>';
                }
            ?>
            </tr>
			<tr> 
				<td>Inventario</td>
				<td><input type="number" step="1" name="inventario"></td>
			</tr>
			<tr>
               <td>Album</td>
               <td>
                <?php
                    
                    $sql = "SELECT * FROM album";
                    $query = mysqli_query($mysqli, $sql);

                    echo '<select name="id_album" style="width: 200px">';
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value='.$row['id_album'].'>'.$row['nombre'].'</option>';
                    }
                    echo '</select>';
                ?>
                
                </td>
    
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
