<section class='d-flex w-100 justify-content-center' style='flex-wrap: wrap; margin: 2rem;'>

    <?php foreach ($data['ayears'] as $ayear) { ?>

        <section class="card m-2">

            <div class="card-header">
                <?php echo $ayear['ayear']; ?>
            </div>

            <section>

                <?php foreach ($data['groups'] as $value) {
                ?>
                    <a href='<?php echo DIRBASEURL ?>/students/<?php echo $ayear['ayear']; ?>/<?php echo $value['group_name'] ?>' 
                    style='text-decoration:none; font-size: 1.5rem; margin: 1rem; width: 30%; text-align: center' class='btn btn-outline-primary'>
                        <p><?php echo $value['group_name'] ?></p>
                    </a>
                <?php } ?>
            </section>
        </section>
    <?php
    }
    ?>
</section>