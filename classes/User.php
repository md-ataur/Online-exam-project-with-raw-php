<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');


class User{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function allUserData(){
		$query = 'SELECT * FROM tbl_user ORDER BY userid DESC';
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteUser($id){
		$query = "DELETE FROM tbl_user WHERE userid='$id' ";
		$result = $this->db->delete($query);
		if ($result) {
			$msg = "<span class='success'>Successfully user deleted</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>User not Deleted</span>";
			return $msg;
		}
	}

	public function userDisable($id){
		$query = "UPDATE tbl_user 
					SET
					status = '1' 
					WHERE userid='$id' ";

		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'>User Disabled</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>User Not Disable</span>";
			return $msg;
		}
	}

	public function userEnable($id){
		$query = "UPDATE tbl_user 
					SET
					status = '0' 
					WHERE userid='$id' ";

		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'>User Enabled</span>";
			return $msg;
		}else{
			$msg = "<span class='error'>User Not Enabled</span>";
			return $msg;
		}
	}


	/* Frontend user registration */
	public function userRegistration($name, $username, $email, $password){
		$name 		= $this->fm->validation($name);
		$username 	= $this->fm->validation($username);
		$email 		= $this->fm->validation($email);
		$password 	= $this->fm->validation($password);
		
		$name 		= mysqli_real_escape_string($this->db->link, $name);
		$username 	= mysqli_real_escape_string($this->db->link, $username);
		$email 		= mysqli_real_escape_string($this->db->link, $email);
		$password 	= mysqli_real_escape_string($this->db->link, $password);
		

		if ($name == '' || $username == '' || $email == '' || $password == '') {
			echo "<span class='error'>Fields must not be empty !</span>";
			exit();
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<span class='error'>Invalid email address !</span>";
			exit();
		}else{
			$password = md5($password);
			$chkquery = "SELECT * FROM tbl_user WHERE email='$email'";
			$chkemail = $this->db->select($chkquery);
			if ($chkemail != false) {
				echo "<span class='error'>Email already exist !</span>";
				exit();
			}else{
				$query = "INSERT INTO tbl_user(name, username, password, email) VALUES ('$name', '$username', '$password', '$email')";
				$result = $this->db->insert($query);
				if ($result) {
					echo "<span class='success'>You have been registered !</span>";
				}else{
					echo "<span class='error'>You are not registered !</span>";
				}
			}	
		}
	}

	/* Frontend login */
	public function userLogin($email, $password){
		$email 		= $this->fm->validation($email);
		$password 	= $this->fm->validation($password);
		$email 		= mysqli_real_escape_string($this->db->link, $email);

		if ($email == '' || $password == '') {
			echo "empty";
			exit();
		}else{
			$password 	= mysqli_real_escape_string($this->db->link, md5($password));
			$query  = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				if ($value['status'] == '1') {
					echo "disable";
					exit();
				}else{
					Session::init();
					Session::set("login", true);
					Session::set("userid", $value['userid']);
					Session::set("name", $value['name']);
					Session::set("username", $value['username']);
				}
			}else{
				echo "error";
				exit();
			}
		}	
	}

	/* Frontend profile data */
	public function getUserDataById($userid){
		$query  = "SELECT * FROM tbl_user WHERE userid='$userid'";
		$result = $this->db->select($query);
		return $result;
	}	


	/* Frontend profile update */
	public function updateUserData($userid, $data){
		$name 		= $this->fm->validation($data['name']);
		$username 	= $this->fm->validation($data['username']);
		$email 		= $this->fm->validation($data['email']);
		$password 	= $this->fm->validation($data['password']);
		
		$name 		= mysqli_real_escape_string($this->db->link, $name);
		$username 	= mysqli_real_escape_string($this->db->link, $username);
		$email 		= mysqli_real_escape_string($this->db->link, $email);
		$password 	= mysqli_real_escape_string($this->db->link, $password);
		

		if ($name == '' || $username == '' || $email == '' || $password == '') {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$msg = "<span class='error'>Invalid email address !</span>";
			return $msg;
		}else{
			$password = md5($password);
			$query = "UPDATE tbl_user 
						SET
						name     = '$name',
						username = '$username',
						email    = '$email',
						password = '$password'
						WHERE userid='$userid' ";
			$result = $this->db->insert($query);
			if ($result) {
				$msg = "<span class='success'>Succefully Profile Updated!</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Not Updated !</span>";
				return $msg;
			}
		}	
		
	}
}

?>