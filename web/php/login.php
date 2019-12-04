<?php
session_start(); 
$correo=$_POST['correo'];
$password=$_POST['contra'];

$usuario = "carloscndres21";
$contrasena = "carlos21";  
$servidor = "db4free.net";
$basededatos = "datosapp";

$conexion = mysqli_connect( $servidor, $usuario,$contrasena,$basededatos)or die ("No se ha podido conectar al servidor de Base de datos");
$sql="SELECT * from usuarios WHERE user = '$correo' AND password='$password'";
$res = mysqli_query($conexion,$sql);


if($row=mysqli_fetch_array($res)) {  
    $_SESSION['id_user']=$row['idusu'];
    $_SESSION['login_user'] = $correo;
    $_SESSION['login_rol']= $row['rol'];
    if($row['rol'] !='PROFE' and $row['rol'] !='ADMIN'){
        echo "<script>
                alert('No tienes Autorizasion para este sitio');
                header('location: ../index.html');
    </script>";
    }
    header("location: home.php");
 }else {
    header("location: ../index.html");
 }