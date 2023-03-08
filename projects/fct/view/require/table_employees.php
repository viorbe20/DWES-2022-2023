<?php
// echo '<pre>';
// print_r($data['table_employees']);
// echo '</pre>';
?>
<section class='w-100 my-3'>
    <table class="table text-center mt-1">
        <thead>
            <tr>
                <th scope="col">Empleado</th>
                <th scope="col">Puesto</th>
                <th scope="col">Asignación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider" id="table_body_companies">
            <?php
            foreach ($data['table_employees'] as $employee) { ?>
                <tr>
                    <td><?php echo $employee['name'] . ' ' . $employee['surnames'] ?></td>
                    <td><?php echo $employee['job'] ?></td>
                    <td>
                        <?php echo $employee['name_student'] == '' ? '<a href="" class=""></a>' : $employee['name_student'] ?>
                        <td>
    <a href='' class='btn btn-primary rounded-pill px-4 my-1'>Editar</a>
    <?php echo $employee['name_student'] == '' ? '<a href="' . DIRBASEURL . '/assignment/create/' . $employee['id'] . '" class="btn btn-success rounded-pill px-4 my-1">Asignar</a>' : '<a href="' . DIRBASEURL . '/assignment/cancel/' . $employee['assignment_id'] . '" class="btn btn-warning rounded-pill px-4 my-1">Desasignar</a>' ?>
</td>

                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</section>