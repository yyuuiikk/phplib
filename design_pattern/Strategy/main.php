<?php

require_once 'TextContext.php';
require_once 'TextOutput.php';
require_once 'HtmlOutput.php';

$context = new \Strategy\TextContext();

$context->setOutputStrategy(new \Strategy\TextOutput());
$context->render('Hello, World!!');

$context->setOutputStrategy(new \Strategy\HtmlOutput());
$context->render('Hello, World!!');
