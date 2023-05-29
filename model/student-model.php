<?php
require_once __DIR__ . '/database.php';

class StudentModel extends DB
{
  protected $table = "students";

  public function getAllStudents()
  {
    $query = "SELECT * FROM $this->table ";
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getStudentById($id)
  {
    $query = "SELECT * FROM $this->table  WHERE id = ?";
    $statement = $this->pdo->prepare($query);
    $statement->execute([$id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function deleteStudentById($id)
  {
    $query = "DELETE FROM $this->table  WHERE id = ?";
    $statement = $this->pdo->prepare($query);
    $statement->execute([$id]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }


  public function addStudent(int $classId, string $firstName, string $lastName, string $email, string $number)
  {
    $query = "INSERT INTO $this->table (`classId`, `first_name`, `last_name`,  `email`, `number`) VALUES (?,?,?,?,?)";
    $statement = $this->pdo->prepare($query);
    $statement->execute([$classId, $firstName, $lastName, $email, $number]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}
