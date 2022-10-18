<?php

$showSolution = false;


function getBlanks()
{
    $blanks = array();
    $blanksNumber = 5;

    while ($blanksNumber != 0) {
        $i = rand(1, 10);
        $j = rand(1, 10);
        $randomPosition = $i . "-" . $j;

        if (!in_array($randomPosition, $blanks)) {
            array_push($blanks, $randomPosition);
            $blanksNumber--;
        }
    }
    return $blanks;
}


if (isset($_POST['check'])) {
    $showSolution = true;
}

//Recorre $blanks



?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title></title>
</head>


<body>


    <main>
        <h1>Tabla de multiplicar</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php
            ?>

        </form>
    </main>

    <?php
    //var_dump($_POST['answers']);
    ?>
</body>

</html>