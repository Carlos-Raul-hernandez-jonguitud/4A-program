<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raúl</title>
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
        -webkit-background-clip: text;background-clip: text;color: transparent;">Insertar datos de Raúl</h1>
    </div>

<div class="container1 form-group">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required><br>

        <label for="Apellido">Apellido:</label>
        <input type="text" id="Apellido" name="Apellido" required><br> 

        <label for="Interes">Sobrenombre:</label>
        <input type="text" id="Sobrenombre" name="Sobrenombre" required><br>

        <label for="Promedio">Peso:</label>
        <input type="text" id="Peso" name="Peso" required><br>

        <label for="Semestre">Estatura:</label>
        <input type="tet" id="Estatura" name="Estatura" required><br>

        <label for="TerapiaFavorita">Nivel:</label>
        <input type="text" id="Nivel" name="Nivel" required><br>

        <label for="Universidad">Institución:</label>
        <input type="text" id="Institución" name="Institución" required><br>

        <input type="submit" value="Agregar Registro">
    </form>

<?php
$username = "root";
$password = "";
$servername = "localhost";
$database = "students";

$conexion = new mysqli($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Fallo en la conexión: " . $conexion->connect_error);
}

function insertarAlumno($conexion){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($_POST);
        $nombre = $conexion->real_escape_string($_POST["nombre"]);
        $apellido = $conexion->real_escape_string($_POST["apellido"]);
        $sobrenombre = $conexion->real_escape_string($_POST["sobrenombre"]);
        $peso = $conexion->real_escape_string($_POST["peso"]);
        $estatura = $conexion->real_escape_string($_POST["estatura"]);
        $nivel = $conexion->real_escape_string($_POST["nivel"]);
        $institucion = $conexion->real_escape_string($_POST["institucion"]);

        $sql = "INSERT INTO alumnos (nombre, apellido, sobrenombre, peso, estatura, nivel, institucion)
            VALUES ('$nombre', '$apellido', '$sobrenombre', $peso, $estatura, '$nivel', '$institucion')";

        if ($conexion->query($sql) === TRUE) {
            echo "<p style='color: green;'>Registro añadido</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p style='color: red;'>Error al registrar: " . $conexion->error . "</p>";
        }
    }
}

insertarAlumno($conexion);
$sql = "SELECT * FROM alumnos";
$resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        echo "<table border='1' cellpadding='5' style='margin-top:20px;'>";
        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Sobrenombre</th><th>Peso</th><th>Estatura</th>
        <th>Nivel</th><th>Institución</th></tr>";
        while($row = $resultado->fetch_assoc()) {
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nombre'] . "</td><td>" . $row['apellido'] . "</
            td><td>" . $row['sobrenombre'] . "</td><td>" . $row['peso'] . "</td><td>" . $row['estatura'] . "</
            td><td>" . $row['nivel'] . "</td><td>" . $row['institucion'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron registros</p>";
    }
    $conexion->close();
    ?>
</div>
</body>
</html>

