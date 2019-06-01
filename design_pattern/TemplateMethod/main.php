<?php

require_once 'CharDisplay.php';
require_once 'StringDisplay.php';

$display = new \TemplateMethod\CharDisplay('Hello!!');
$display->display();


$st_disp = new \TemplateMethod\StringDisplay('goodbye');
$st_disp->display();
