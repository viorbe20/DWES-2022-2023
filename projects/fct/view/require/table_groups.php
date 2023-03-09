<?php var_dump($data)?>
<section class='bg-light w-100 d-flex justify-content-center bg-light'>

    <section class="card m-2 bg-white w-75">
        <div class="card-header">
            <h5>septiembre-diciembre</h5>
        </div>
        
        <div class="card-body d-flex">
            <div class="card d-flex flex-column mx-2 p-4 text-center text-bg-primary">
                <a href='<?php echo DIRBASEURL ?>/students/<?php echo $ayear['ayear']; ?>/<?php echo $value ?>' style='text-decoration:none; font-size: 1.5rem;' class='text-white'>
                    <p>Alumno</p>
                </a>
            </div>
            ¡
        </div>
    </section>

    <section class="card m-2 bg-white w-75">
        <div class="card-header">
            <h5>marzo-junio</h5>
            </div>
            
            <div class="card-body d-flex">
            <div class="card d-flex flex-column mx-2 p-4 text-center text-bg-primary">
                <a href='<?php echo DIRBASEURL ?>/students/<?php echo $ayear['ayear']; ?>/<?php echo $value ?>' style='text-decoration:none; font-size: 1.5rem;' class='text-white'>
                    <p>Alumno</p>
                </a>
            </div>
        </div>
    </section>

</section>