<?php
    require 'html/header.html';
    require_once 'db.php';

    $profesores = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
    
        $profesores = getMateriasPorProfesor($nombre);
    }
?>

<form action="index.php" method="post">
    <label for="nombre">Nombre</label>
    <div class="input-group">
        <input type="text" name="nombre" id="nombre" class="form-control"
            aria-label="Dollar amount (with dot and two decimal places)">
    </div>
    <table class="table margenes">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Materia</th>
                <th scope="col">Profesor</th>
            </tr>
        </thead>
        <tbody>
            <?php
        foreach ($profesores as $profesor) { ?>
            <tr>
                <th scope="row"><?= $profesor->id ?></th>
                <td><?= $profesor->nombre ?></td>
                <td><?= $profesor->profesor ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary margenes">Buscar</button>
</form>

<?php
    require 'html/footer.html';
?>