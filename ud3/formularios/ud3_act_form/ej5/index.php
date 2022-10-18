<?php

/**
 * Unidad 3. Actividades de clase.
 * Ejercicio 5. Realiza un test de verbos irregulares en inglés 
 * teniendo el cuenta la dificultad y el número de verbos que aparecerán.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 * http://192.168.10.10/ud3/ud3_act_form/ej5/index.php
 */

// //Archivo que contiene array con los verbos irregulares
require __DIR__ . "/php/getIrregularVerbs.php";

$a_indexes = array();

$a_selectedGaspsAmount;
$a_selectedVerbsAmount;


/**
 * Genera números aleatorios entre 0 y el número máximo de verbos de la lista.
 * Genera tantos números como cantidad de verbos que quiera completar el usuario.
 * Devuelve esos números en un array.
 */
function createRandomNumbersArray($a_selectedVerbsAmount)
{
   $a_randomNumbers = array();
   $cont = 0;
   do {
      $randomNumber = rand(0, count(getIrregularVerbs()) - 1);

      if (in_array($randomNumber, $a_randomNumbers) == false) {
         array_push($a_randomNumbers, $randomNumber);
         $cont++;
      }
   } while ($cont < $a_selectedVerbsAmount);
   return $a_randomNumbers;
};

/**
 * Genera números aleatorios entre 0 y 3 sin repetir y los introduce en un arrays.
 * Genera la cantidad indicada por el usuario (1 a 4) y devuelve esos arrays.
 * @param {num} Nivel de dificultad y por tanto huecos que van a aparecer en cada verbo. 
 */
function createVerbsGasps($a_selectedGaspsAmount)
{

   $cont = $a_selectedGaspsAmount;
   $a_gasps = array();

   do {
      $randomNumber = rand(0, 3);
      if (in_array($randomNumber, $a_gasps) == false) {
         array_push($a_gasps, $randomNumber);
         $cont--;
      }
   } while ($cont > 0);
   asort($a_gasps);
   return $a_gasps;
};

/**
 * Función que completa el array de índices.
 */
function fillIndexArray($a_selectedVerbsAmount, $a_selectedGaspsAmount)
{
   //Array que le asignamos la función que genera array con números aleatorios.
   $a_randomNumbers = createRandomNumbersArray($a_selectedVerbsAmount);

   for ($i = 0; $i < count($a_randomNumbers); $i++) {
      $indexNumber = $a_randomNumbers[$i];
      $a_indexes[$indexNumber] = createVerbsGasps($a_selectedGaspsAmount);
   }
   return $a_indexes;
};

/**
 * 
 */
function showVerbsAndGasps($a_selectedVerbsAmount, $a_selectedGaspsAmount){
 //Imprime array de índices
 $currentVerbsList = fillIndexArray($a_selectedVerbsAmount, $a_selectedGaspsAmount);
 //var_dump($currentVerbsList);
?>
 <h1>Test Verbos Irregulares en Inglés</h1>
 <form action="" method="post">
<?php

 //Recorre array de índices y muestra verbos o no según dificultad/huecos seleccionados
 foreach ($currentVerbsList as $key => $a_gasps) {
    for ($i = 0; $i < 4; $i++) {
       if (in_array($i, $a_gasps)) {
          echo "<input type='text' name=\"$key.$i\">";
       } else {
          echo "<input type='text' value=\"" . getIrregularVerbs()[$key][$i] . "\" disabled>";
       }
    }
    echo ('<br><br>');
 }
 echo ("<input type='submit' value='Enviar'>");
 echo ("</form>");
};

//FUnción que muetsra la corrección
function showCorrectVerbs($a_selectedVerbsAmount, $a_selectedGaspsAmount){
   //Imprime array de índices
   $currentVerbsList = fillIndexArray($a_selectedVerbsAmount, $a_selectedGaspsAmount);
   //var_dump($currentVerbsList);
  ?>
   <h1>Test Verbos Irregulares en Inglés</h1>
   <form action="" method="post">
  <?php
  
   //Recorre array de índices y muestra verbos o no según dificultad/huecos seleccionados
   foreach ($currentVerbsList as $key => $a_gasps) {
      for ($i = 0; $i < 4; $i++) {
         if (in_array($i, $a_gasps)) {
            echo "<input type='text' name=\"$key.$i\">";
         } else {
            echo "<input type='text' value=\"" . getIrregularVerbs()[$key][$i] . "\" disabled>";
         }
      }
      echo ('<br><br>');
   }
   echo ("<input type='submit' value='Enviar'>");
   echo ("</form>");
  };

//VALIDACIÓN DE DATOS
//Arrays vacíos donde luego se guardarán las opciones elegidas por el usuario
$a_selectedVerbsAmount = [];
$a_selectedGaspsAmount = [];
$f_processForm = false;
$f_error = false;



//Se comprueban todos los datos introducidos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
   $f_processForm = true;

         if (isset($_POST['verbsAmount'])) {
            $a_selectedVerbsAmount = $_POST['verbsAmount'];

            if (isset($_POST['level'])) {
               $a_selectedGaspsAmount = $_POST['level'];
            }
            showVerbsAndGasps($a_selectedVerbsAmount, $a_selectedGaspsAmount);
         } else {
            //foreach ($_POST as $indexAndGasp => $userAnswer) {
                  $a_division = explode("_", $indexAndGasp);
                
                    
                  
                  echo( 'indice'.$index."-");
                  echo( 'hueco'.$gasp."-" );
                  echo( 'respuesta'.$userAnswer."-");

                 if ($gasp == 0) {
                  if (getIrregularVerbs()[$index][$gasp] == $userAnswer){
                     
                  }
                 } else{

                 }
                  //echo( getIrregularVerbs()[$index][$gasp]);
                  
                 
                     
                  // for ($i=0; $i < 4; $i++) { 
                  //    //si es hueco que busque y compare
                  //    $a_completeVerb=array();
                  //    array_push($userAnswer."".$i);
                  //    echo($verb.$i);
                  //    if ($gasp == $i) {
                  //       //echo(getIrregularVerbs()[$index][$gasp]."verbo<br>");
                  //       //echo($userAnswer."answer<br>");
                  //       if (getIrregularVerbs()[$index][$gasp] == $userAnswer) {
                  //          echo "<input type='text' value=\"" . $userAnswer . "\" class='rightVerb' disabled>";
                  //       } else {
                  //          echo "<input type='text' value=\"" . getIrregularVerbs()[$index][$gasp] . "\" class='wrongVerb' disabled>";
                  //       }
                  //    } else { //Si no es hueco, que imprima directamente
                  //       echo "<input type='text' value=\"" . getIrregularVerbs()[$index][$i] . "\" class='regularVerb' disabled>";
                  //    }
                  // }
                  echo ('<br><br>');
                  // getIrregularVerbs()[$index][$i];

               }
           
         };

      }
 
if ($f_error) {
   $f_processForm = false;
}

//////////////////////HTML
   ?>
   <!DOCTYPE HTML>
   <html lang="es">
   <link rel="stylesheet" href="style.css">
   <body>

      <?php
      if (!$f_processForm) { ?>
         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1>Test Verbos Irregulares en Inglés</h1>
            <br>

            <label for='level'>Elige el nivel según dificultad </label>
            <select name='level' id='level'>
               <option value='1'>1. Completar un hueco</option>
               <option value='2'>2. Completar dos huecos</option>
               <option value='3'>3. Completar tres huecos</option>
               <option value='4'>4. Completar todos los huecos</option>
            </select><br><br>

            <label for='verbsAmount'>Elige la cantidad de verbos </label>
            <select name='verbsAmount' id='verbsAmount'>;
               <?php
               for ($i = 1; $i <= 20; $i++) {
                  echo ("<option value='$i'" . $i . "'>" . $i . "</option>");
               }
               echo ("</select><br>"); ?>

               <br>
               <input type='submit' value='Enviar' id='submit'>

         </form>
      <?php
      }
      ?>

   </body>

   </html>