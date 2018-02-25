<?php 
	include 'inc/header.php'; 
	Session::checkUserSession();
	$userid = Session::get("userid");
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$update = $usr->updateUserData($userid, $_POST);
	}

?>

<div class="main">
<h1>User Profile</h1>
	<div class="pfsegment">
		<?php
		if (isset($update)) {
				echo "<p style='margin:0 0 12px;'>".$update."</p>";
			}
		?>
		<form action="" method="post">
			<?php
				$userData = $usr->getUserDataById($userid);
				if ($userData) { 
					$result = $userData->fetch_assoc();
			?>
			<table class="tbl"> 
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $result['name'];?>" /></td>
				</tr>  
				<tr>
					<td>User Name</td>
					<td><input type="text" name="username" value="<?php echo $result['username'];?>"/></td>
				</tr>  
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $result['email'];?>"/></td>
				</tr>
				<tr>
					<td>Password </td>
					<td><input type="password" name="password"/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" id="update" value="Update"></td>
				</tr>
	       </table>
	       <?php } ?>
		</form>
		
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>