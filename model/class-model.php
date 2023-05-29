<?php
require_once __DIR__ . '/database.php';
class ClassModel extends DB
{
  protected $table = "class";


  public function getClass($empId)
  {
    $sqlQuery = '';
    if ($empId) {
      $sqlQuery = "WHERE id = '" . $empId . "'";
    }
    $empQuery = "
      SELECT *
      FROM " . $this->table . " $sqlQuery
      ORDER BY id DESC";

    $statement = $this->pdo->prepare($empQuery);
    $statement->execute();
    $empData = array();
    while ($empRecord = $statement->fetchAll(PDO::FETCH_ASSOC)) {
      $empData[] = $empRecord;
    }
    header('Content-Type: application/json');
    echo json_encode($empData);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  /*
  $statement = $this->pdo->prepare($query);
   $statement->execute([$id]);
   return $statement->fetchAll(PDO::FETCH_ASSOC);
   */


  public function deleteClass($id)
  {

    if ($id) {
      $query = "
        DELETE FROM " . $this->table . " 
        WHERE id = '" . $id . "'	ORDER BY id DESC";
      $statement = $this->pdo->prepare($query);
      $statement->execute();
      if ($statement) {
        $messgae = "Class delete Successfully.";
        $status = 1;
      } else {
        $messgae = "Class delete failed.";
        $status = 0;
      }
    } else {
      $messgae = "Invalid request.";
      $status = 0;
    }
    $response = array(
      'status' => $status,
      'status_message' => $messgae
    );
    header('Content-Type: application/json');
    echo json_encode($response);
  }


  public function insertClass(string $name)
  {

    $query = "INSERT INTO $this->table (`name`) VALUES (?)";
    $statement = $this->pdo->prepare($query);
    $statement->execute([$name]);

    if ($statement) {
      $messgae = "Class created Successfully.";
      $status = 1;
    } else {
      $messgae = "Class creation failed.";
      $status = 0;
    }
    $response = array(
      'status' => $status,
      'status_message' => $messgae
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}
