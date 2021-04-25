<?php
include_once('../includes/db.php');
include_once('../includes/event.php');
$event = new Event;
$events = $event->fetch_all();

if(isset($_POST['fulllname'],$_POST['firstname'],$_POST['lastname'],$_POST['dob'],$_POST['nationality'],$_POST['occupation'],$_POST['institute'],$_POST['event
'])){
		$fulllname = $_POST['fulllname'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$dob = $_POST['dob'];
		$nationality = $_POST['nationality'];
		$occupation = $_POST['occupation'];
		$institute = $_POST['institute'];
		$event = $_POST['event'];
		
		if(empty($fulllname) or empty($firstname) or empty($lastname) or empty($dob) or empty($nationality) or empty($occupation) or empty($institute) or empty($event)){
			$error = 'Required to Add!';
		}else{
			$query = $pdo->prepare('INSERT INTO ud (fulllname, firstname, lastname, dob, nationality, occupation, institute, event) VALUES (?,?,?,?,?,?,?,?)');
			$query->bindValue(1,$fulllname);
			$query->bindValue(2,$firstname);
			$query->bindValue(3,$lastname);
			$query->bindValue(4,$dob);
			$query->bindValue(5,$nationality);
			$query->bindValue(6,$occupation);
			$query->bindValue(7,$institute);
			$query->bindValue(8,$event);
			
			$query->execute();
			header('Location: index.php');
		}
	}
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
					<h3><strong>Add Details</strong></h3>
					<form action="newusers.php" method="post" autocomplete="off" >
					Full Name: <input type="text" name="fulllname" placeholder="Fullname"/><br/>
					First Name: <input type="text" name="firstname" placeholder="Firstname"/><br/>
					Last Name: <input type="text" name="lastname" placeholder="Lastname"/><br/>
					Date of Birth: <input type="text" name="dob" placeholder="Date of Birth"/><br/>
					Nationality: <input type="text" name="nationality" placeholder="Nationality"/><br/>
					Occupation: <input type="text" name="occupation" placeholder="Occupation"/><br/>
					Institute(Educational/Job): <input type="text" name="institute" placeholder="Institute"/><br/>
					I want to choose event: <input type="text" name="event" placeholder="Event"/><br/>
					<input type="submit" value="SUBMIT" class="btn btn-success"/><br/>
					</form>
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