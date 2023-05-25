<?php

class StudentView
{

  public function outputStudents(array $students): void
  {
    $json = [
      'student-count' => count($students),
      'result' => $students
    ];
    header("Content-Type: application/json");
    echo json_encode($json);
  }

  public function outputStudent(array $student): void
  {

    header("Content-Type: application/json");
    echo json_encode($student);

  }

  public function deleteStudent(array $student): void
  {
    $json = [
      'student-count' => count($student),
      'result' => $student,
      'message' => "Deleted successfully!"
    ];

    header("Content-Type: application/json");
    echo json_encode($json);

  }


  public function createNewStudent(array $student): void
  {
    $json = [
      'student-count' => count($student),
      'result' => $student,
      'message' => "added a new student successfully!"
    ];
    header("Content-Type: application/json");
    echo json_encode($json);

  }
}
