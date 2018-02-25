<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include '../classes/Exam.php';
	$exm = new Exam();
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$queAdd = $exm->questionAdd($_POST);
	}
?>

<?php
	$total = $exm->getQuesData();
	$next  = $total+1;
?>

<div class="main">
	<h1>Question Add</h1>

	<div class="qusadd">
		<?php
			if (isset($_GET['Message'])) {
				echo $_GET['Message'];
			}
		?>
		<form action="" method="post">
			<table>
				<tr>
					<td>Question No</td>
					<td>:</td>
					<td>
						<input type="number" readonly value="<?php
							if(isset($next)){
								echo $next;
							}
						?>" name="quesNo" />
					</td>
				</tr>
				<tr>
					<td>Question</td>
					<td>:</td>
					<td>
						<input type="text" name="ques" required placeholder="Enter Question" />
					</td>
				</tr>
				<tr>
					<td>Choice One</td>
					<td>:</td>
					<td>
						<input type="text" name="ans1" required placeholder="Enter Choice One"/>
					</td>
				</tr>

				<tr>
					<td>Choice Two</td>
					<td>:</td>
					<td>
						<input type="text" name="ans2" required placeholder="Enter Choice Two"/>
					</td>
				</tr>

				<tr>
					<td>Choice Three</td>
					<td>:</td>
					<td>
						<input type="text" name="ans3" required placeholder="Enter Choice Three"/>
					</td>
				</tr>
				<tr>
					<td>Choice Four</td>
					<td>:</td>
					<td>
						<input type="text" name="ans4" required placeholder="Enter Choice Four"/>
					</td>
				</tr>
				<tr>
					<td>Correct No</td>
					<td>:</td>
					<td>
						<input type="number" min="0" name="rightAns" />
					</td>
				</tr>

				<tr>
					<td colspan="3" align="center">
						<input type="submit" name="submit" value="Add Question" />
					</td>
				</tr>


			</table>
		</form>
	</div>

	
</div>
<?php include 'inc/footer.php'; ?>