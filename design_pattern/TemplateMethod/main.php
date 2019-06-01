<?php

require_once 'CharDisplay.php';
require_once 'StringDisplay.php';

$display = new \TemplateMethod\CharDisplay('Hello!!');
$display->print();


$st_disp = new \TemplateMethod\StringDisplay('goodbye');
$st_disp->open();
$st_disp->print();
$st_disp->close();
