<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
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
        <h1 class="display-4" style="background: linear-gradient(to right, rgb(0, 102, 204), rgb(100, 149, 237), rgb(0, 191, 255));
        -webkit-background-clip: text;background-clip: text;color: transparent;">Detalles de Raúl</h1>
        <div class="container1">

        <?php
        $username = "root";
        $password = "";
        $servername = "localhost";
        $database = "students";
        $conexion = new mysqli($servername, $username, $password, $database);
        if ($conexion->connect_error) {
            die("Conexion Fallida: " . $conexion->connect_error);
        }
        $sql = "SELECT * FROM `alumnos`";
        $resultado = $conexion->query($sql);
        ?>

        <div class = "container">
            <h2 class="display-4">Alumnos reynosenses</h2>

            <?php if($resultado->num_rows >0):?>
                <table>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Sobrenombre</th>
                        <th>Peso</th>
                        <th>Estatura</th>
                        <th>Nivel</th>
                        <th>Institución</th>
                    </tr>

                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila['id']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['apellido']; ?></td>
                        <td><?php echo $fila['sobrenombre']; ?></td>
                        <td><?php echo $fila['peso']; ?></td>
                        <td><?php echo $fila['estatura']; ?></td>
                        <td><?php echo $fila['nivel']; ?></td>
                        <td><?php echo $fila['institucion']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
                <?php else: ?>
                    <p>No se encontraron los estudiantes</p>
                <?php endif; ?>

    </div>
</body>
</html>
