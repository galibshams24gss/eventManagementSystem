<?php
class Userdetails{
	public function fetch_all(){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM ud");
		$query->execute();
		return $query->fetchAll();
	}
	
	public function fetch_data($userid){
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM ud WHERE userid = ?");
		$query->bindValue(1, $userid);
		$query->execute();
		return $query->fetch();
	}
}
?>