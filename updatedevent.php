<?php
session_start();
include_once('includes/db.php');
include_once('includes/event.php');
$event = new Event;

if(isset($_SESSION['logged_in'])) {
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $event->fetch_data($id);

    if(isset($_POST['eventtype'],$_POST['description'],$_POST['location'])) {
    $eventtype = $_POST['eventtype'];
    $description = $_POST['description'];
	  $location = $_POST['location'];

        $sql = "UPDATE eventdetails SET event_type = :eventtype, event_description = :description, location = :location, eventpost_timestamp = :timestamp WHERE event_id = :id";
        $query = $pdo->prepare($sql);

        $query->bindValue(":eventtype", $eventtype);
        $query->bindValue(":description", $description);
		    $query->bindValue(":location", $location);
        $query->bindValue(":timestamp", time());
        $query->bindValue(":id", $id);

        try {
          $result = $query->execute();
        } catch(PDOException $e) {
          echo $e->getCode() . " - " . $e->getMessage();
        }

        if($result) {
          header("Location: index.php");;
        }
    }
 }
}
?>