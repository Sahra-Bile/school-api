<?php

class ClassView
{

  public function outputClasses(array $students): void
  {
    $json = [
      'class-count' => count($students),
      'result' => $students,
      "here you go!"
    ];
    header("Content-Type: application/json");
    echo json_encode($json);
  }

  public function outputClass(array $class): void
  {
    $json = [
      'class-count' => count($class),
      'result' => $class,
      "message" => "here go we found a class with this given id from database"
    ];

    header("Content-Type: application/json");
    echo json_encode($json);

  }

  public function deleteClass(array $class): void
  {
    $json = [
      'class-count' => count($class),
      'result' => $class

    ];

    header("Content-Type: application/json");
    echo json_encode($json);

  }


  public function createNewClass(array $class): void
  {
    $json = [
      'class-count' => count($class),
      'result' => $class

    ];
    header("Content-Type: application/json");
    echo json_encode($json);

  }
}
