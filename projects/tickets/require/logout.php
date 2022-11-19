<?php
//Start session
if (isset($_POST['logout'])) {
    unset($_SESSION);
    session_destroy();
    header('http://localhost/dwes/projects/tickets/index.php');
}