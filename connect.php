<?php

session_start();

$servername = "localhost";
$username = "root";
<<<<<<< HEAD
$password = "";
=======
$password = "root";
>>>>>>> 96fa403937bd4fd7953c5913f8fa8fe20a29596e
$dbname = "taskbook";

try
{
     $conn = new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
}
catch(PDOException $e)
{
     echo $e->getMessage();
     die();
}
class userEntry{
	private $db;
	function __construct($conn){
		$this->db=$conn;
	}
		public function login($username,$password){
			try{
				$query=$this->db->query('SELECT * FROM memberlogin WHERE username=username');
				$r=$query->fetch(PDO::FETCH_ASSOC);
				if($r['password']==$password){
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

?>