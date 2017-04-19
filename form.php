<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 17.04.2017
 * Time: 20:12
 */

// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$name = isset($_POST['name']) ? $_POST['name'] : null;
$location = isset($_POST['location']) ? $_POST['location'] : null;

echo "name is $name location is $location";

?>