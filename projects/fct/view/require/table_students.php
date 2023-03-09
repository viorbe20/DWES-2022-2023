<section class='bg-light w-100 d-flex justify-content-center' style='flex-wrap: wrap;'>

    <?php foreach ($data['ayears'] as $ayear) { ?>

        <section class="card m-2 bg-white w-75">
            <div class="card-header">
                <?php echo $ayear['ayear']; ?>
            </div>

            <div class="card-body d-flex">
                <?php foreach ($data['groups'] as $value) {
                ?>
                    <div class="card d-flex flex-column mx-2 p-4 text-center text-bg-primary">
                        <a href='<?php echo DIRBASEURL ?>/students/<?php echo $ayear['ayear']; ?>/<?php echo $value['group_name'] ?>' style='text-decoration:none; font-size: 1.5rem;' class='text-white'>
                            <p><?php echo $value['group_name'] ?></p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php
    }
    ?>
</section>