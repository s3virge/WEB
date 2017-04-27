<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 17.04.2017
 * Time: 20:12
 */

$Employees = isset($_POST['employees']) ? $_POST['employees'] : false;
$fio       = isset($_POST['fio']) ? $_POST['fio'] : false;

if ($Employees)
{
    /*$array = array();

    foreach($_POST as $key => $value) {
     //sanitize your input here
     $array[$key] = $value;
    }*/

}
else if ($fio) {
    $fio        = disinfect($_POST['fio']);
    $phone      = disinfect($_POST['phone']);
    $cellphone  = disinfect($_POST['cellphone']);

    writeToFile("<tr>\n<td>$fio</td>\n<td>$phone</td>\n<td>$cellphone</td>\n</tr>\n");
}

///////////////////////////////////////////////////////////////////

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

?>