<?php

include 'conexion1.php';

$nombre = $_POST ['Nombref'];
$correo = $_POST ['Correof'];
$usuario = $_POST ['Usuariof'];
$contrasena = $_POST ['Contrasenaf'];

$query = "INSERT INTO Usuarios2(NombreCompleto, CorreoElectronico, Usuario, Contrasena) 
          VALUES ('$nombre', '$correo', '$usuario', '$contrasena')";

// $ejecutar = mysqli_query($conexion, $query);

// Preparar la consulta
// Preparar la consulta
$query = "INSERT INTO Usuarios2(NombreCompleto, CorreoElectronico, Usuario, Contrasena) 
          VALUES (:nombre, :correo, :usuario, :contrasena)";

// Preparar la consulta
$statement = $conexion->prepare($query);

// Asignar valores a los marcadores de posición
$statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$statement->bindParam(':correo', $correo, PDO::PARAM_STR);
$statement->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$statement->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

// Ejecutar la consulta
$resultado = $statement->execute();

if ($resultado) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar el usuario: " . implode(", ", $statement->errorInfo());
}

?>