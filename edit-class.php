<?php
    session_start();
    include_once("config.php");
    $id_clase = $_GET['id'];
    $_SESSION['id_clase']=$id_clase;
    $result = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$id_clase");

    while($res = mysqli_fetch_array($result))
    {
        $color   = $res['color'];
        $valor   = $res['valor'];
    }
?>
<html>
<head>
	<title>Edit Clase</title>
	<?php include 'header.php';?>
</head>

<body>
    
	<a href="index.php">Volver a Inicio</a>
	<br/><br/>

	<form action="query-edit-class.php" method="post" name="form1">
		<table width="25%" border="0">
				<?php echo "<h2>Clase  ".$color."</h2>"; ?>
            <tr> 
                <td>Color.</td>
                <?php echo '<td><input type=text name=color value='.$color.'></td>'; ?>
            </tr>
            <tr> 
                <td>Valor</td>
                <?php echo '<td><input type=number step=1 name=valor value='.$valor.'></td>'; ?>
            </tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
