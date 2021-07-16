<html>
    <head>
        <title>Datos Personales</title>
        <link rel="stylesheet" href="css/loginform.css">
    </head>
    </body>
        <header>
            <h1 id="titulo">Banco</h1>
            <a class="" href="perfilUsuario.php">Regresar a perfil</a>
            <div class="bar">
                <a class="" href="logout.php" >Log out</a>
            </div>
        </header>
        <h2>Informacion</h2>
        <?php
            if(  !($link = new mysqli("localhost:3306", "administrador", "soy_el_admin", "Banco")) )
                die("Error: no se puedo establecer conexion con la base de datos");
            session_start();
            //print_r($_SESSION);
            $email = $_SESSION['email'];
            $query = "select * from datosUsuario a where email = '$email'";
            $resultado = $link->query($query);
            $campos = mysqli_fetch_array($resultado);
            $id = $campos['id'];
            $queryCuenta = "select * from datosCuenta where id_cliente = $id";
            if(!($resultado2 = $link->query($queryCuenta))) 
                die("Error: no se pudo realizar la consulta");
            $camposCuenta = mysqli_fetch_array($resultado2);
            print_r($camposCuenta);
            echo '<h3>Nombre: </h3>'.$campos['nombre'];
            echo '<h3>Apellido Paterno: </h3>'.$campos['apepat'];
            echo '<h3>Apellido Materno: </h3>'.$campos['apemat'];
            echo '<h3>E-mail: </h3>'.$campos['email'];
            echo '<h3>Telefono: </h3>'.$campos['telefono'];
            echo '<h3>Estado: </h3>'.$campos['nombreEdo'];
            echo '<h3>Municipio: </h3>'.$campos['municipio'];
            echo '<h3>Colonia: </h3>'.$campos['dir_col'];
            echo '<h3>Calle: </h3>'.$campos['dir_calle'];
            echo '<h3>Codigo Postal: </h3>'.$campos['dir_cp'];
            echo '<h3>Saldo: </h3>'.$camposCuenta['saldo'];
            
        ?>
    </body>
</html>