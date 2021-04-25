<?php
include_once('../includes/db.php');
include_once('../includes/event.php');
include_once('udetails.php');
$userdetail = new Userdetails;
$userdetails = $userdetail->fetch_all();
$event = new Event;
$events = $event->fetch_all();
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
</header>

<section id="main">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> EMS
              </a>
              <a href="http://localhost:8080/ems/index.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Home<span class="badge"></span></a>
              <a href="http://localhost:8080/ems/adminpanel/index.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Admin Panel<span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <div class="well dash-box">
					<?php if(isset($error)) { ?>
					<small style="color: red;"><?php echo $error; ?></small>
					<?php } ?>

					<br/><br/>
					<h3><strong>Logged In</strong></h3>
					<?php foreach ($userdetails as $userdetail) { ?>
					Full Name: <strong><?php echo $userdetail['fulllname'];?></strong><br/>
					First Name: <strong><?php echo $userdetail['firstname'];?></strong><br/>
					Last Name: <strong><?php echo $userdetail['lastname'];?></strong><br/>
					Date of Birth: <strong><?php echo $userdetail['dob'];?></strong><br/>
					Nationality: <strong><?php echo $userdetail['nationality'];?></strong><br/>
					Occupation: <strong><?php echo $userdetail['occupation'];?></strong><br/>
					Institute(Educational/Job): <strong><?php echo $userdetail['institute'];?></strong><br/>
					Booked Event: <strong><?php echo $userdetail['event'];?></strong><br/>
					<?php } ?>
					<a href="http://localhost:8080/ems/index.php" class="btn btn-warning">&larr; LogOut</a>
					<br/>
					<h3><u>Change Event?</u></h3>
					<a href="bookevent.php?id=<?php echo $userdetail['userid'];?>"><small>Change My Event</small></a><br/>
					<?php foreach ($events as $event) { ?>
					<strong> Event ID: <?php echo $event['event_id'];?></strong><br/>
					Event Type:<?php echo $event['event_type'];?><br/>
					Description:<?php echo $event['event_description'];?><br/>
					Location:<?php echo $event['location'];?><br/>
					<?php } ?>
                  </div>
                </div>
              </div>
              </div>
			  <a href="http://localhost:8080/ems/index.php">&larr; Back</a>
    </section>
</body>
</html>