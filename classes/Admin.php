<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');


class Admin{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAdminData($data){
		$user = $this->fm->validation($data['adminUser']);
		$pass = $this->fm->validation($data['adminPass']);

		$user = mysqli_real_escape_string($this->db->link, $user);
		$pass = mysqli_real_escape_string($this->db->link, $pass);


		if (empty($user) || empty($pass)) {
			$msg = "<span class='error'>Fields must not be empty !</span>";
			return $msg;
		}else{
			$pass = md5($pass);
			$query = "SELECT * FROM tbl_admin WHERE adminUser='$user' AND adminPass='$pass'";
			$result = $this->db->select($query);
			if ($result !=false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("id", $value['adminId']);
				Session::set("user", $value['adminUser']);
				header("Location:index.php");
			}else{
				$msg = "<span class='error'>User or Password Invalid !</span>";
				return $msg;
			}
		}
	}
}

?>