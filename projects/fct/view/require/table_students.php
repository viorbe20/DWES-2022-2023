


<?php foreach ($data['ayears'] as $ayear) { ?>
    
    <section class="card my-3">
        <div class="card-header">
            <?php echo $ayear['ayear']; ?>
        </div>
        
        <div class="card-body d-flex m-2">
            <?php foreach ($data['groups_names'] as $value) { 
?>
                <div class="card d-flex flex-column mx-2 text-center text-bg-secondary">
                    <a href='' style='text-decoration:none'><p class="card-title p-2 text-white"><?php echo $value['group_name']?></p></a>
                </div>
            <?php } ?> 
        </div>
        </section>
    <?php
    }
    ?>
