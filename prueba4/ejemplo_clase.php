<?php
// Incluir la clase Database
require_once 'Database.php';

try {
    // Obtener la conexión a la base de datos
    $db = Database::getInstance();

    // Preparar la consulta (por ejemplo, obtener todos los registros de una tabla llamada "usuarios")
    $query = $db->prepare("SELECT * FROM usuarios");
    
    // Ejecutar la consulta
    $query->execute();
    
    // Obtener los resultados
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar los resultados
    foreach ($resultados as $fila) {
        echo 'ID: ' . $fila['id'] . ' - Nombre: ' . $fila['nombre'] . '<br>';
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}