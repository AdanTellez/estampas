<?php
// including the database connection file
include_once("config.php");

//getting id from url
$id_album = $_GET['id'];

//selecting data associated with this particular id
$result 	= mysqli_query($mysqli, "SELECT * FROM album WHERE id_album=$id_album");

while($res 	= mysqli_fetch_array($result))
{
	$name 	= $res['nombre'];
}
?>
<html>
<head>	
	<title>Estampas</title>
	<?php include 'header.php';?>
</head>

<body>
<a href="index.php">Volver a Inicio</a>
<?php echo "<h2>Album  ".$name."</h2>"; ?>
	<table width='50%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Estampas</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	$result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE id_album=$id_album");
	while($res = mysqli_fetch_array($result)) { 
		echo "<tr>";
		echo "<td>Estampa: ".$res['no']."</td>";
		$id_clase = $res['id_clase'];
		$class = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$id_clase");
		while($clase = mysqli_fetch_array($class)) {
			echo "<td>Clase: ".$clase['color']."</td>";
		}
		echo "<td>Precio: ".$res['precio']."</td>";
		echo "<td>Inventario: ".$res['inventario']."</td>";
    //id->id_estampa
		//aux=1 == borrado de estampa
		echo "<td><a href=\"edit-estampa.php?id=$res[id_estampa]\">Edit</a> | <a href=\"delete.php?id=$res[id_estampa]&aux=1\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
</table>
</body>
</html>
