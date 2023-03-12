<?php
echo "<pre>";
//print_r($data);
echo "</pre>";
?>
<section class='d-flex w-100 justify-content-center' style='flex-wrap: wrap; margin: 2rem;'>

    <section class='w-100'>
        <table class="table text-center mt-1">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Status</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="table_body_users">
                <?php foreach ($data['users_list'] as $user) { ?>
                    <tr>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['profile_fk'] ?></td>
                        <td><?php if ($user['status_fk'] == 'alta') {
                                echo '<a href="' . DIRBASEURL . '/users/cancel_user/' . $user['id'] . '" class="btn btn-warning">Desactivar</a>';
                            } else {
                                echo '<a href="' . DIRBASEURL . '/users/activate_user/' . $user['id'] . '" class="btn btn-success">Activar</a>';
                            } ?>
                        </td>
                        <td>
                            <a href="<?php echo DIRBASEURL ?>/users/delete_user/<?php echo $user['id'] ?>"><span class="material-symbols-outlined">
                                    delete
                                </span></a>
                            <a href="<?php echo DIRBASEURL ?>/users/edit_user/<?php echo $user['id'] ?>"><span class="material-symbols-outlined">
                                    edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</section>