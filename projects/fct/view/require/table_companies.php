<section class='w-100'>
    <table class="table text-center mt-1">
        <thead>
            <tr>
                <th scope="col">Logo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Empleados</th>
                <th scope="col">Asignaciones</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider" id="table_body_companies">
            <?php
            foreach ($data['table_companies'] as $company) { ?>
                <tr>
                    <td><img src="<?php echo DIRBASE ?>/assets/img/logos/unknown.png"></td>
                    <td><?php echo $company['name'] ?></td>
                    <td><?php echo $company['phone'] ?></td>
                    <td><a href="<?php echo DIRBASEURL ?>/companies/employees/<?php echo $company['id'] ?>"><span class="material-symbols-outlined">
                                groups
                            </span></a></td>
                    <td><a href="<?php echo DIRBASEURL ?>/companies/assignments/<?php echo $company['id'] ?>"><span class="material-symbols-outlined">
                                assignment
                    <td>
                        <a href="<?php echo DIRBASEURL ?>/companies/delete_company/<?php echo $company['id'] ?>"><span class="material-symbols-outlined">
                                delete
                            </span></a>
                        <a href="<?php echo DIRBASEURL ?>/companies/view_company/<?php echo $company['id'] ?>"><span class="material-symbols-outlined">
                                visibility
                            </span></a>
                    </td>
                </tr>
            <?php };
            ?>
        </tbody>
    </table>
</section>