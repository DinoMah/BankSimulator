<?php
    //Campos para registrar el usuario
    $nombre = $_POST["nombre"];
    $apepat = $_POST["apepat"];
    $apemat = $_POST["apemat"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $colonia = $_POST['colonia'];
    $calle = $_POST['calle'];
    $codigoPostal = $_POST['codigoPostal'];
    $numInt = $_POST['numInt'];
    $edad = $_POST['edad'];
    echo '
        <html>
        <head>
            <title>Hello</title>
            <link rel="stylesheet" href="css/style.css">
            
        </head>
        <body>
    ';
    //Se verifica que se haga la conexión con la base de datos
    if(  !($link = new mysqli("localhost:3306", "administrador", "soy_el_admin", "Banco")) )
        die("Error: no se puedo establecer conexion con la base de datos");
    $sql = "select * from cliente where email='$email'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "E-mail en uso, intentelo de nuevo";
        mysqli_free_result($result);
    } 
    else {
        $sql = "call registrar('$nombre', '$apepat', '$apemat', '$email', '$pass', '$telefono', $estado, $municipio, '$colonia', '$calle', '$codigoPostal', $numInt, $edad)";
        if ($link->query($sql) === TRUE)
            echo '
                Se ha registrado correctamente, por favor click en el <a href="login.html">link</a> para redirigir a inicio.
            ';
        else
            echo "Error: " . $sql . "<br>" . $link->error;
    }
    echo '
            </body>
        </html>
    ';
    mysqli_close($link);
?>