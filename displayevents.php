<?php
include_once('includes/db.php');
include_once('includes/event.php');
$event = new Event;

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $event->fetch_data($id);
?>
<html>
<head>
<title>EMS</title>
<link rel="stylesheet" href="styleassets/style.css" />
<script src="../js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background: url('images/Colour.jpg') no-repeat; background-size: cover;">
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Event Management System <small>We Manage Event System</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Options
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="editevent.php?id=<?php echo $data['event_id'];?>">Edit(ADMIN)</a></li>
                <li><a href="http://localhost:8080/ems/userpanel/index.php">Book Event</a></li>
              </ul>
            </div>
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
              <a href="editevent.php?id=<?php echo $data['event_id'];?>" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> EDIT(ADMIN Only)<span class="badge"></span></a>
              <a href="http://localhost:8080/ems/userpanel/index.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Book Event<span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h4 class="panel-title"><strong>Please see Event Details</strong></h4>
              </div>
              <div class="panel-body">
                <div class="text-center">
                  <div class="well dash-box">
					<h4>Event Type: <strong><?php echo $data['event_type'];?></strong>
					<small> updated on <?php echo date('l jS',$data['eventpost_timestamp']);?></small></h4>
					<p><h4>Description: <strong><?php echo $data['event_description'];?></strong></h4></p>
					<p><h4>Location: <strong><?php echo $data['location'];?></strong></h4></p>					
                  </div>
                </div>
              </div>
              </div>
			  <a href="index.php" class="text-center">&larr; Back</a>
    </section>
</body>
</html>
<?php
} else{
	header('Location: index.php');
	exit();
}
?>