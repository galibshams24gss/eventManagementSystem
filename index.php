<?php
include_once('includes/db.php');
include_once('includes/event.php');
$event = new Event;
$events = $event->fetch_all();
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>EMS</title>
<link rel="stylesheet" href="styleassets/style.css" />
<script src="js/bootstrap.min.js"></script>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Event Management System <small>We Manage Events</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Options
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="http://localhost:8080/ems/adminpanel/">ADMIN PANEL</a></li>
                <li><a href="http://localhost:8080/ems/userpanel/">USER PANEL</a></li>
              </ul>
            </div>
          </div>
        </div>
    </header>

    <section id="breadcrumb">
        <div class="breadcrumb">
          <div class = "row">
			<div class = "col-md-3"></div>
			<div class = "col-md-6 well" style="margin-top:2%;">
			<form action="search.php" method="post">
			<div class="form-group">
			<label class="sr-only" for="exampleInput"></label>
			<div class="input-group">
			<div class="input-group-addon">Search</div>
			<input type="text" class="form-control search" name="search" placeholder="Search By Event">
			<div class="input-group-addon glyphicon glyphicon-search"></div>
			</div>
			</div>
			</form>
			<div class="success"></div>
		  </div>
        </div>
    </section>

    <section id="main">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> EMS
              </a>
              <a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Home <span class="badge"></span></a>
              <a href="http://localhost:8080/ems/adminpanel/" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Admin Panel <span class="badge"></span></a>
              <a href="http://localhost:8080/ems/userpanel/" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Panel <span class="badge"></span></a>
            </div>

            <div class="well">
              <h4>Users' Satisfaction</h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                      80%
              </div>
            </div>
            <h4>Current Users </h4>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                    70%
            </div>
          </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h4 class="panel-title"><strong>Events (Click to see Details)</strong></h4>
              </div>
              <div class="panel-body">
                <div class="text-center">
                  <div class="well dash-box">
					<?php foreach ($events as $event) { ?>
					<a href="displayevents.php?id=<?php echo $event['event_id'];?>" class="btn btn-primary">
					<?php echo $event['event_type'];?></a> - updated on <small><?php echo date('l jS',$event['eventpost_timestamp']);?></small><br/>
					<?php } ?>
                  </div>
                </div>
              </div>
              </div>

              <!-- Slideshow -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><strong>Slideshow</strong></h4>
                </div>
				<div class="panel-body">
                  <div class="well dash-box">
					<div class="slideshow">
					<div><img src = "images/meetevent.jpg" class="img-responsive center-block"></div>
					<div><img src = "images/fashion2.jpg" class = "img-responsive center-block"></div>
					<div><img src = "images/urbanxchange.jpg" class = "img-responsive center-block"></div>
					<div><img src = "images/bdayevent.jpg" class = "img-responsive center-block"></div>
					<div><img src = "images/meeting2.jpg" class = "img-responsive center-block"></div>
					</div>
                </div>
              </div>
			</div>
			</div>
    </section>

    <footer id="footer">
      <p class="text-justify">&copy; Copyright 2021  Event Management System. All rights reserved. </p>
    </footer>

<script>
$('document').ready(function(){
	$('.search').keyup(function(){
		var search = $(this).val();
		$.post($('form').attr('action'),
		{'search':search},
		function(data){
			$('.success').html(data);
		}
		)
	})
})
</script>

<script>
$(".slideshow>div:gt(0)").hide();
setInterval(function(){
	$('.slideshow>div:first')
	.fadeOut(700)
	.next()
	.fadeIn(700)
	.end()
	.appendTo('.slideshow');	
}, 3000);
</script>

</body>
</html>