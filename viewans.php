<?php 
	include 'inc/header.php'; 
	Session::checkUserSession();
	$total = $exm->getQuesData();
?>

<div class="main">
	<h1>All Question of <?php echo $total;?></h1>
	<div class="test view">
		<?php 
			$getquestion = $exm->questionData();
			if ($getquestion) {
				while ($question = $getquestion->fetch_assoc()) {
					$number = $question['quesNo'];	
		?>
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
					<input type="radio" />
					<?php
						if ($result['rightAns'] == '1') {
							echo "<span style='color:#248eeb;'>".$result['answer']."</span>";
						}else{
							echo $result['answer'];
						}
					?>
				</td>
			</tr>
			<?php } } ?>	
		</table>	
		<?php } } ?>
	</div>
	<div class="start-test">
		<p><a href="starttest.php">Start Test</a></p>
	</div>
</div>
<?php include 'inc/footer.php'; ?>