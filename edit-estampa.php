<?php
    session_start();
    include_once("config.php");
    $id_estampa = $_GET['id'];
    $_SESSION["id_estampa"] = $id_estampa;
    $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE id_estampa=$id_estampa");

    while($res = mysqli_fetch_array($result))
    {
        $name       = $res['no'];
        $id_clase   = $res['id_clase'];
        $id_album   = $res['id_album'];
        $precio     = $res['precio'];
        $inventario = $res['inventario'];
    }

    $result_album = mysqli_query($mysqli, "SELECT * FROM album WHERE id_album=$id_album");

    while($res_album = mysqli_fetch_array($result_album))
    {
        $album = $res['nombre'];
    }
?>
<html>
<head>
	<title>Edit estampa</title>
	<?php include 'header.php';?>
</head>

<body>
    
	<a href="index.php">Volver a Inicio</a>
    <?php  echo "<br/><a href='javascript:self.history.back();'>Volver</a>"; ?>
	<br/><br/>

	<form action="query-edit-estampa.php" method="post" name="form1">
		<table width="25%" border="0">
				<?php echo "<h2>Estampa  ".$name."</h2>"; ?>

            <tr> 
                <td>Clase</td>
                   <td>
                    <?php
                        //print_r($_POST);
                        $sql = 'SELECT * FROM clase';
                        $query = mysqli_query($mysqli, $sql);

                        echo '<select name="clase" style="width: 200px">';
                            while ($row = mysqli_fetch_array($query)) {
                                if($row['id_clase']==$id_clase){
                                    echo '<option value='.$row['id_clase'].' selected>'.$row['color'].'</option>';
                                }else{
                                    echo '<option value='.$row['id_clase'].'>'.$row['color'].'</option>';
                                }
                            }
                        echo '</select>';
                    ?>
                    </td>
            </tr>
			<tr> 
				<td>Album</td>
                   <td>
                    <?php
                        //print_r($_POST);
                        $sql = 'SELECT * FROM album';
                        $query = mysqli_query($mysqli, $sql);

                        echo '<select name="album" style="width: 200px">';
                            while ($row = mysqli_fetch_array($query)) {
                                if($row['id_album']==$id_album){
                                    echo '<option value='.$row['id_album'].' selected>'.$row['nombre'].'</option>';
                                }else{
                                    echo '<option value='.$row['id_album'].' >'.$row['nombre'].'</option>';
                                }
                                
                            }
                        echo '</select>';
                    ?>
                    </td>
            </tr>
            <tr> 
                <td>No.</td>
                <?php echo '<td><input type=number step=1 name=no value='.$name.'></td>'; ?>
            </tr>
            <tr> 
                <td>Precio</td>
                <?php if($id_clase==-1){
                    echo '<td><input type=number step=1 name=precio value='.$precio.'></td>'; 
                    }else{
                        echo '<td><input type=number step=1 name=precio value='.$precio.' readonly></td>'; 
                    }
                ?>
            </tr>
            <tr> 
                <td>Inventario.</td>
                <?php echo '<td><input type=number step=1 name=inventario value='.$inventario.'></td>'; ?>
            </tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
