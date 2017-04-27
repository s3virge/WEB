<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 17.04.2017
 * Time: 20:12
 */

$Employees = isset($_POST['employees']) ? disinfect($_POST['employees']) : false;

if ($Employees)
{
    ///////////////////////////////////////////////////////////////
    /*In PHP side you do:

    $array = isset($_POST['myarray']) ? $_POST['myarray'] : false;
    if ($array) {
        $array = serialize($array);
        //UPDATE YOUR DATABASE WITH THIS SERIALIZED ARRAY
    }
    you cant save php array into database therefore you need to serialize it and when you retrieve it from DB use unserialize()

    IF you meant that you wanted to save the input and text area values then you need to set the names for each of the element and then access them in your script using $_POST.

    $array = array;
     foreach($_POST as $key => $value) {
         //sanitize your input here
         $array[$key] = $value;
     }
     $serialized = serialize($array);
     //save serialized array in your DB
    NOTE/HINT: FYI do not use html table to lay out the form elements. Tables should be used for data representation. You could easily do samething using divs and css
    */

    foreach($_POST as $key => $value) {
        //sanitize your input here
        $array[$key] = $value;
    }
}

///////////////////////////////////////////////////////////////////
$fio        = disinfect($_POST['fio']);
$phone      = disinfect($_POST['phone']);
$cellphone  = disinfect($_POST['cellphone']);

writeToFile("<tr>\n<td>$fio</td>\n<td>$phone</td>\n<td>$cellphone</td>\n</tr>\n");

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