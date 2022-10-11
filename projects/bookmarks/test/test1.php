<?php
require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');
use App\Models\Usuario;
use App\Models\Bookmark;

$bm = Bookmark::getInstancia();
$bm->setId(9);
//getUserIdByBookmarkId
//$userId = $bm->getUserIdByBookmarkId();
foreach ($bm->getUserIdByBookmarkId() as $key => $value) {
    # code...
    var_dump($value['id_usuario']);
}
//echo('<br>' . $_SESSION['user']['id']) ;
// if (($_SESSION['user']['id']) == $userId) {
//     $bm->deletebyId();
// header('Location:' . DIRBASEURL . '/home/bookmarks');
// } else {
// header('Location:' . DIRBASEURL . '/home/bookmarks');
// }






?>