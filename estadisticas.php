<?php
// including the database connection file
include_once("config.php");

//selecting data associated with this particular id
?>
<html>
<head>  
  <title>Estampas</title>
  <?php include 'header.php';?>
</head>

<body>
<a href="index.php">Volver a Inicio</a>
<?php echo "<h2>Estampas vendidas"; ?>
  <table width='50%' border=0>

  <tr bgcolor='#CCCCCC'>
    <td>Estampas</td>
  </tr>
  <?php 
  //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
    $result   = mysqli_query($mysqli, "SELECT * FROM estampa ORDER BY sold DESC");
    while($res  = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>Estampa: ".$res['no']."</td>";
      $id_album = $res['id_album'];
      $albu     = mysqli_query($mysqli, "SELECT * FROM album WHERE id_album=$id_album");
      while($album  = mysqli_fetch_array($albu)){
        echo "<td>Album: ".$album['nombre']."</td>";
      }
      echo "<td>Total de ventas: ".$res['sold']."</td>";
    }
  ?>
</table>
</body>
</html>
