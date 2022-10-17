<?php
require('../view/require/header_view.html');
echo "<style>" . file_get_contents('../view/css/style.css') . "</style>";
echo "<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0' />";

?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='stylesheet' href='css/style.css'>
<title>Companies view</title>
</head>
<body>
<main>
        <section class="search-box" id="form-search-company">
            <form action="" method="post">
                <input type="text" name="search" id="search" placeholder="Buscar...">
                <button type="submit" name="submit-search">
                    <span class="material-symbols-outlined">
                        add_circle
                        </span>
                    Añadir empresa</button>
            </form>
        </section>
    </main>
</body>
</html>
