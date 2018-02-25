<?php 
	include 'inc/header.php'; 
	Session::checkUserSession();
?>

<div class="main">
	<h1>You have done</h1>
	<div class="exambar">
		<p>Final Score 
			<strong>: 
				<?php 
					if (isset($_SESSION['score'])) {
						echo $_SESSION['score'];
						unset($_SESSION['score']);
					}
				?>
			</strong>
		</p>	
		<div class="start-test">

			<p><a href="viewans.php">View Answer</a></p>
			<p><a href="starttest.php">Start Test</a></p>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>