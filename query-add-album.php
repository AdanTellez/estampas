<html>
<head>
	<title>Add Album</title>
	<?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);

    //$inventario = mysqli_real_escape_string($mysqli, $_POST['inventario']);
    //$inventario = mysqli_real_escape_string($mysqli, $_POST['inventario']);
	// checking empty fields
	if(empty($nombre)) {
				
		if(empty($nombre)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO album(id_album, nombre) VALUES(0,'$nombre')");
        
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
