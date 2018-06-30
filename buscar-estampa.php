<html>
<head>
	<title>Buscar estampa</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

    $estampas = $_POST['estampas'];
    $estampas = trim($estampas);
    $tamaño   = strlen($estampas);

    for ($i = 0; $i <= $tamaño; $i++) {
        print $estampas[$i];
        
    }

    $result   = mysqli_query($mysqli, "SELECT no, id_album FROM estampa WHERE no='$no' and id_album='$id_album'");
    $res      = mysqli_fetch_array($result);

?>
</body>
</html>
