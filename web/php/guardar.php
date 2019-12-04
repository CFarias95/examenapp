<?php
include('conexion.php');
$alumno=$_POST['nombre'];
$periodo=$_POST['periodo'];
$curso=$_POST['curso'];
$nota1=$_POST['nota1'];
$nota2=$_POST['nota2'];
$nota3=$_POST['nota3'];

$sql="INSERT INTO notas(id_alumno,id_periodo,id_curso,nota1,nota2,nota3) VALUES($alumno,$periodo,$curso,$nota1,$nota2,$nota3);";
$res=mysqli_query($con, $sql);

if($res){
    echo "<script>
                alert('Se han guardado los datos');
                window.location= 'registrar.php'
    </script>";
}else{
    echo "<script>
                alert('No se pudieron guardar los datos');
                window.location= 'registrar.php'
    </script>";
}
