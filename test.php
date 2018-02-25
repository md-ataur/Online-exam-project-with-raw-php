<?php 
	include 'inc/header.php'; 
	Session::checkUserSession();
	$total = $exm->getQuesData();
	if (isset($_GET['q'])) {
		$number = $_GET['q'];
	}
	$question = $exm->getQuesByNumber($number);
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$process = $pros->processAns($_POST);
	}
?>
<div class="main">
<h1>Question <?php echo $question['quesNo'] .' of '. $total;?></h1>
	<div class="test">
		<form method="post" action="">
			<table> 
				<tr>
					<td colspan="2">
						<h3>Que <?php echo $question['quesNo'];?>: <?php echo $question['ques'];?></h3>
					</td>
				</tr>
				<?php
					$answer = $exm->getAnswer($number);
					if ($answer) {
						while ($result = $answer->fetch_assoc()) {
				?>
				<tr>
					<td>
						<input required type="radio" name="ans" value="<?php echo $result['id'];?>" /><?php echo $result['answer'];?>
					</td>
				</tr>
				<?php } } ?>
				<tr>
				  	<td>
						<input type="submit" name="submit" value="Next Question"/>
						<input type="hidden" name="number" value="<?php echo $number;?>" />
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include 'inc/footer.php'; ?>