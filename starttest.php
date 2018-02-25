<?php 
	include 'inc/header.php'; 
	Session::checkUserSession();
	$total = $exm->getQuesData();
	$ques  = $exm->getQuestionAll();
?>

<div class="main">
<h1>Welcome to Online Exam</h1>
	<div class="exambar">
		<h3>Test your knowledge</h3>
		<p>This is multple choice quiz to test your knowledge</p>
		<p><strong>Number Of Questions: </strong><?php echo $total;?></p>	
		<p><strong>Question Type:</strong> Multiple Choice</p>
		<div class="start-test">
			<p><a href="test.php?q=<?php echo $ques['quesNo'];?>">Start Test</a></p>
		</div>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>