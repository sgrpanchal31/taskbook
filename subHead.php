<?php
require_once 'connect.php';
if(!isset($_SESSION['username'])){
	header('location: index.php');
}
if($_SESSION['position']!=0){
  header('location: head.php');
}
?>
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Taskbook</title>
	<link rel="shortcut icon" href="favicon.png">
	<script src="jquery.js"></script>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="subHead.js"></script>
	<link rel="stylesheet" href="user.css">
</head>
<body data-title="subHead">
	<div class="navbar-fixed">
		<nav class="cyan accent-4">
			<div class="container">
			    <div class="nav-wrapper black-text">
			      	<a href="#!" class="brand-logo" style="font-weight: 300;">Taskbook</a>
			      	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			      	<ul class="right hide-on-med-and-down black-text">
			        	<li><a href="logout.php" >Logout</a></li>
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        	<li><a href="logout.php">Logout</a></li>
			      </ul>
			</div>
	    </div>
	  </nav>
	</div>
	<nav class="cyan accent-2">
		<div class="container">
		    <div class="nav-wrapper black-text">
		      	<a href="#!" class="brand-logo black-text" style="font-weight: 300;"><i class="small material-icons">person</i><?php $user=$_SESSION['username']; echo $user;?></a>
			</div>
	    </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col s12 m5 l5 z-depth-1 taskBox" style="padding: 0;">
				<div class="taskHead cyan accent-4"><h5>Your Task</h5></div>
				<p class="response"></p>
				<div class="btnDiv">
					<button class="btn waves-effect waves-light cyan finish" type="submit" name="action">Report finished
	  				</button>
	  			</div>
	  			
			</div>
			<div class="col s12 m6 push-m1 l6 push-l1 z-depth-1 otherBox" style="padding: 0;">
				<div class="taskHead cyan accent-4" ><h5>Your Teammate's Task</h5></div>
				<table class="striped">
        			<thead>
          				<tr>
              				<th data-field="id">Name</th>
              				<th data-field="name">Event Assigned</th>
          				</tr>
        			</thead>
        			<tbody id="tableBody">
          				
        			</tbody>
      			</table>
			</div>
		</div>
	</div>
</body>
</html>











