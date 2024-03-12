<?php
    session_start();
    require_once("conexion/conexion.php");
    $db = new Database();
    $con = $db -> conectar();


   if (isset($_POST['validar']))
   {
   
    $nombre= $_POST['nombre'];
    $precio= $_POST['precio'];
   

     $sql= $con -> prepare ("SELECT * FROM articulos ");
     $sql -> execute();
     $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);

    
        
        
   
   
     if ( $nombre=="" || $precio=="" )
      {
         echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
         
      }
      
      else{

        
        $insertSQL = $con->prepare("INSERT INTO articulos( nombre, precio) VALUES( '$nombre', '$precio')");
        $insertSQL -> execute();
        echo '<script> alert("REGISTRO EXITOSO");</script>';
       
     }  
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/trabajo.css">
    <title>articulos</title>
</head>
<body>
    
<form  method="POST" autocomplete="off" class="formulario" id="formulario">
             <h1>registro de articulos</h1>
        <div class="conte" id="conte">
                    <h2>nombre del articulo</h2>
             <input type="text" class="inter" name="nombre" id="nombre" placeholder="ingrese nombre">
                        
                        <br>

                    <h2>precio del articulo</h2>
             <input type="number" class="inter" name="precio" id="precio" placeholder="ingrese precio">
             <br>
             <br>
             <input class="b"     type="submit" name="validar" value="Registro">
                        </div>
                       

                      
                      
    </form>

</body>
</html>