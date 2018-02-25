<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');


class Process{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function processAns($data){
		$answer = $this->fm->validation($data['ans']);
		$number = $this->fm->validation($data['number']);
		$answer = mysqli_real_escape_string($this->db->link, $answer);
		$number = mysqli_real_escape_string($this->db->link, $number);
		$next   = $number+1;

		if (!isset($_SESSION['score'])) {
			$_SESSION['score'] = '0';
		}

		$rightAns = $this->rightAns($number);
		if ($rightAns == $answer) {
			$_SESSION['score']++;
		}

		$total = $this->getTotal();
		if ($number == $total) {
			header("Location:final.php");
			exit();
		}else{
			header("Location: test.php?q=".$next);
		}

	}

	private function rightAns($number){
		$query = "SELECT * FROM  tbl_answer WHERE quesNo='$number' AND 	rightAns='1'";
		$getData = $this->db->select($query)->fetch_assoc();
		$result = $getData['id'];
		return $result;
	}

	private function getTotal(){
		$query = "SELECT * FROM tbl_question";
		$quesResult = $this->db->select($query);
		$total = $quesResult->num_rows;
		return $total;
	}
}

?>