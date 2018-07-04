<html>
<head>
	<title>Add Data</title>
	<?php include 'header.php';?>
</head>

<body>
	<a href="index.php">Volver a Inicio</a>
	<br/><br/>

	<form action="query-add-album.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nombre del Album</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

