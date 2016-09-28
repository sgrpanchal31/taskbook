<?php
class subHead{

	public $ID, $username, $task, $assignedby, $str;
	public function __construct() {
		$this->str = "<tr><td>".$this->assignedTo."</td><td>".$this->task."<br>"."<span style='font-size:10px;'>Assigned By-".$this->assignedBy."&nbsp; At-".$this->assignedTime."</span>"."</td></tr>";
		
	}
}

class allSubHead{
	private $db;
	function __construct($conn){
		$this->db=$conn;
	}

	public function importData() {
		$query = $this->db->query('SELECT * FROM taskTable');
		$subheads = $query->fetchAll(PDO::FETCH_CLASS, "subHead");
		$string = "";
		foreach($subheads as $subhead){
			$string .= $subhead->str;
		}
		return $string;
	}
}

?>