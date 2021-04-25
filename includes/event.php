<?php
class Event{
	public function fetch_all(){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM eventdetails");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function fetch_data($event_id){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM eventdetails WHERE event_id = ?");
		$query->bindValue(1, $event_id);
		$query->execute();
		return $query->fetch();
	}
}
?>