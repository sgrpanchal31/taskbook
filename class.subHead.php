<?php
class subHead{

<<<<<<< HEAD
	public $ID, $assignedTo, $task, $assignedBy, $str,$assignedTime,$completedTime;
=======
	public $ID, $assignedBy, $assignedTo, $task, $status, $assignedTime, $completedTime, $str;
>>>>>>> 73fe493bdaf312d30ccd2d3528ed17876bb3e021
	public function __construct() {
		
		// else if($this->assignedTo==0  || $this->status==1){
		// 		$_SESSION['task']='No task Assigned';
		// 	}

		
		if($this->status==0){
		$this->str = "<tr><td>".$this->assignedTo."</td><td>".$this->task."<br>"."<span style='font-size:10px;'>Assigned By-".$this->assignedBy."&nbsp; At-".$this->assignedTime."</span>"."</td></tr>";
	}

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
	public function taskData($username){
			$query=$this->db->prepare('SELECT * FROM taskTable WHERE assignedTo=:username');
			$query->execute(array(':username'=>$username));
			$r=$query->fetch(PDO::FETCH_ASSOC);
			if($r['status']==0){
			  return $r['task'];
			}else{
				return '';
			}
			// if($this->assignedTo==$_SESSION['username'] && $this->status==0){
			
			// 	$_SESSION['task']=$this->task;
			
			// }
	}
	public function finish($username){
			$query=$this->db->prepare('SELECT * FROM taskTable WHERE assignedTo=:username');
			$query->execute(array(':username'=>$username));
			$r=$query->fetch(PDO::FETCH_ASSOC);
			if($r['status']==0){
				 $r['status']=1;
				 return $r['status'];
			}else{
				return $r['status'];
			}

	}
}

?>