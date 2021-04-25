<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=ems','root','');
} catch(PDOException $e){
	exit('DB error');
}
?>