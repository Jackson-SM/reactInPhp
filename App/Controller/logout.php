<?php
require_once "../../vendor/autoload.php";

use App\Model\CrudUser;

$crudUser = new CrudUser();
$crudUser->logout(); //