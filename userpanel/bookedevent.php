<?php
include_once('../includes/db.php');
include_once('../includes/event.php');
include_once('udetails.php');
$userdetail = new Userdetails;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $userdetail->fetch_data($id);

    if(isset($_POST['type'])) {
    $type = $_POST['type'];

        $sql = "UPDATE ud SET event = :type WHERE userid = :id";
        $query = $pdo->prepare($sql);

        $query->bindValue(":type", $type);
        $query->bindValue(":id", $id);

        try {
          $result = $query->execute();
        } catch(PDOException $e) {
          echo $e->getCode() . " - " . $e->getMessage();
        }

        if($result) {
          header("Location: http://localhost:8080/ems/index.php");;
        }
    }
 }
?>