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


  public function getAll()
  {

    if (isset($_GET['action'])) {
      $chosenAction = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

      if ($chosenAction == 'students') {
        $all = $this->model->getAllStudents();
        $this->view->outputStudents($all);

      } else {
        echo "there no students to output...";
      }
    }
  }
  public function getById()
  {
    $method = $_SERVER['REQUEST_METHOD'];


    if ($method == 'GET') {
      if (isset($_GET['student-id'])) {
        $student_id = filter_var($_GET['student-id'], FILTER_SANITIZE_NUMBER_INT);
        $student_id = filter_var($student_id, FILTER_VALIDATE_INT);
        $one = $this->model->getStudentById($student_id);
        $this->view->outputStudent($one);

      } else {
        echo "could not find a student with this id...";
      }
    }
  }

  public function add()
  {
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
      if (isset($data['classId'], $data['first_name'], $data['last_name'], $data['email'], $data['number'])) {
        $classId = filter_var($data['classId'], FILTER_SANITIZE_NUMBER_INT);
        $classId = filter_var($classId, FILTER_VALIDATE_INT);
        $firstName = filter_var($data['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $lastName = filter_var($data['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($data['email'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $number = filter_var($data['number'], FILTER_SANITIZE_SPECIAL_CHARS);
        $one = $this->model->addStudent($classId, $firstName, $lastName, $email, $number);
        $this->view->createNewStudent($one);
      } else {
        echo "OBS: could not add a new student";
      }
    }
  }

  public function deleteById()
  {
    $json = file_get_contents("php://input");
    $data = json_decode($json, true);
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'DELETE') {
      if (isset($data['student-id'])) {
        $student_id = filter_var($data['student-id'], FILTER_SANITIZE_NUMBER_INT);
        $student_id = filter_var($student_id, FILTER_VALIDATE_INT);
        $one = $this->model->deleteStudentById($student_id);
        $this->view->deleteStudent($one);
      } else {
        echo " something went wrong...";
      }
    }
  }
}
