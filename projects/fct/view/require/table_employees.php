<?php
echo '<pre>';
print_r($data['table_employees']);
echo '</pre>';
?>
<section class='w-100'>
    <table class="table text-center mt-1">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
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
                    <td><?php echo $employee['name_student']?></td>
                    <td>
                        <a href="<?php echo DIRBASEURL ?>/employees/delete_employee/<?php echo $employee['id'] ?>"><span class="material-symbols-outlined">
                                delete
                            </span></a>
                        <a href="<?php echo DIRBASEURL ?>/employees/edit_employee/<?php echo $employee['id'] ?>"><span class="material-symbols-outlined">
                                edit
                            </span></a>
                    </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</section>