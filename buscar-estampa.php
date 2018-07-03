<html>
<head>
	<title>Buscar estampa</title>
	<?php include 'header.php';?>
</head>

<body>
<a href="index.php">Home</a>
<?php
//including the database connection file
include_once("config.php");

    $estampas = $_POST['estampas'];
    //$estampas="16-123-8,12-66,3";  
    $estampas = trim($estampas);
    $tamaño   = strlen($estampas);
    $total[0] = 0;
    
    //print $estampas;
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
		//print_r($no_cantidad);
    echo '</pre>';

    
    $can_estampas = count($no_cantidad);


    
    for($i = 0; $i <= ($can_estampas-1); $i++){
        $total[$i] = 0;
        $id_estampa = $no_cantidad[$i][0];

        while($no_cantidad[$i][1] > 0){
            $result = mysqli_query($mysqli, "SELECT * FROM estampa WHERE no=$id_estampa");

            while($res = mysqli_fetch_array($result))
            {
                $clase[$i] = $res['id_clase'];
                $total[$i] += $res['precio']; 
            }
            $no_cantidad[$i][1] -= 1;
        }

    }

    echo '<pre>';
        //arreglo de los totales por clase
        //print_r($total);
        //clases que existen en la busqueda
        //print_r($clase);
    echo '</pre>';

    $total_general=0;
    for($i = 0; $i < count($clase); $i++){
        $aux = $clase[$i];
        $result = mysqli_query($mysqli, "SELECT * FROM clase WHERE id_clase=$aux");

        while($res = mysqli_fetch_array($result))
        {
            print "Total de la clase ".$res['color'].": ".$total[$i];
            echo "<br>";
        }
        $total_general += $total[$i];
    }
    print "Total general: ".$total_general;


    //$result   = mysqli_query($mysqli, "SELECT no, id_album FROM estampa WHERE no='$no' and id_album='$id_album'");
    //$res      = mysqli_fetch_array($result);

?>


</body>
</html>
