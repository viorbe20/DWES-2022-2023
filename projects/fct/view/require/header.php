<?php
require_once '../app/Config/constantes.php';
?>
<header>
    <?php
    if ((isset($_SESSION['user']['status'])) && ($_SESSION['user']['status'] == 'logout')) {
    ?>
        <nav class="navbar navbar-dark d-flex bg-dark">
            <!--Logo-->
            <section id="info_company" class="d-flex align-items-center justify-content-center">
                <a class="navbar-brand mx-3" href="">
                    <img src=<?php echo DIRBASE . "/assets/img/logos/logo_ies_gc.jpg" ?> width="50" height="50" alt="Logo IES Gran Capitán">
                </a>
                <a class="navbar-brand" href="">Práctica FCT</a>
            </section>

            <!--Login form-->
            <form action="" method="post" name='form_login' id='form_login' class='d-flex w-60 mt-2'>
                <!--User group-->
                <div class="form-group d-flex justify-content-center align-items-center p-1 mx-0">
                    <label for="username" class="text-white">Usuario</label>
                    <div>
                        <input type="text" class="form-control mx-1" name="username" id="username">
                    </div>
                </div>
                <!--Password group-->
                <div class="form-group d-flex justify-content-center align-items-center p-1 mx-1">
                    <label for="password" class="text-white">Contraseña</label>
                    <div class="d-flex p-1 justify-content-center align-items-center">
                        <input type="password" class="form-control mx-1" name="password" id="password" autocomplete="on">
                    </div>
                </div>
                <!--Log in button-->
                <div class="form-group d-flex justify-content-center align-items-center p-1 mx-1">
                    <button type="submit" class="btn btn-success" id="btn_login" name="btn_login">Log in</button>
                </div>
            </form>
        </nav>
    <?php
    } else {
    ?>
        <nav class="navbar navbar-expand bg-dark navbar-dark py-0">
            <!--Logo-->
            <section id="info_company" class="d-flex align-items-center justify-content-center">
                <a class="navbar-brand mx-3" href="">
                    <img src=<?php echo DIRBASE . "/assets/img/logos/logo_ies_gc.jpg" ?> width="50" height="50" alt="Logo IES Gran Capitán">
                </a>
                <a class="navbar-brand" href="">Práctica FCT</a>
            </section>

            <div class="container">

                <!--Tabs-->
                <ul class="navbar-nav p-2" style="width: 70%; font-size: 1.2rem">
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/companies">Empresas</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/students">Alumnos</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/calls">Convocatorias</a>
                    </li>
                </ul>

                <!--User info-->
                <section id='box_user_info' class='d-flex justify-content-center align-items-center text-bg-dark'>
                    <div class="d-flex">
                        <div class="d-flex align-items: center">
                            <span class="material-symbols-outlined mx-2" style="font-size: 2rem;">
                                account_circle
                            </span>
                        </div>
                        <div class="col w-75 d-flex">
                            <p><?php echo getGreeting() . ' ' . $_SESSION['user']['name']; ?></p>
                        </div>
                    </div>
                </section>

                

                <!--Log out button-->
                <section class="form-group d-flex flex-column justify-content-center align-items-center p-2 text-white">
                    <span style='font-size: 0.80rem'><?php echo getCurrentHour24() ?></span>
                    <span style='font-size: 0.80rem'><?php echo getCurrentDate() ?></span>
                    <a href="<?php echo DIRBASEURL; ?>/logout" class="btn btn-danger rounded-pill px-4 my-1">Salir</a>
                </section>




            </div>


        </nav>
    <?php
    }
    ?>
</header>