<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raul</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-light navbarBg">
        <div class="container">
            <a class="navbar-brand in" href="/bd_raul/index.html" style="color: white;">Inicio</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="font-menu nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 1</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="hola dropdown-item" href="/bd_raul/raul1.php">Página 1</a>
                            <a class="dropdown-item" href="/bd_raul/raul2.php">Página 2</a>
                            <a class="dropdown-item" href="/bd_raul/raul3.php">Página 3</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 2</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/bd_raul/raul4.php">Página 4</a>
                            <a class="dropdown-item" href="/bd_raul/raul5.php">Página 5</a>
                            <a class="dropdown-item" href="/bd_raul/raul6.html">Página 6</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" style="color: white;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidad 3</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/bd_raul/raul7.html">Página 7</a>
                            <a class="dropdown-item" href="/bd_raul/raul8.html">Página 8</a>
                            <a class="dropdown-item" href="/bd_raul/raul9.html">Página 9</a>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <h1 class="display-4" style="background: linear-gradient(to right, rgb(0, 153, 255), rgb(0, 102, 204), rgb(0, 51, 153));
        -webkit-background-clip: text;background-clip: text;color: transparent;">PAGINA DE MOSTRAR DATOS RELACIONALES</h1>
    </div>
    
    <div class="contenedor">
        <div class="container1 form-group">
        <form method="POST" id="formulario">  
        <div class="form-group"><label for="numero_control">Numero de Control: </label>
        <input type="text" id="numero_control" name="numero_control" requiered><br></div>
        <div class="form-group"><label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre"requiered><br></div>
        <div class="form-group"><label for="apellido_paterno">Apellido Paterno: </label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" requiered><br></div>
        <div class="form-group"><label for="apellido_materno">Apellido Materno: </label>
        <input type="text" id="apellido_materno" name="apellido_materno" requiered><br></div>
        <div class="form-group"><label for="edad">Edad: </label>
        <input type="text" id="id_edad" name="id_edad" requiered><br></div>
        <div class="form-group"><label for="colonia">Colonia: </label>
        <input type="text" id="id_colonia" name="id_colonia" requiered><br></div>
        <div class="form-group"><label for="especialidad">Especialidad: </label>
        <input type="text" id="id_especialidad" name="id_especialidad" requiered><br></div>
        <div class="form-group"><label for="genero">Genero: </label>
        <input type="text" id="id_genero" name="id_genero" requiered><br></div>
        <div class="form-group"><label for="correo">Correo: </label>
        <input type="email" id="correo" name="correo" requiered><br></div>
        <div class="form-group"><label for="telefono">Telefono: </label>
        <input type="text" id="telefono" name="telefono" requiered><br></div>
        <div class="form-group"><label for="fecha_ingreso">Fecha de Ingreso: </label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" requiered><br></div>
        <div class="form-group"><input type="submit" value="Agregar Registro"></div>
        </form>
    
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $username = "root";
        $password = "";
        $servername = "localhost";
        $database = "escuela";
        $conexion = new mysqli($servername, $username, $password, $database);
        if ($conexion->connect_error) {
            die("Conexion Fallida: " . $conexion->connect_error);
        }
        function insertarAlumno($conexion)
        {
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                var_dump($_POST);//linea dedicada para depurar
                $numero_control = $conexion->real_escape_string($_POST ["numero_control"]);
                $nombre = $conexion->real_escape_string($_POST ["nombre"]);
                $apellido_paterno = $conexion->real_escape_string($_POST ["apellido_paterno"]);
                $apellido_materno = $conexion->real_escape_string($_POST ["apellido_materno"]);
                $id_edad = $conexion->real_escape_string($_POST ["id_edad"]);
                $id_colonia = $conexion->real_escape_string($_POST ["id_colonia"]);
                $id_especialidad = $conexion->real_escape_string($_POST ["id_especialidad"]);
                $id_genero = $conexion->real_escape_string($_POST ["id_genero"]);
                $correo = $conexion->real_escape_string($_POST ["correo"]);
                $telefono = $conexion->real_escape_string($_POST ["telefono"]);
                $fecha_ingreso = $conexion->real_escape_string($_POST ["fecha_ingreso"]);
                $sql = "INSERT INTO alumnos (numero_control, nombre, apellido_paterno, apellido_materno,
                id_edad, id_colonia, id_especialidad, id_genero, correo, telefono, fecha_ingreso)
                VALUES ('$numero_control', '$nombre', '$apellido_paterno', '$apellido_materno',
                '$id_edad', '$id_colonia', '$id_especialidad', '$id_genero', '$correo', '$telefono', '$fecha_ingreso')";
                if ($conexion->query($sql) == TRUE) {
                    echo "<p class='success'>Nuevo alumno agrregado con éxito.</p>";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "<p class='error'>Error al agregar al alumno: " . $conexion->error . "</p>";
                }
            }
        }
        insertarAlumno($conexion);
        $sql = "SELECT * FROM alumnos";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            echo "<table class= 'table table-bordered'>";
            echo "<tr><th>id</th><th>No. Control</th><th>Nombre</th><th>Apellido P</th><th>Apellido M</th><th>Edad</th>
            <th>Colonia</th><th>Especilidad</th><th>Genero</th><th>Correo</th><th>Telefono</th><th>Fecha Ingreso</th></tr>";
            while($row = $resultado->fetch_assoc()){
                echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['numero_control'] . "</td>
                <td>" . $row['nombre'] . "</td>
                <td>" . $row['apellido_paterno'] . "</td>
                <td>" . $row['apellido_materno'] . "</td>
                <td>" . $row['id_edad'] . "</td>
                <td>" . $row['id_colonia'] . "</td>
                <td>" . $row['id_especialidad'] . "</td>
                <td>" . $row['id_genero'] . "</td>
                <td>" . $row['correo'] . "</td>
                <td>" . $row['telefono'] . "</td>
                <td>" . $row['fecha_ingreso'] . "</td>
                </tr>";
            }
            echo "</table>";
        }   else{
            echo "<p>No se encontraron registros en la base de datos</p>";
        }
        $conexion->close();
        ?>
    </div>
</div>
</body>
</html>
