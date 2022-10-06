<?php

/**
 * Ejercicio de clase con todos los tipos de inputs y controlar los errores
 * Hecho por el profesor
 * Idea principal del ejercicio: 
 * Utilizar dos banderas, una para validar el procesamiento del formulario 
 * y otra para detectar si hay error en la validación del formulario 
 * 
 * Si hay error se recogen los valores enviados y se muestran de nuevo utilizando $_POST
 * Si no hay error se envía el formulario correctamente pero en realidad te quedas
 * en el mismo fichero.
 * 
 * http://192.168.10.10/clase/forms/form_validation_correct.php
 */

//Como va a ser mas o menos el formulario (no va a ser exactamente así)
$name = $email = $url = $gender = $comment = $website = "";
//nombre, email, url, textArea, radiobutton, checkbox, select, submit 
$nameErr = $emailErr = $websiteErr = $genderErr = $commentErr = "";

//Verificación opción múltiple
$aVehiculos = array('Bike', 'Car', 'Patinete');
$aVehiculosSeleccionados = [];

//Lista múltiple
$carsSeleccionados = [];
$cars = array("Renault", "Mercedes", "Citroen", "Volvo");

//Lista única de opciones
$aOpciones = array(
    array(
        "valor" => 1,
        "literal" => "Opcion 1"
    ),
    array(
        "valor" => 2,
        "literal" => "Opcion 2"
    ),
    array(
        "valor" => 3,
        "literal" => "Opcion 3"
    ),
    array(
        "valor" => 4,
        "literal" => "Opcion 4"
    )
);
$opcionSeleccionada = [];

//Rabiobutton 
$aGenero = array("Hombre", "Mujer", "Otro");

$lprocesaformulario = FALSE;
$lerror = FALSE;

function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lprocesaformulario = TRUE;

    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
        $lerror = true;
    } else {
        $name = clearData($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
        $lerror = true;
    } else {
        $email = clearData($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email incorrecto";
            $lerror = true;
        };
    }

    $website = clearData($_POST['website']);
    if (!filter_var($website, FILTER_VALIDATE_URL)) {
        $websiteErr = "Formato de URL incorrecto";
        $lerror = true;
    };

    $comment = clearData($_POST['comment']);


    if (empty($_POST['gender'])) {
        $genderErr = "Gender is required";
        $lerror = true;
    } else {
        //Aquí el usuario no escribe, es algo predefinido
        $gender = clearData($_POST["gender"]);
    }

    if (isset($_POST['vehicle'])) {
        $aVehiculosSeleccionados = $_POST['vehicle'];
    }

    if (isset($_POST['combo'])) {
        $opcionSeleccionada = $_POST['combo'];
    }

    if (isset($_POST['cars'])) {
        $carsSeleccionados = $_POST['cars'];
    }
};
if ($lerror) {
    $lprocesaformulario = FALSE;
}

?>
<!DOCTYPE HTML>
<html lang="es">


<head>
    <style>
        .error {
            color: "red";
        }
    </style>
</head>


<body>

    <?php
    if (!$lprocesaformulario) { ?>
        <!--Radiobutton genre-->
        <label for="genre">Género </label>
        <?php foreach ($genderSelection as $value) {
            echo "<input type=\"radio\" name=\"genre\" value = \"$value\">$value";
        } ?>
        <span class="error">*<?php echo $genderErr; ?></span><br /><br />
        <input type="submit" name="submit" value="Submit"><br /><br />
        </form>
    <?php
    } // Procesa Formulario
    else {
        echo "<h1>Your Input:</h1>";
        echo $name;
        echo "<br/>";
        echo $email;
        echo "<br/>";
        echo $website;
        echo "<br/>";
        echo $comment;
        echo "<br/>";
        echo $gender;
        echo "<br/>";
        //Bucle para vehículos seleccionados.
        foreach ($aVehiculosSeleccionados as $elemento) {
            echo $elemento . "<br/>";
        }

        //Opciones
        echo $opcionSeleccionada;
        echo "<br/>";

        //Bucle para coches seleccionados.
        foreach ($carsSeleccionados as $elemento) {
            echo $elemento . "<br/>";
        }
    }
    ?>
</body>

</html>