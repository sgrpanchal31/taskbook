<?php
require_once 'connect.php';

class subHead{
	public $ID, $username, $task, $assignedby, $str;

	public function __construct() {
		$this->str = "<tr><td>".$this->username."</td><td>".$this->task."</td></tr>";
	}
}

if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
	$actionfunction = $_REQUEST['actionfunction'];
	
	call_user_func($actionfunction,$_REQUEST,$conn);
}

function showData($data,$conn){
	$user_check=$_SESSION['username'];

	$query = $conn->query('SELECT * FROM taskAssign');
	$subheads = $query->fetchAll(PDO::FETCH_CLASS, "subHead");
	$string = "";
	foreach($subheads as $subhead){
		$string .= $subhead->str;
	}

	
	// while($r = $query->fetch(PDO::FETCH_OBJ)) {
	// 	$string += $r->str;
	// 	echo "susername, <br>";
	// }

	echo $string;
}

?>