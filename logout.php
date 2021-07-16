<?php
session_start();
if(isset($_SESSION["name"])){        
    echo "Redirigiendo a Inicio";
    echo "<br>";
    echo "Adios ",$_SESSION['name'];
    session_destroy();
}else{
    echo "No estas logueado";
    echo "<br>";    
    echo "Redirigiendo a Inicio";
}
echo '<meta http-equiv="refresh" content="3;url=index.html">';
die();
?>