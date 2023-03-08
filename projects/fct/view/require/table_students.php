<?php
// echo '<pre>';
// print_r($data['table_employees']);
// echo '</pre>';
?>


<section class="card">
    <div class="card-header">
        Año académico
    </div>
    <div class="card-body d-flex">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="card d-flex flex-column mx-2 p-2">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        <?php } ?>
    </div>
</section>