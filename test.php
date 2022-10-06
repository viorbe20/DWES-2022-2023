<?php
$originalDate = "2017-03-08";
$newDate = date("d/m/Y", strtotime($originalDate));
print($newDate);