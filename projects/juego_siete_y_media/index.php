<?php

/**
 * Juego de las siete y media con baraja española
 * @author Virginia Ordoño Bernier
 */

//Iniciamos la sesión
session_start();

//Iniciamos la cookie para almacenar las victorias
if (!isset($_COOKIE['victories'])) {
    setcookie('victories', 0, time() + 60 * 60 * 24 * 365);
}

//Función que establece el palo
function getPalo($carta)
{
    //Casting de string a int
    $num = (int) $carta;

    //Si el número es menor que 11, es de basto
    if ($num <= 10) {
        $palo = 'basto';
    } elseif ($num >= 11 && $num <= 20) {
        //Si el número es menor que 21, es de copa
        $palo = 'copa';
    } elseif ($num >= 21 && $num <= 30) {
        //Si el número es menor que 31, es de espada
        $palo = 'espada';
    } else {
        //Es oro
        $palo = 'oro';
    }
    return $palo;
}

//Función que calcula los puntos de una carta
function getPoints($num)
{
    $puntos = (int)$num % 10;

    switch ($puntos) {
        case 1:
            $value = 1;
            break;
        case 2:
            $value = 2;
            break;
        case 3:
            $value = 3;
            break;
        case 4:
            $value = 4;
            break;
        case 5:
            $value = 5;
            break;
        case 6:
            $value = 6;
            break;
        case 7:
            $value = 7;
            break;
        default:
            $value = 0.5;
            break;
    }

    return $value;
}

//Función que determina el ganador
function getWinner($pointsPc, $pointsUser)
{
    $result = '';
    $pointsPc = (float)$pointsPc;
    $pointsUser = (float)$pointsUser;

    if (($pointsPc == 7.5) && ($pointsUser == 7.5)) { //Empate
        $result = 'X';
    } elseif (($pointsPc <= 7.5) && ($pointsUser <= 7.5)) { //Ninguno se pasa
        if ($pointsPc > $pointsUser) {
            $result = '1';
        } elseif ($pointsPc < $pointsUser) {
            $result = '2';
        } else {
            $result = 'X';
        }
    } else { //Si el usuario se pasa
        $result = '1';
    }

    return $result;
}

if (!isset($_SESSION['baraja'])) {

    $baraja = range(1, 40);
    shuffle($baraja);
    $_SESSION['baraja'] = $baraja;

    // Guardar el array en la sesión
    $_SESSION['player1']['name'] = 'pc';
    $_SESSION['player2']['name'] = 'user';
    $_SESSION['player1']['points'] = 0;
    $_SESSION['player2']['points'] = 0;
    $_SESSION['player1']['cards'] = array();
    $_SESSION['player2']['cards'] = array();
    $_SESSION['player1']['shift'] = true; //turno de la máquina
    $_SESSION['player2']['shift'] = false; //turno del jugador
    $_SESSION['pc_stop'] = rand(5, 7); //Puntuación máxima de la máquina
    $_SESSION['gameOver'] = false; //Si la máquina se ha pasado de 7.5
}
$message = '';

//Si se ha terminado el juego o el usuario se planta, se determina el ganador

if (($_SESSION['gameOver'] == true) || isset($_POST['plantar'])) {
    
    $result = getWinner($_SESSION['player1']['points'], $_SESSION['player2']['points']);

    if ($result == '1') {
        $message = '¡Has perdido!';
    } elseif ($result == '2') {
        $message = '¡Has ganado!';
        setcookie('victories', $_COOKIE['victories'] + 1, time() + 60 * 60 * 24 * 365);
    } else {
        $message = '¡Empate!';
    }
}

//CONTROL DE MANDOS
//Acaba la partida
if (isset($_POST['reiniciar'])) {
    //Pone a 0 la cookie
    setcookie('victories', 0, time() + 60 * 60 * 24 * 365);
    //Destruye session
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    exit();
}

//TURNO MÁQUINA
if ($_SESSION['player1']['shift'] == true) {

    //Si el juego no se ha acabado y es su turno, se le da una carta a la máquina
    if (($_SESSION['gameOver'] == false) && ($_SESSION['player1']['shift'] == true)) {

        //Servimos al menos una carta
        $lastNumber = array_pop($_SESSION['baraja']);
        $points = getPoints($lastNumber); 
        array_push($_SESSION['player1']['cards'], $lastNumber); //Añade la carta
        $_SESSION['player1']['points'] += $points;
        
        //Mientras la puntuación no supere el límite establecido, se le da una carta
        while ($_SESSION['player1']['points'] <= $_SESSION['pc_stop']) {
            $lastNumber = end($_SESSION['baraja']);
            $points = getPoints($lastNumber); //Calcula los puntos de la carta

            //Si no se ha pasado de 7.5, añade la carta y suma los puntos
            if ($_SESSION['player1']['points'] + $points <= $_SESSION['pc_stop']) {
                array_pop($_SESSION['baraja']);
                array_push($_SESSION['player1']['cards'], $lastNumber); //Añade la carta
                $_SESSION['player1']['points'] += $points;
            } else {
                break;
            }
        }

        //Si ha superado la puntuación máxima, ha pasado su turno y ha acabado el juego
        $_SESSION['player1']['shift'] = false;
        $_SESSION['player2']['shift'] = true;
    }
}

//TURNO JUGADOR
//Se le da una carta al jugador al principio de la partida
if (($_SESSION['player2']['shift'] == true) && (count($_SESSION['player2']['cards']) == 0)) {
    $lastNumber = array_pop($_SESSION['baraja']);
    $points = getPoints($lastNumber); //Calcula los puntos de la carta
    array_push($_SESSION['player2']['cards'], $lastNumber); //Añade la carta
    $_SESSION['player2']['points'] += $points;
}

//Si ha superado la puntuación máxima, ha pasado su turno y ha acabado el juego
if ($_SESSION['player2']['points'] >= 7.5) {
    $_SESSION['player2']['shift'] = false;
    $_SESSION['gameOver'] = true;
}

//Pulsa el botón de pedir carta
if (isset($_POST['nuevaCarta']) && $_SESSION['player2']['shift'] == true) {

    if ($_SESSION['gameOver'] == false) {
        $lastNumber = array_pop($_SESSION['baraja']);
        $points = getPoints($lastNumber); //Calcula los puntos de la carta
        array_push($_SESSION['player2']['cards'], $lastNumber); //Añade la carta

        //Sumamos los puntos solo si no se ha pasado de 7.5
        if ($_SESSION['player2']['points'] + $points <= 7.5) {
            $_SESSION['player2']['points'] += $points;
        } else {
            $_SESSION['gameOver'] = true;
        }
    }
}


?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title></title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
</head>

<body class='m-0 row justify-content-center'>
    <h1 class='d-flex justify-content-center'>Siete y media</h1>
    <div class='p-3 mb-2 d-flex-column justify-content-center'>
        <?php if (isset($_COOKIE['victories'])) {
            echo "<section>Número de victorias " . $_COOKIE['victories'] . "</section><br>";
        } else {
            echo "<section>Número de victorias 0</section><br>";
        } ?>
        <!--formulario con botones: reiniciar, nueva carta, plantar, iniciar contador-->
        <form action='index.php' method='post' class='d-flex'>
            <button type='submit' class='btn my-3 mx-1 text-white bg-primary' name='reiniciar'>Reiniciar</button>
            <button type='submit' class='btn my-3 mx-1 text-white bg-primary' name='nuevaCarta'>Nueva carta</button>
            <button type='submit' class='btn my-3 mx-1 text-white bg-primary' name='plantar'>Plantar</button>
            <button type='submit' class='btn my-3 mx-1 text-white bg-primary' name='iniciarContador'>Iniciar contador</button>
        </form>
        <!--Mensaje resultado-->
        <div class='alert alert-success m-0 row justify-content-center'>
            <?php echo $message ?>
        </div>
        <!--Muestra un div con las cartas que elige el jugador y que están en la carpeta img-->
        <div class='d-flex-column justify-content-center my-4'>
            <h6 class='d-flex'>Cartas jugador</h6>
            <?php
            if (isset($_SESSION['player2']['cards'])) {
                foreach ($_SESSION['player2']['cards'] as $card) {
                    //Según número establecemos que imagen mostrar
                    $palo = getPalo($card);
                    //casteamos a string para que no dé error
                    $number = (string) $card;
                    echo "<img src='img/$palo/$number.jpg' alt='carta' style='margin:5px'>";
                }
            }
            ?>
        </div>

        <!--Muestra un div con las cartas que elige la máquina y que están en la carpeta img-->
        <div class='d-flex-column justify-content-center my-4'>
            <h6>Cartas máquina</h6>
            <?php
            if ($_SESSION['gameOver'] == false) { //muestra las cartas boca abajo
                foreach ($_SESSION['player1']['cards'] as $key => $value) {
                    echo "<img src='img/reverso.jpg' alt='carta_reverso' width='7%' style='margin:5px'>";
                }
            } else {
                foreach ($_SESSION['player1']['cards'] as $key => $value) {
                    $palo = getPalo($value);
                    echo "<img src='img/$palo/$value.jpg' alt='carta_reverso' width='7%' style='margin:5px'>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>