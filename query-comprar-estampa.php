<?php
    // Start the session
    session_start();
?>
<html>
<head>
    <title>Comprar estampa</title>
    <?php include 'header.php';?>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

$estampas = $_SESSION['estampasvendidas'];
    
    $can_estampas = count($estampas);
    for($i = 0; $i <= ($can_estampas-1); $i++){
        $sold = 0;

        $id_estampa = $estampas[$i][0];
        $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE no=$id_estampa");

        while($res = mysqli_fetch_array($result)){
            $resta = ($res['inventario'])-($estampas[$i][1]);
            $sold  = $res['sold'];
        }
        $sold += $estampas[$i][1];
        $result = mysqli_query($mysqli, "UPDATE estampa SET inventario=$resta WHERE no=$id_estampa");
        $result = mysqli_query($mysqli, "UPDATE estampa SET sold=$sold WHERE no=$id_estampa");
    }

        echo "<font color='green'>Compra realizada correctamente.";
        echo "<br/><a href='index.php'>View Result</a>";

// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 

?>
</body>
</html>
