<?php
require_once 'connect.php';
require_once 'class.subHead.php';

if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
	$actionfunction = $_REQUEST['actionfunction'];
	call_user_func($actionfunction,$_REQUEST,$conn);
}
//===============subHead.php functions======================
function showData($data,$conn){
	$object = new allSubHead($conn);
	$string = $object->importData();

	echo $string;
}
function taskData($data,$conn){
	$object = new allSubHead($conn);
	$task= $object->taskData($_SESSION['username']);

	echo $task;
}
function finish($data,$conn){
	$object = new allSubHead($conn);
	$value= $object->finish($_SESSION['username']);

	echo $value;
}
//===============head.php functions======================
function showDataHead($data,$conn){
	$object = new allSubHead($conn);
	$string = $object->importsubHeadData();
	echo $string;
}
function deleteData($data,$conn){
	if (!empty($_POST)){
		$assignedTo = $_POST['assignedTo'];
		$task = $_POST['task'];
		$object = new allSubHead($conn);
		$string = $object->deleteData($assignedTo,$task);
		echo $string;
	}
}
function notifyHead($data,$conn){
	$object = new allSubHead($conn);
	$string = $object->notifyHead();
	echo $string;
}
function notifiedHead($data,$conn){
	$object = new allSubHead($conn);
	$string = $object->notifiedHead();
	echo $string;
}
function showAvailSubHead($data,$conn){
	$object = new allSubHead($conn);
	$string = $object->showAvailSubHead();
	echo $string;
}
function assignTask($data,$conn) {
	if (!empty($_POST)){
		$taskID = $_POST['taskID'];
		$task = $_POST['task'];
		$names = $_POST['names'];
		$object = new allSubHead($conn);
		$string = $object->assignTask($task,$names,$taskID);

		echo $string;
	}
}
function saveTask($data,$conn){
	if (!empty($_POST)){
		$task = $_POST['task'];
		$assignedTo = $_POST['assignedTo'];
		$object = new allSubHead($conn);
		$string = $object->saveTask($assignedTo,$task);

		echo $string;
	}
}
?>
















