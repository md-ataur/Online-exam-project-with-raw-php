<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include '../classes/User.php';
	$user = new User();
?>

<?php

	if (isset($_GET['disbId'])) {
		$disbId = $_GET['disbId'];
		$disable = $user->userDisable($disbId);

	}elseif (isset($_GET['enbId'])) {
		$id = $_GET['enbId'];
		$enable = $user->userEnable($id);
	}
	elseif (isset($_GET['delid'])) {
		$id = $_GET['delid'];
		$del = $user->deleteUser($id);
	}


?>

<div class="main">
	<h1>User List</h1>
	<div class="manageuser">
		<?php
			if (isset($disable)) {
				echo $disable;
			}elseif (isset($enable)) {
				echo $enable;
			}elseif (isset($del)) {
				echo $del;
			}
		?>
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php
				$getData = $user->allUserData();
				if ($getData) {
					$i = 0;
					while ($data = $getData->fetch_assoc()) {
						$i++;
				
			?>
			<tr>
				<td>
					<?php 

						if ($data['status'] == '1') {
							echo "<span class='error'>".$i."</span>";
						}else{
							echo "<span class='success'>".$i."</span>";
						}
						
					?>
						
				</td>
				<td><?php echo $data['name'];?></td>
				<td><?php echo $data['username'];?></td>
				<td><?php echo $data['email'];?></td>
				<td>
					<?php 
						if ($data['status'] == '0') { ?>
							<a href="?disbId=<?php echo $data['userid']?>">Disable</a>
					<?php } else {?>
						<a href="?enbId=<?php echo $data['userid']?>">Enable</a>
					<?php } ?>
					|| <a onclick="return confirm('Are you sure to delete ?');" href="?delid=<?php echo $data['userid']?>">Remove</a></td>

			</tr>
			<?php } } ?>
			
		</table>
	</div>


</div>
<?php include 'inc/footer.php'; ?>