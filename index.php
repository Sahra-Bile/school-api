<?php



// require_once __DIR__ . '/model/database.php';

$pdo = require_once __DIR__ . '/partials/connect.php';



require_once __DIR__ . '/controller/student-controller.php';
require_once __DIR__ . '/view/student-view.php';
require_once __DIR__ . '/model/student-model.php';


$studentModel = new StudentModel($pdo);
$studentView = new StudentView();

$studentController = new StudentController($studentModel, $studentView);

$studentController->add();

$studentController->getAll();

$studentController->getById();

$studentController->deleteById();
