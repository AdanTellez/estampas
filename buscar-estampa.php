<html>
<head>
	<title>Buscar estampa</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

    //$estampas = $_POST['estampas'];
    $estampas="16-123-8,12-66,3";  
    $estampas = trim($estampas);
    $tamaño   = strlen($estampas);
    
    print $estampas;
    echo "<br>";
    
    $cont=0;

    for ($i = 0; $i <= $tamaño; $i++) {
         //contador para cada estampa
        $no_cantidad[$cont][1]=1; //para este arreglo, en su segunda dimensión, [0] es el no. de estampa
        // y [1] es la cantidad de veces que se quiere dicha estampa.
        
        //print $estampas[$i];

        if (is_numeric($estampas[$i])){
                $no_cantidad[$cont][0].=$estampas[$i];
            //.= append
        }
        else{
            //si es ,
            if($estampas[$i]==","){
                $no_cantidad[$cont][1]="";
                $i++;
                    while (is_numeric($estampas[$i])){
                        $no_cantidad[$cont][1].=$estampas[$i]; //número de veces que quiere la estampa
                        $i++;
                    } 
            }
            // cuando es -
             $cont++;  
        }
        
    }
    
    
    echo '<pre>';
		print_r($no_cantidad);
    echo '</pre>';
    

    //$result   = mysqli_query($mysqli, "SELECT no, id_album FROM estampa WHERE no='$no' and id_album='$id_album'");
    //$res      = mysqli_fetch_array($result);

?>
</body>
</html>
