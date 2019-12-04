<?php
session_start(); 
$correo=$_POST['correo'];
$password=$_POST['contra'];

$usuario = "zI3A1dntcU";
$contrasena = "FIrW5OPY01";  
$servidor = "remotemysql.com";
$basededatos = "zI3A1dntcU";

$conexion = mysqli_connect( $servidor, $usuario,$contrasena,$basededatos)or die ("No se ha podido conectar al servidor de Base de datos");
$sql="SELECT * from usuarios WHERE user = '$correo' AND password='$password'";
$res = mysqli_query($conexion,$sql);


if($row=mysqli_fetch_array($res)) {  
    $_SESSION['id_user']=$row['idusu'];
    $_SESSION['login_user'] = $correo;
    if($row['rol'] !='PROFE'){
        echo "<script>
                alert('No tienes Autorizasion para este sitio');
                header('location: ../index.html');
    </script>";
    }
    header("location: home.php");
 }else {
    header("location: ../index.html");
 }