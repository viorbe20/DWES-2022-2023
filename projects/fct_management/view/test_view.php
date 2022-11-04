   <?php
    require "./require/header_bt.php";
    echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";
    echo " <script src='https://example.com/fontawesome/v6.2.0/js/all.js' data-auto-a11y='true'></script>";
    echo "<link rel='stylesheet' href='../view/css/style.css";
    ?>
   <!--MAIN-->
   <main class="container">
       <h1 class="text-center">Lista de Empresas</h1>
       <a href="crear.php" class="btn btn-success">Crear Empresa</a>

       <table id="table-companies" class="table text-center">
           <thead>
               <tr>
                   <th scope="col">Logo</th>
                   <th scope="col">Nombre</th>
                   <th scope="col">Teléfono</th>
                   <th scope="col">Empleados</th>
                   <th scope="col">Opciones</th>
               </tr>
           </thead>
           <tbody class="table-group-divider">
               <tr>
                   <td>Logo</td>
                   <td>Otto</td>
                   <td>icon</td>
                   <td><span class="material-symbols-outlined">
                               group
                           </span></td>
                   <td><span class="material-symbols-outlined">
                               delete
            </span>
            <span class="material-symbols-outlined">
                               edit
                           </span></button></td>
               </tr>
           </tbody>
       </table>
   </main>
   <?php
    require "./require/footer_bt.php";
    ?>