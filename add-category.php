<html>
<head>
	<title>Agregar Categoría</title>
	<?php include 'header.php';?>
</head>

<body>
	<a href="index.php">Volver a Inicio</a>
	<br/><br/>

	<form action="query-add-category.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Color</td>
				<td><input type="text" name="color"></td>
			</tr>
			<tr>
			    <td>Valor</td>

			    <!-- step=0.1 y en la base está como Int -->
				<td><input type="number" name="valor" step="0.1"></td>
			</tr>
			<tr> 
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
