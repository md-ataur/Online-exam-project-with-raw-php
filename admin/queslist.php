<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include '../classes/Exam.php';
	$exm = new Exam();
?>

<?php
	if (isset($_GET['delid'])) {
		$quesNo = $_GET['delid'];
		$delQues = $exm->deleteQuestion($quesNo);
	}
?>

<div class="main">
	<h1>Question List</h1>
	<div class="manageuser">
		<?php
			if (isset($delQues)) {
				echo $delQues;
			}
		?>
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Question</th>
				<th>Action</th>
			</tr>
			<?php
				$getData = $exm->questionData();
				if ($getData) {
					$i = 0;
					while ($data = $getData->fetch_assoc()) {
						$i++;		
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $data['ques'];?></td>
				<td>
					<a onclick="alert('Are you sure to delete ?');" href="?delid=<?php echo $data['quesNo']?>">Remove</a>
				</td>

			</tr>
			<?php } } ?>
			
		</table>
	</div>
</div>

<?php include 'inc/footer.php'; ?>