<!DOCTYPE html>

<head>


</head>



<body>

    <h2>Pacientes</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>CUIL</th>
            <th>Sexo</th>
        </tr>
        <?php
        foreach ($param as $muestra) {
            echo '<tr>';

            echo '<td >' . $muestra['id_paciente'] . '</td>';
            echo '<td >' . $muestra['nombre'] . '</td>';
            echo '<td >' . $muestra['apellido'] . '</td>';
            echo '<td >' . $muestra['cuil'] . '</td>';
            echo '<td >' . $muestra['sexo'] . '</td>';
        }

        ?>


    </table>



</body>

<html>