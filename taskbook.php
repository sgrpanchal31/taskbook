<?php
session_start();
require_once 'connect.php';
if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
	$actionfunction = $_REQUEST['actionfunction'];

	call_user_func($actionfunction,$_REQUEST,$con);
}

function showData($data,$conn){
	$user_check=$_SESSION['username'];
	class subHeadData {
		public $ID, $username, $task, $assignedby, $str;

		public function __construct() {
			$this->str = "<tr><td>{$this->username}</td><td>{$this->task}</td></tr>";
		}
	}

	$query = $conn->query('SELECT * FROM taskAssign');
	$query->setFetchMode(PDO::FETCH_CLASS, 'subHeadData');
	$string = "";
	while($r = $query->fetch()) {
		$string += $r->str;
	}

	echo $string;
}

?>