<?php
session_start();

include('conexion.php');

if(isset($_POST['correo']) and isset($_POST['contraseña']) and isset($_POST['contraseña1']) and isset($_POST['rol'])){

    $contraseña1=$_POST['contraseña'];
    $contraseña2=$_POST['contraseña1'];

    if($contraseña1 == $contraseña2){
        $correo=$_POST['correo'];
        $contraseña=$_POST['contraseña'];
        $rol=$_POST['rol'];

        $sql="INSERT INTO usuarios(user,password,rol) VALUES('$correo','$contraseña','$rol');";
        $res= mysqli_query($con,$sql);
        if($res){
            echo "<script>
            alert('Usuario ingresado exitosamente');
            header('location: nuevo.php');
            </script>";
        }else{
            echo "<script>
            alert('No se pudieron guardar los datos');
            header('location: nuevo.php');
            </script>";
        }

    }else{
        echo "<script>
        alert('Las contraseñas no conciden');
        header('location: nuevo.php');
        </script>";
    }
}

//inicia el HTML
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/main.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!------ Include the above in your HEAD tag ---------->
    <title>Cursos</title>
</head>
<body>    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="registrar.php">Registrar</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reportes
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="rep_cursos.php">Cursos</a>
            <a class="dropdown-item" href="rep_materias.php">Materias</a>
            <a class="dropdown-item" href="rep_periodo.php">periodo</a>
            </div>
        </li>  
        <li class="nav-item active">
            <a class="nav-link" href="nuevo.php">Nuevo</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="salir.php">Salir</a>
        </li>      
        </ul>        
    </div>
    </nav>
    
    <div class="col">
        <form method="POST" action="nuevo.php">
            <p>correo:
                <input type="mail" name="correo">
            </p>
            <p>Contraseña:
                <input type="password" name="contraseña">
            </p>
            <p>Confirme contraseña:
                <input type="password" name="contraseña1">
            </p>
            <p>Rol:
                <select name="rol">
                    <option value="ALUMNO" >ALUMNO</option>
                    <option value="PROFE" >PROFESOR</option>
                    <option value="ADMIN" >ADMINISTRADOR</option>                
                </select>
            </p>
            <button type="submite" class="btn btn-success">Guardar</button>
        </form>

    </div>
    
</body>
</html>
<?php
