<?php
require_once 'connect.php';
require_once 'class.subHead.php';

if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
	$actionfunction = $_REQUEST['actionfunction'];
	
	call_user_func($actionfunction,$_REQUEST,$conn);
}

function showData($data,$conn){
	$user_check=$_SESSION['username'];

	// $query = $conn->query('SELECT * FROM taskAssign');
	// $subheads = $query->fetchAll(PDO::FETCH_CLASS, "subHead");
	// $string = "";
	// foreach($subheads as $subhead){
	// 	$string .= $subhead->str;
	// }
	$object = new allSubHead($conn);
	$string = $object->importData();

	
	// while($r = $query->fetch(PDO::FETCH_OBJ)) {
	// 	$string += $r->str;
	// 	echo "susername, <br>";
	// }

	echo $string;
}
function taskData($data,$conn){
	$object1 = new allSubHead($conn);
	$task= $object1->taskData($_SESSION['username']);
	echo $task;
}
function finish($data,$conn){
	$object2 = new allSubHead($conn);
	$value= $object2->taskData($_SESSION['username']);
	echo $value;

}

?>