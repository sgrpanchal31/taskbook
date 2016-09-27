<?php
	require 'connect.php';
	// if(isset($_SESSION['username']) && $_SESSION['position']==0){
	// 	header("Location : subHead.php");
	// }
	// if(isset($_SESSION['username']) && $_SESSION['position']==1){
	// 	header("Location : head.php");
	// }
	
	class userEntry{
			private $db;
			function __construct($conn){
				$this->db=$conn;
			}
		public function login($username,$password){
			try{
				$query=$this->db->prepare('SELECT * FROM memberlogin WHERE username=:username');
				$query->execute(array(':username'=>$username));
				$r=$query->fetch(PDO::FETCH_ASSOC);
				// echo $r['password'];
				// echo $password; 
				if($r['password']==$password){
					echo 'its done';
					$_SESSION['username']=$username;
					return true;
				}else{
					return false;
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}
	$user1 = new userEntry($conn);

	if(isset($_POST['action'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		if($user1->login($username,$password)){
		header("Location : subHead.php");
		}else{
			
			$error="Wrong details!";
		}
 
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
	<!-- <script type="text/javascript" src="script.js"></script> -->
	<link rel="stylesheet" href="main.css">
</head>
<body data-title="index">
	<div class="outerBox"></div>
	<div class="header">
		<div class="container">
			<div class="row">
				<h1 class="col s12">Taskbook</h1>
				<form method="post">
      				<div class="row">
        				<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          					<input placeholder="  Username" id="username" name="username" type="text" class="validate">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s12 m8 offset-m2 l6 offset-l3">
          					<input name="password" placeholder="  Passcode" id="password" type="password" class="validate">
        				</div>
					</div>
					<button class="btn waves-effect waves-light login" type="submit" name="action">Sign in
    					<i class="material-icons right">send</i>
  					</button>
  					</form>
			</div>
		</div>
	</div>
</body>
</html>