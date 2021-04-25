<?php
session_start();
include_once('../includes/db.php');

if(isset($_SESSION['logged_in'])) {
	if(isset($_POST['type'],$_POST['description'],$_POST['location'])){
		$type = $_POST['type'];
		$description = $_POST['description'];
		$location = $_POST['location'];
		
		if(empty($type) or empty($description) or empty($location)){
			$error = 'Required to Add!';
		}else{
			$query = $pdo->prepare('INSERT INTO eventdetails (event_type, event_description, location, eventpost_timestamp) VALUES (?,?,?,?)');
			$query->bindValue(1,$type);
			$query->bindValue(2,$description);
			$query->bindValue(3,$location);
			$query->bindValue(4,time());
			$query->execute();
			header('Location: index.php');
		}
	}
?>
<html>
<head>
<title>EMS</title>
<link rel="stylesheet" href="../styleassets/style.css" />
<script src="../js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background: url('../images/Colour.jpg') no-repeat; background-size: cover;">
<nav class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://localhost:8080/ems/index.php">EMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost:8080/ems/index.php">HOME</a></li>
            <li><a href="http://localhost:8080/ems/adminpanel/">ADMIN PANEL</a></li>
            <li><a href="http://localhost:8080/ems/userpanel/">USER PANEL</a></li>
          </ul>
        </div>
</nav>
<header id="header">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Event Management System <small>We Manage Events</small></h1>
          </div>
		 </div>
</header>

    <section id="main">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> EMS
              </a>
              <a href="http://localhost:8080/ems/index.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Home<span class="badge"></span></a>
              <a href="http://localhost:8080/ems/userpanel/index.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Panel<span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h4 class="panel-title"><strong>Add an Event</strong></h4>
              </div>
              <div class="panel-body">
                <div class="text-center">
                  <div class="well dash-box">
					<?php if(isset($error)) { ?>
					<small style="color: red;"><?php echo $error; ?></small>
					<?php } ?>
					<br/>
					<form action="addevent.php" method="post" autocomplete="off" >
					Event Type: <input type="text" name="type" placeholder="Type"/><br/><br/>
					Description: <input type="text" name="description" placeholder="Description"/><br/><br/>
					Location:<input type="text" name="location" placeholder="Location"/><br/><br/>
					<input type="submit" value="Add an Event" class="btn btn-success" onclick="alert('Event Details have been added')"/>
					</form>
                  </div>
                </div>
              </div>
              </div>
			  <a href="http://localhost:8080/ems/index.php">&larr; Back</a>
</section>
</body>
</html>

<?php
}else{
	header('Location: http://localhost:8080/ems/index.php');
}
?>