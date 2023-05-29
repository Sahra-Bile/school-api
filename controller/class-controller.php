<?php
class ClassController
{
  private $model = null;
  private $view = null;

  public function __construct($classModel, $classView)
  {
    $this->model = $classModel;
    $this->view = $classView;
  }

  public function getClassById()
  {
    $requestMethod = $_SERVER["REQUEST_METHOD"];

    switch ($requestMethod) {
      case 'GET':
        $empId = '';
        if ($_GET['id']) {
          $empId = $_GET['id'];
        }
        $all = $this->model->getClass($empId);
        $this->view->outputClass($all);
        break;
      default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    }
  }

  public function deleteClassById()
  {
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    switch ($requestMethod) {
      case 'GET':
        $empId = '';
        if ($_GET['id']) {
          $empId = $_GET['id'];
        }
        $one = $this->model->deleteClass($empId);
        // $this->view->deleteClass($one);
        break;
      default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    }
  }


  public function createClass()
  {

    $requestMethod = $_SERVER["REQUEST_METHOD"];


    switch ($requestMethod) {
      case 'POST':
        $one = $this->model->insertClass($_POST);
        $this->view->createNewClass($one);
        break;
      default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    }
  }
}
