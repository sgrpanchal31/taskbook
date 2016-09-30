<?php
class subHead{

	public $ID, $assignedBy, $assignedTo, $task,$status, $assignedTime, $completedTime, $str, 
	$line;
	public function __construct() {
		
		

			$this->line = "<tr id=".$this->assignedTo.">
            				<td>".$this->assignedTo."</td>
            				<td>".$this->task."</td>
            				<td>
            					<button class='btn waves-effect waves-light cyan editbtn' type='submit' name='action'>edit
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
				
			};
			if($task!=null){
				return $task;
			} else{
			return 0;
			}
			
	
	}
	public function finish($username){
			$query=$this->db->prepare('SELECT * FROM taskTable WHERE assignedTo=:username');
			$query->execute(array(':username'=>$username));
			while($r=$query->fetch(PDO::FETCH_ASSOC)){
				if($r['status']==0){
					  $sql =$this->db->prepare("UPDATE taskTable SET status=1,completedTime=NOW() WHERE assignedTo=:username");
				 	  $t = $sql->execute(array(':username'=>$username));
						return $t;
				}
		

	
 			}
 			return true;
	}
	//======================head.php functions====================

	public function importsubHeadData() {
		$subheads = $this->selectTable();
		$string = "";
		foreach($subheads as $subhead){
			if($subhead->status == 0){
				$string .= $subhead->line;
			}
		}
		return $string;
	}
	public function showAvailSubHead() {	
		$number=0;
		$query=$this->db->prepare('SELECT DISTINCT assignedTo FROM taskTable WHERE assignedTo NOT IN (SELECT assignedTo FROM taskTable WHERE status=0)' );
		$query->execute();
		$string = "";
		while($r=$query->fetch(PDO::FETCH_OBJ)){

			$string .= '<p class="input-field col s4">
          						<input type="checkbox" class="filled-in" name="checkSubHead" id="'.$r->assignedTo.'" value="'.$r->assignedTo.'"  />
          						<label for="'.$r->assignedTo.'">'.$r->assignedTo.'</label>
        					</p>';
		}
		return $string;
	}
	public function assignTask($task, $names, $taskID) {
		try{
			$string = explode(",",$names,-1);
			$assignedBy=$_SESSION['username'];
			$status = 0;
			foreach ($string as $value) {
				$qString = "INSERT INTO taskTable (assignedBy, assignedTo, task, taskID, status, assignedTime) VALUES (:assignedBy, :assignedTo, :task, :taskID, :status, NOW())";
				$query=$this->db->prepare($qString);
				$query->execute(array(':assignedBy'=>$assignedBy, ':assignedTo'=>$value, ':task'=>$task,':taskID'=>$taskID, ':status'=>$status));
			}
			echo "Task successfully assigned";
		}
		catch(PDOException $e){
    		echo "Error: " . $e->getMessage();
    	}
	}
	public function saveTask($assignedTo, $task) {
		try{
			$query=$this->db->prepare("UPDATE taskTable SET task=:task WHERE assignedTo=:assignedTo AND status=0");
			$query->execute(array(':task'=>$task,':assignedTo'=>$assignedTo));
			echo "Task Updated";
		}
		catch(PDOException $e){
    		echo "Error: " . $e->getMessage();
    	}
	}
}
//TODO
//change the text field to table column tr in head.php after updating the task see line 62 of head.js for inspiration   DONE
//refresh table in subhead.php instead of reloading whole page 		DONE
//try showing notifications in the notifications bar in head.php(there are two notification one in nav bar and second in side navbar in mobile view)
//on assigning task, success function close the modal and empty the form values      DONE
//if possible edit task should edit task of each subhead who are given the same task
//TYPE DONE IN FRONT OF THEM IF DONE
?>












