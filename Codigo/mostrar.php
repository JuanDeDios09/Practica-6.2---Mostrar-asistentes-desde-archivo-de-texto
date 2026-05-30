<?php
// nombre del archivo que contene los asistentes
// Este script lee un archivo de textto y muestra los nombres de los asistentes en una lista eneumerada
$archivo = "asistentes.txt";

try {
    // Verifica si el archivo existe 
    if (!file_exists($archivo)) {
        throw new Exception("El archivo no existe.");
    }

    //Abrir el archivo para lectura 
    $fp = fopen($archivo, "r");

    echo "<ol>";

    // Si no pudo abrir el archivo, lanzamos una excepcion
    $contador = 1;
    while (!feof($fp)) {
        // Leemos una linea del archivo
        $linea = fgets($fp);

        if (trim($linea) != "") {

            //htmlspecialchars() para evitar problemas de seguridad con HTML
            echo "<li>" . htmlspecialchars(trim($linea)) . "</li>";
            $contador++;
        }
    }

    echo "</ol>";

    fclose($fp);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>