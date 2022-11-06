<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FCT Práctica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo DIRBASEURL; ?>/home/companies">Empresas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Empleados
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ver empleados</a></li>
                            <li><a class="dropdown-item" href="#">Alta empleados</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <!--Search box company-->
                <form method="post" id="form_search_company" class="d-flex" role="search">
                    <input name="input_search_company" id="input_search_company" class="form-control me-2" type="text" placeholder="Buscar">
                    <button name="btn_search_company" id="btn_search_company" class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
</header>