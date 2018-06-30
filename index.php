<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM album ORDER BY id_album DESC"); // using mysqli_query instead
$result_clase = mysqli_query($mysqli, "SELECT * FROM clase ORDER BY id_clase DESC");

?>
<!-- -->
<html>
<head>	
	<title>Estampas</title>
</head>

<body>
<!--<a href="add-estampa.php">Add New Data</a><br/><br/> -->

<form action="add-estampa.php" method="post" >
  <table>
       <tr>
           <td>Clase</td>
           <td>
            <?php
                include_once("config.php");
                $sql = "SELECT * FROM clase";
                $query = mysqli_query($mysqli, $sql);

                echo '<select name="id_clase" style="width: 200px">';
                    while ($row = mysqli_fetch_array($query)) {
                        echo '<option value='.$row['id_clase'].'>'.$row['color'].'</option>';
                    }
                echo '</select>';
            ?>

            </td>
    
        </tr>
   </table> 
   <input type="submit"  name="class-selector" value="Añadir estampa nueva" >
</form>

<form action="buscar-estampa.php" method="post" >
  <table>
       <tr>
           <td>Estampas</td>
            <td><input type="text" name="estampas"></td>
        </tr>
   </table> 
   <input type="submit"  name="class-selector" value="buscar estampas" >
</form>

<a href="add-album.html">Add New Album</a><br/><br/>
<a href="add-category.html">Agregar clase</a><br/><br/>

<h2>Albums</h2>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nombre</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['nombre']."</td>";
    //id->id_album
    //aux=2 == borrado de album
		echo "<td><a href=\"edit.php?id=$res[id_album]\">Estampas</a> | <a href=\"delete.php?id=$res[id_album]&aux=2\" onClick=\"return confirm('Are you sure you want to delete?, todas las estampas del album serán eliminadas')\">Delete</a></td>";		
	}
	?>
	</table>

  <h2>Clases</h2>
  <table width='70%' border=0>

  <tr bgcolor='#CCCCCC'>
    <td>Color</td>
  </tr>
  <?php 
  //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
  while($res = mysqli_fetch_array($result_clase)) {  
  if($res['id_clase']!=-1){   
    echo "<tr>";
    echo "<td>".$res['color']."</td>";
    //id->id_clase
      echo "<td><a href=\"edit-class.php?id=$res[id_clase]\">Editar clase</a></td>";
    }    
  }
  ?>
  </table>
</body>
</html>
