<?php

class StudentController
{
  private $model = null;
  private $view = null;

  public function __construct($studentModel, $studentView)
  {
    $this->model = $studentModel;
    $this->view = $studentView;
  }

  public function start()
  {

    if (isset($_GET['action'])) {
      $chosenAction = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

      if ($chosenAction == 'students') {
        $all = $this->model->getAllStudents();
        $this->view->outputStudents($all);
      }
    } elseif (isset($_GET['student-id'])) {
      $student_id = filter_var($_GET['student-id'], FILTER_SANITIZE_NUMBER_INT);
      $one = $this->model->getStudentById($student_id);
      $this->view->outputStudent($one);
    } else {
      echo "there no students";
    }
  }

  public function add()
  {

    if (isset($_POST['classId'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['number'])) {
      $classId = filter_var($_POST['classId'], FILTER_SANITIZE_NUMBER_INT);
      $classId = filter_var($classId, FILTER_VALIDATE_INT);
      $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
      $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      $number = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);
      $number = filter_var($number, FILTER_VALIDATE_INT);
      $one = $this->model->addStudent($classId, $firstName, $lastName, $email, $number);
      $this->view->createNewStudent($one);


    }

  }
}