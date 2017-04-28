<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 17.04.2017
 * Time: 20:12
 */

$Employees = isset($_POST['employees']) ? $_POST['employees'] : false;
$fio       = isset($_POST['fio']) ? $_POST['fio'] : false;

$fileName = "employee.txt";

if ($Employees) {
    $file = fopen($fileName, "w");

    //$Employees - массив сток
    for ($c = 0; $c < count($Employees); $c++) {

        fwrite($file, "<tr>$Employees[$c]</tr>\n");
    }

    fclose($file);
}
else if ($fio) {
    $fio        = disinfect($_POST['fio']);
    $phone      = disinfect($_POST['phone']);
    $cellphone  = disinfect($_POST['cellphone']);

    writeToFile("<tr>\n<td>$fio</td>\n<td>$phone</td>\n<td>$cellphone</td>\n</tr>\n");
}

//если обе переменные false значит скрипт вызван кнопкой Удалить и в таблице больше нет данных
if (!$Employees && !$fio) {
    //create empty file
    $file = fopen($fileName, "w");
    fclose($fileName);

    //or delete the file
    //unlink($fileName);
}

///////////////////////////////////////////////////////////////////

function disinfect($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function writeToFile($str) {
    $file = fopen("employee.txt", "a") or die("Unable to open file!");
    fwrite($file, $str);
    fclose($file);
}

?>