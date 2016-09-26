
<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>taskbook</title>
	<link rel="shortcut icon" href="favicon.png">
	<script src="jquery.js"></script>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
	<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="outerBox"></div>
	<div class="header">
		<div class="container">
			<div class="row">
				<h1 class="col s12">Taskbook</h1>
      				<div class="row">
        				<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          					<input placeholder="  Username" id="username" type="text" class="validate">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          					<input placeholder="  Passcode" id="password" type="text" class="validate">
        				</div>
					</div>
					<button class="btn waves-effect waves-light login" type="submit" name="action">Sign in
    					<i class="material-icons right">send</i>
  					</button>
			</div>
			<div >Or <a  onclick="window.location='register.php'">Register</a></div>
		</div>
	</div>
</body>
</html>