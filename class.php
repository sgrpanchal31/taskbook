<?php
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
					// echo 'its done';
					$_SESSION['position']=$r['position'];
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
		public function logout()
   		{
        session_destroy();
        unset($_SESSION['username']);
        return true;
   		}
	}
?>