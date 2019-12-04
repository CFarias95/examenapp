<?php
session_start();
if (isset($_SESSION['login_user'])){
include('conexion.php');
$id_profe=$_SESSION['id_user'];

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
    <title>Inicio</title>
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
            <a class="dropdown-item" href="#">Profesor</a>
            <a class="dropdown-item" href="#">periodo</a>
            </div>
        </li>
        
        </ul>
        
    </div>
    </nav>
    <div class="container" >
    <form action="guardar.php" method="POST">
        <p>Alumno:
        <select name="nombre">
            <option value="0">Seleccione:</option>
            <?php
            $query ="select idusu,user FROM usuarios 
                JOIN alumnos ON usuarios.idusu=alumnos.id_usu
                JOIN cursos ON alumnos.id_curso=cursos.id_curso
                WHERE cursos.id_profe = '$id_profe';";
                $result=mysqli_query($con, $query);

            while ($valores = mysqli_fetch_array($result)) {
                echo '<option value="'.$valores['idusu'].'">'.$valores['user'].'</option>';
            }
            ?>
        </select>
        </p>
        <p>Periodo:
        <select name="periodo">
            <option value="0">Seleccione:</option>
            <?php
            $query1 ="SELECT * FROM periodos;";
            $result1=mysqli_query($con, $query1);

            while ($valores1 = mysqli_fetch_array($result1)) {
                echo '<option value="'.$valores1['id_periodo'].'">'.$valores1['descrip'].'</option>';
            }
            ?>
        </select>
        </p>
        <p>Curso:
        <select name="curso">
            <option value="0">Seleccione:</option>
            <?php
            $query2 ="SELECT id_curso,descrip FROM cursos WHERE id_profe='$id_profe';";
            $result2=mysqli_query($con, $query2);

            while ($valores2 = mysqli_fetch_array($result2)) {
                echo '<option value="'.$valores2['id_curso'].'">'.$valores2['descrip'].'</option>';
            }
            ?>
        </select>
        </p>
        <p>Nota 1 <input type="numeric" name="nota1" ></p>
        <p>Nota 2 <input type="numeric" name="nota2" ></p>
        <p>Nota 3 <input type="numeric" name="nota3" ></p>
        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </p>
    </form>
        </div>
</body>
</html>
<?php
}else{
    header('Location: ../index.html');
}