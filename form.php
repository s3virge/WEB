<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 17.04.2017
 * Time: 20:12
 */


function disinfect($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function writeToFile($str) {
    $file = fopen("employee.txt", "a+") or die("Unable to open file!");
    fwrite($file, $str);
    fclose($file);
}

$fio = $cellphone = $phone = null;

//$location = isset($_POST['location']) ? $_POST['location'] : null;

$fio        = disinfect($_POST['fio']);
$phone      = disinfect($_POST['phone']);
$cellphone  = disinfect($_POST['cellphone']);

writeToFile("<tr>\n<td>$fio</td>\n<td>$phone</td>\n<td>$cellphone</td>\n</tr>\n");

?>