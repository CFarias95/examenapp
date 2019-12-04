<?php
session_start();
if (isset($_SESSION['login_user'])){
include('conexion.php');
$id_profe=$_SESSION['id_user'];
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
            <a class="nav-link" href="salir.php">Salir</a>
        </li>          
        </ul>        
    </div>
    </nav>
    
    <div class="col">
        <form method="POST" action="rep_materias.php">
            <p>Materia:
                <select name="curso">
                    <option value="0">Seleccione:</option>
                    <?php
                    $query2 ="SELECT id_curso, materias.nombre AS descrip FROM cursos
                                JOIN materias on cursos.id_materia=materias.id_mate
                                WHERE cursos.id_profe=$id_profe;";
                    $result2=mysqli_query($con, $query2);

                    while ($valores2 = mysqli_fetch_array($result2)) {
                        echo '<option value="'.$valores2['id_curso'].'">'.$valores2['descrip'].'</option>';
                    }
                    ?>
                </select>
            </p>
            <button type="submite" class="btn btn-success">Generar</button>
        </form>

    </div>
    <div class="col-cm table-responsive">
        <?php
            if(isset($_POST['curso'])){
                $curso=$_POST['curso'];
                $sql="SELECT usuarios.user As Alumno, nota1,nota2,nota3 FROM notas
                        join alumnos on notas.id_alumno=alumnos.id_alumno
                        join usuarios ON alumnos.id_usu=usuarios.idusu
                        WHERE notas.id_curso=$curso;";
                include('listar.php');
                listar($sql,"Alumno","nota1","nota2","nota3");
            }

        ?>
    </div>
</body>
</html>
