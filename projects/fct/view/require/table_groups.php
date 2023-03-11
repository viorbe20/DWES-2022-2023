<?php
echo '<pre>';
//print_r($data['terms']);
echo '</pre>';
?>
<!--Show students from a group and an academic year. Ther are separated by terms-->
<section class='bg-light w-100 d-flex flex-rpw justify-content-center'>


    <?php foreach ($data['terms'] as $term => $students) { ?>
        <section class="card m-2 bg-white w-75">

            <div class="card-header">
                <h5><?php echo $term ?></h5>
            </div>

            <?php foreach ($students['assignedStudents'] as $student) { ?>
                <div class="card-body">
                    <a href='<?php echo DIRBASEURL . '/' . 'assignment/student/' . $data['ayear'] . '/' . $data['group'] . '/' . $student['student_id'] . '_' . $student['assignment_id'] ?>' style='text-decoration: none;' class='btn btn-outline-primary'>
                        <?php echo $student['name'] . ' ' . $student['surnames'] ?></a>
                </div>
            <?php } ?>

            <div class="card-header bg-light">
                <h6>No asignados</h6>
            </div>
            <?php foreach ($students['unassignedStudents'] as $student) { ?>
                <div class="card-body"> <a href='<?php echo DIRBASEURL . '/' . 'assignment/student/' . $data['ayear'] . '/' . $data['group'] . '/' . $student['student_id'] . '_0'?>' style='text-decoration: none;' class='btn btn-outline-secondary'>
                        <?php echo $student['name'] . ' ' . $student['surnames'] ?></a>
                </div>
            <?php } ?>

        </section>
    <?php } ?>


</section>