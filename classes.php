<?php
//! database connection
// $pdo = require __DIR__ . '/partials/connect.php';

//! classes

require_once __DIR__ . '/controller/class-controller.php';
require_once __DIR__ . '/model/class-model.php';
require_once __DIR__ . '/view/class-view.php';



//!classes MVC
$classView = new ClassView();
$classModel = new ClassModel($pdo);

$classController = new ClassController($classModel, $classView);

$classController->createClass();

// $classController->getClassById();

// $classController->deleteClassBYId();

