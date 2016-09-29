<?php
class subHead{

	public $ID, $assignedBy, $assignedTo, $task,$status, $assignedTime, $completedTime, $str, 
	$line;
	public function __construct() {
		
		// else if($this->assignedTo==0  || $this->status==1){
		// 		$_SESSION['task']='No task Assigned';
		// 	}

			$this->line = "<tr>
            				<td>".$this->assignedTo."</td>
            				<td>".$this->task."</td>
            				<td>
            					<button class='btn waves-effect waves-light cyan' type='submit' name='action'>edit
  								</button>
  							</td>
          				</tr>";

		
			if($this->status==0){
			$this->str = "<tr><td>".$this->assignedTo."</td><td>".$this->task."<br><span style='font-size:10px;'>Given By-".$this->assignedBy." &#8226; At-".$this->assignedTime."</span>"."</td></tr>";
			}

	}
}

class allSubHead{
	private $db;
	function __construct($conn){
		$this->db=$conn;
	}
	public function selectTable() {
		$query = $this->db->query('SELECT * FROM taskTable');
		$subheads = $query->fetchAll(PDO::FETCH_CLASS, "subHead");

		return $subheads;
	}
	//=====================subhead.php functions====================
	public function importData() {
		// $query = $this->db->query('SELECT * FROM taskTable');
		// $subheads = $query->fetchAll(PDO::FETCH_CLASS, "subHead");
		$subheads = $this->selectTable();
		$string = "";
		foreach($subheads as $subhead){
			$string .= $subhead->str;
		}
		return $string;
	}

	public function taskData($username){
			$task=null;
			$query=$this->db->prepare('SELECT * FROM taskTable WHERE assignedTo=:username');
			$query->execute(array(':username'=>$username));
			while($r=$query->fetch(PDO::FETCH_ASSOC)){
				if($r['status']==0 ){
			  		$task=$r['task'];
				}
				// else{
				
				// 	return 'No task Assigned';
				// }
			};
			if($task!=null){
				return $task;
			} else{
			return 0;
			}
			// if($this->assignedTo==$_SESSION['username'] && $this->status==0){
			
			// 	$_SESSION['task']=$this->task;
			
			// }
	
	}
	public function finish($username){
			$query=$this->db->prepare('SELECT * FROM taskTable WHERE assignedTo=:username');
			$query->execute(array(':username'=>$username));
			while($r=$query->fetch(PDO::FETCH_ASSOC)){
				if($r['status']==0){
					 $r['status']=1;
				 
				}
		

	
 			}
 			return true;
	}
	//======================head.php functions====================

	public function importsubHeadData() {
		$subheads = $this->selectTable();
		$string = "";
		foreach($subheads as $subhead){
			$string .= $subhead->line;
		}
		return $string;
	}
	public function showAvailSubHead() {
		
		$number=0;
		$query=$this->db->prepare('SELECT * FROM taskTable WHERE status!=:number1');
		$query->execute(array(':number1'=>$number));
		//$r=$query->fetch(PDO::FETCH_ASSOC);
		$string = "";
		while($r=$query->fetch(PDO::FETCH_OBJ)){
			$string .= $r->assignedTo. '<br>';
		}
		return '$string';
	}
}

?>














