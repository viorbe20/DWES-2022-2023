<nav class="navbar navbar-expand-lg navbar-light bg-secondary d-flex">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link text-white" href="">Inicio</a>
                <?php
                if ($_SESSION['user']['profile'] == 'user') { //Users options
                    echo "<a class='nav-link text-white' href=''>Venta</a>";
                }
                ?>
            </div>
        </div>
    </div>
    <?php

    if ($_SESSION['user']['profile'] == 'guest') {
    ?>
        <!--Login form-->
        <form action="" method="post" class='d-flex mx-5 w-100' id='form-login'>
            <!--User group-->
            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-0">
                <label for="username" class="text-white">Usuario</label>
                <div>
                    <input type="text" class="form-control mx-1" name="username">
                </div>
            </div>
            <!--Password group-->
            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-1">
                <label for="password" class="text-white">Contraseña</label>
                <div class="d-flex p-1 justify-content-center align-items-center">
                    <input type="password" class="form-control mx-1" name="password">
                </div>
            </div>
            <div class="form-group d-flex justify-content-center align-items-center p-1 mx-1">
                <button type="submit" class="btn btn-success" id="btn_login" name="btn_login">Log in</button>
            </div>
        </form>
    <?php
    } else if ($_SESSION['user']['profile'] == 'user') {
    ?>
        <section id='box_user_info'>
            <div id="box_user_icon">
                <span class="material-symbols-outlined">
                    account_circle
                </span>
            </div>
            <div id="box_user_data">
                <p>Hola <?php echo $_SESSION['user']['username']; ?></p>
                <p>Hoy es <?php echo getCurrentDate(); ?></p>
                <p>Son las <?php echo getCurrentHour(); ?></p>
            </div>

        </section>
    <?php
    } else if ($_SESSION['user']['profile'] == 'admin') {

        echo 'info del admin';
    }
    ?>
</nav>