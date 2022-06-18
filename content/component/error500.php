<?php
ob_start();

require_once("content/controller/errorController.php");
require_once("view/errorView.php");

$html500=ob_get_clean();
?>