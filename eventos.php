<?php
    
    header('Content-Type: application/json');
    //$pdo=new PDO("mysql:dbname=sistema;host=127.0.0.1","root","");
    $pdo=new PDO('mysql:host=127.0.0.1;dbname=sistema;charset=UTF8','root','');

    $accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
    switch($accion){
        case 'agregar':
            //Instrucción de agregado
            echo $_POST['title'];   
            $sentenciaSQL = $pdo->prepare("INSERT INTO eventos(title,descripcion,color,textColor,start,end,link) VALUES(:title,:descripcion,:color,:textColor,:start,:end,:link)");

            $respuesta=$sentenciaSQL->execute(array(
                "title"=>$_POST['title'],
                "descripcion"=>$_POST['descripcion'],
                "color"=>$_POST['color'],
                "textColor"=>$_POST['textColor'],
                "start"=>$_POST['start'],
                "end"=>$_POST['end'],
                "link"=>$_POST['link']
                
            ));

            echo json_encode($respuesta);
            break;
        case 'eliminar':
            //Instrucción de agregado
            echo "Instrucción eliminar";
            break;
        case 'modificar':
            //Instrucción de modificar
            echo "Instrucción modificar";
            break;
        default:
                $sentenciaSQL = $pdo->prepare("SELECT * FROM eventos");
                $sentenciaSQL->execute();
            
                $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($resultado);
            break;
    }
    //Seleccionar los eventos del calendario
    
?>