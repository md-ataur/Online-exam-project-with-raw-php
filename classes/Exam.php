<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');


class Exam{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	/* Backend: Select All question */	
	public function questionData(){
		$query = 'SELECT * FROM tbl_question ORDER BY quesNo ASC';
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteQuestion($quesNo){
		$tables = array("tbl_question","tbl_answer");
		foreach ($tables as $table) {
			$delQuery = "DELETE FROM $table WHERE quesNo='$quesNo'";
			$result = $this->db->delete($delQuery);
		}
		if ($result) {
			//$msg = "<span class='success'>Successfully Question deleted</span>";
			//return $msg;
			header('Location:queslist.php');

		}else{
			$msg = "<span class='error'>not Deleted</span>";
			return $msg;
		}
	}

	/* Backend: total question number */
	public function getQuesData(){
		$query = "SELECT * FROM tbl_question";
		$quesResult = $this->db->select($query);
		$total = $quesResult->num_rows;
		return $total;
	}

	/* Backend: question add */
	public function questionAdd($data){
		$quesNo   = mysqli_real_escape_string($this->db->link, $data['quesNo']);
		$ques     = mysqli_real_escape_string($this->db->link, $data['ques']);
		$ans1     = mysqli_real_escape_string($this->db->link, $data['ans1']);
		$ans2     = mysqli_real_escape_string($this->db->link, $data['ans2']);
		$ans3     = mysqli_real_escape_string($this->db->link, $data['ans3']);
		$ans4 	  = mysqli_real_escape_string($this->db->link, $data['ans4']);
		$rightAns = mysqli_real_escape_string($this->db->link, $data['rightAns']);

		$answer    = array();
		$answer[1] = $ans1;
		$answer[2] = $ans2;
		$answer[3] = $ans3;
		$answer[4] = $ans4;

		$query = "INSERT INTO tbl_question(quesNo, ques) VALUES ('$quesNo','$ques')";
		$insert_row = $this->db->insert($query);
		if ($insert_row) {
			foreach ($answer as $key => $ans) {
				if ($ans != '') {
					if ($rightAns == $key) {
						$rquery = "INSERT INTO tbl_answer(quesNo, rightAns, answer) VALUES ('$quesNo','1','$ans')";
					}else{
						$rquery = "INSERT INTO tbl_answer(quesNo, rightAns, answer) VALUES ('$quesNo','0','$ans')";
					}
					$insertrow = $this->db->insert($rquery);
					if ($insertrow) {
						continue;
					}else{
						die('Error...');
					}
				}
			}

			$msg = "<span class='success'>Successfully Question Added</span>";
			header("Location:quesadd.php?Message=".$msg);
			
			//header('Location:'.$_SERVER['REQUEST_URI']); //redirect to the exactly same page 
			//exit;
		}else{
			$msg = "<span class='success'>Not Added</span>";
			header("Location:quesadd.php?Message=".$msg);

		}
	}

	/* Frontend: get question all */
	public function getQuestionAll(){
		$query = "SELECT * FROM tbl_question";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	/* Frontend: get question by quesNumber */
	public function getQuesByNumber($number){
		$query = "SELECT * FROM tbl_question WHERE quesNo='$number'";
		$ques  = $this->db->select($query); 
		$result = $ques->fetch_assoc();
		return $result;
	}

	/* Forntend: get Answer by quesNumber*/
	public function getAnswer($number){
		$query = "SELECT * FROM tbl_answer WHERE quesNo ='$number'";
		$ans  = $this->db->select($query); 
		return $ans;
	}

}

?>