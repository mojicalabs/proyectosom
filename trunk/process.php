<?php

ob_start();

$data = print_r($_POST, true);
echo($data);

?>