<?php

function getMateriasPorProfesor($nombre_profesor)
{
    $db = new PDO(
        'mysql:host=localhost;dbname=db_labn2;charset=utf8',
        'root',
        '1234'
    );

    $sentencia = $db->prepare("SELECT * FROM materia WHERE profesor LIKE ?");
    $nombre_profesor = "%" . $nombre_profesor . "%";
    $sentencia->execute([$nombre_profesor]);
    $materias = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $materias;
}