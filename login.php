<?php
    //Se obtienen las credenciales para logearse
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $link = new mysqli("localhost:3306", "administrador", "soy_el_admin", "Banco");
    if(!$link){
        echo "Conexión fallida, revise su archivo de configuración";
    }
    //Esto se va a poner en un stored procedure
    $usuario = mysqli_query($link, "select nombre, apepat, apemat, telefono, dir_calle, dir_num, dir_col, dir_cp, nombreEdo, email, municipio, pass                                        
                                    from cliente a, estado b, municipio c                                     
                                    where a.email = '$email' and a.pass = sha('$pass') and (b.idEdo = a.dir_est and c.idMun = a.dir_mun)"
    );
    //Se obtiene un array con los campos de la consulta
    $campos = mysqli_fetch_array($usuario);
    if( !isset($campos) ){
        header("Location: oops.php", true, 303);
        die();
    }
    //Datos que estarán disponibles durante la sesión del usuario
    session_start();
    $_SESSION['nombre'] = $campos['nombre'];
    $_SESSION['apepat'] = $campos['apepat'];
    $_SESSION['apemat'] = $campos['apemat'];
    $_SESSION['email'] = $campos['email'];
    $_SESSION['pass'] = $campos['pass'];
    header("Location: perfilUsuario.php", true);
    mysqli_close($link);
?>
