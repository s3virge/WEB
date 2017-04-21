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

$fio = $cellphone = $phone = null;

//$location = isset($_POST['location']) ? $_POST['location'] : null;

$fio        = disinfect($_POST['fio']);
$cellphone  = disinfect($_POST['cellphone']);
$phone      = disinfect($_POST['phone']);

//echo "FIO = $fio; CellPhone = $cellphone; Phone = $phone;";

//сохранить данные в файл

?>