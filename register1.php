<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="css/loginform.css">
    </head>
    <body>
        <header>
            <div class="login-form">
                <h1 id="titulo">Banco de Pavos</h1>
                <h2 id="subtitulo">Registro</h2>
                <div class="bar">
                    <a class="" href="index.html" >Inicio</a>
                    <a class="" href="login.html">Login</a>
                </div>
            </div>
        </header>
        <form action="register.php" method="POST">
            <h3>Nombre</h3><input type="text" name="nombre" placeholder="Nombre"><br>
            <h3>Apellido Paterno</h3><input type="text" name="apepat" placeholder="Apellido Paterno"><br>
            <h3>Apellido Materno</h3><input type="text" name="apemat" placeholder="Apellido Materno"><br>
            <h3>Correo Electronico</h3><input type="text" name="email" placeholder="email"><br>
            <h3>Contrasena</h3><input type="password" name="pass" placeholder="password"><br>
            <h3>Telefono</h3><input type="text" name="telefono" placeholder="Telefono"><br>
            <h3>Edad</h3><input type="text" name="edad" placeholder="Ingresa tu edad"><br>
            <h3>Estado</h3>
            <select name="estado">
                <option selected> ---
                <?php
                    if( !($connection = new mysqli("localhost:3306","administrador","soy_el_admin","Banco")) )
                        die("Error, no se pudo conectar con la base de datos");
                    $selectState = mysqli_query($connection, "select nombreEdo from estado");
                    if(!$selectState) 
                        die("Error: no se pudo realizar la consulta");
                    $valor = 1;
                    while($row = mysqli_fetch_assoc($selectState)){
                        echo "<option value=".$valor.">".$row['nombreEdo'];
                        $valor++;
                    }
                    mysqli_free_result($selectState);
                    
                ?>
            </select>
            <!-- Se busca  que el apartado de municipios solo muestre los municipios del estado seleccionado anteriormente-->
            <h3>Municipio</h3>
            <select name="municipio" id="municipio">
                <option selected> ---
                <?php
                    $selectTown = mysqli_query($connection, "select municipio from municipio");
                    if(!$selectTown)
                        die("Error: no se pudo realizar la consulta");
                    $valor = 1;
                    while($row = mysqli_fetch_assoc($selectTown)){
                        echo "<option value=".$valor.">".$row['municipio'];
                        $valor++;
                    }
                    mysqli_free_result($selectTown);
                    mysqli_close($connection);
                ?>
            </select>
            <h3>Colonia</h3><input type="text" name="colonia" placeholder="Colonia"><br>
            <h3>Calle</h3><input type="text" name="calle" placeholder="Calle"><br>
            <h3>Numero Interior</h3><input type="text" name="numInt" placeholder="Numero Int."><br>
            <h3>Codigo Postal</h3><input type="text" name="codigoPostal" placeholder="Codigo Postal"><br>
            <input type="submit" value="Registrar">
        </form>
    </body>
</html>