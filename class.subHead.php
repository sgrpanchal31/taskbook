<?php
class subHead{

	public $ID, $username, $task, $assignedby, $str;
	public function __construct() {
		$this->str = "<tr><td>".$this->username."</td><td>".$this->task."</td></tr>";
	}
}

class allSubHead{
	private $db;
	function __construct($conn){
		$this->db=$conn;
	}

	public function importData() {
		$query = $this->db->query('SELECT * FROM taskAssign');
		$subheads = $query->fetchAll(PDO::FETCH_CLASS, "subHead");
		$string = "";
		foreach($subheads as $subhead){
			$string .= $subhead->str;
		}
		return $string;
	}
}

?>