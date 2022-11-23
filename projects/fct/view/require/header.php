<?php
// require_once '../app/Config/constantes.php';
// require_once '../../fct/utils/my_utils.php';
?>
<header>
    <?php
    if (!isset($data['processForm'])) {
    ?>
        <nav class="navbar navbar-dark d-flex bg-dark">
            <!--Logo-->
            <section id="info_company" class="d-flex align-items-center justify-content-center">
                <a class="navbar-brand mx-3" href="">
                    <img src="../../assets/img/logos/logo_ies_gc.jpg" width="50" height="50" alt="logo">
                </a>
                <a class="navbar-brand" href="">Proyecto</a>
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
                <div class="form-group d-flex justify-content-center align-items-center p-1 mx-1">
                    <button type="submit" class="btn btn-success" id="btn_login" name="btn_login">Log in</button>
                </div>
            </form>
        </nav>
    <?php
    } else {
    ?>
        <nav class="navbar navbar-dark d-flex bg-dark">
            <!--Logo-->
            <section id="info_company" class="d-flex align-items-center justify-content-center">
                <a class="navbar-brand mx-3" href="">
                    <img src="../../assets/img/logos/logo_ies_gc.jpg" width="50" height="50" alt="logo">
                </a>
                <a class="navbar-brand" href="">Proyecto</a>
            </section>
            <!--Tabs-->
            <div class="container d-flex ">
                <div class="bg-red" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 bg-red">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/home/tab1">Tab1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/home/tab2">Tab2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/home/tab3">Tab3</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--User info-->
            <section id='box_user_info'>
                <div id="box_user_icon">
                    <span class="material-symbols-outlined">
                        account_circle
                    </span>
                </div>
                <div id="box_user_data">
                    <p>Hola <?php echo $_SESSION['user']['name']; ?></p>
                    <p>Hoy es <?php echo getCurrentDate(); ?></p>
                    <p>Son las <?php echo getCurrentHour(); ?></p>
                </div>

            </section>
        </nav>
    <?php
    }
    ?>
</header>