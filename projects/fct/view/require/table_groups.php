<?php
echo '<pre>';
//print_r($data);
echo '</pre>';
?>
<section class='bg-light w-100 d-flex flex-rpw justify-content-center'>

    <?php foreach ($data['terms_list'] as $value) { ?>

        <section class="card m-2 bg-white w-75">
            <div class="card-header">
                <h5><?php echo $value ?></h5>
            </div>

            <?php foreach ($data['students'][$value]['assigned'] as $student) { ?>
                <div class="card-body">
                <a href='<?php echo DIRBASEURL. '/' . 'assignment/student/' . $data['ayear'] . '/' . $data['group'] . '/' . $student['id']?>' style='text-decoration: none;'class='btn btn-outline-primary'><p><?php echo $student['name'] ?></p></a>
                </div>
            <?php } ?>

            <div class="card-header bg-light">
                    <h6>No asignados</h6>
            </div>
            <?php foreach ($data['students'][$value]['not_assigned'] as $student) { ?>
                <div class="card-body">
                    <a href='<?php echo DIRBASEURL. '/' . 'assignment/student/' . $data['ayear'] . '/' . $data['group'] . '/' . $student['id']?>' style='text-decoration: none;'class='btn btn-outline-secondary'><p><?php echo $student['name'] ?></p></a>
                </div>
            <?php } ?>

        </section>

    <?php } ?>

</section>