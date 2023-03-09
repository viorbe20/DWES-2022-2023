<?php
echo '<pre>';
//print_r($data);
echo '</pre>';
?>
<section class='bg-light w-100 d-flex flex-column justify-content-center bg-light'>

    <section class='d-flex'>
        <section class="card m-2 bg-white w-75">
            <div class="card-header">
                <h5>septiembre-diciembre</h5>
            </div>

            <?php foreach ($data['assigned'] as $value) {
                if ($value['term'] == 'septiembre-diciembre') {
            ?>
            <div class="d-flex flex-column m-1 text-start align-content-center w-50">
                <a href='<?php echo DIRBASEURL ?>/students/<?php echo $data['ayear'] . "/" . $data['group'] . "/" . $value['id']?>' style='text-decoration:none;' class='d-flex m-1 btn btn-outline-primary'>
                    <p><?php echo $value['name'] ?></p>
                </a>
            </div>
            <?php
                }
            } ?>
        </section>

        <section class="card m-2 bg-white w-75">
            <div class="card-header">
                <h5>marzo-junio</h5>
            </div>
            <?php foreach ($data['assigned'] as $value) {
                if ($value['term'] == 'marzo-junio') {
            ?>
          <div class="d-flex flex-column m-1 text-start align-content-center w-50">
                <a href='<?php echo DIRBASEURL ?>/students/<?php echo $data['ayear'] . "/" . $data['group'] . "/" . $value['id']?>' style='text-decoration:none;' class='d-flex m-1 btn btn-outline-primary'>
                    <p><?php echo $value['name'] ?></p>
                </a>
            </div>
            <?php
                }
            } ?>
        </section>

    </section>

    <section class="card m-2 bg-white">
        <div class="card-header bg-light">
            <h5>No asignados</h5>
        </div>


        <?php foreach ($data['not_assigned'] as $value) {
        ?>
            <div class="d-flex flex-column m-1 text-start align-content-center w-25">
            <a href='<?php echo DIRBASEURL ?>/students/<?php echo $data['ayear'] . "/" . $data['group'] . "/" . $value['id']?>' style='text-decoration:none;' class='d-flex m-1 btn btn-outline-secondary'>

                    <p><?php echo $value['name'] ?></p>
                </a>
            </div>
        <?php
        } ?>

    </section>

</section>