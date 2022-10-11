<?php
require('../view/require/header_view.php');
require('../view/require/login_view.php');

$css1 = file_get_contents('../view/css/style.css');
$css2 = file_get_contents('../view/css/header_style.css');
$css = $css1 . $css2;
echo '<style>' . $css . '</style>';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <title>Bookmarks</title>
</head>

<body>
    <noscript>
        <p>Bienvenido a Mi Sitio</p>
        <p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
            Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
    </noscript>
</body>
<?php
//var_dump($data);
// $urls = array();
// foreach ($data as $key => $v1) {
//     foreach ($v1 as $key => $v2) {
//         //Recorremos links para ver si existe
//         array_push($urls, $v2['bm_url']);        
//     }
// }
// $result = array_count_values($urls);
// var_dump($result);
// //arsort($result);

// foreach ($result as $k => $v) {
//     echo('<br>'.$k) ;
// }
?>
</html>