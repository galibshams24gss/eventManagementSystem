<?php
include_once('includes/db.php');
include_once('includes/event.php');
$event = new Event;
$events = $event->fetch_all();

$search=$_POST['search'];
$sql = "SELECT * FROM eventdetails WHERE event_type LIKE '%$search%'";
$srch = $pdo->query($sql);
$count = $srch->rowCount();

if($count > 0)
{
	while($dt = $srch->fetchAll(PDO::FETCH_ASSOC))
	{
		foreach ($dt as $dts){
			?>
			<strong><u><?php echo $dts['event_type']."<br/>";?></strong></u>
			<?php
			echo $dts['event_description']."<br/>";
			echo $dts['location']."<br/>";
		}
	}	
}
else{
	echo "Event Type Not Found!";
}
?>