<?php 
	include 'inc/header.php'; 
	Session::checkUserLogin(); 
?>

<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
		<form action="" method="post">
			<table class="tbl">    
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" id="email" /></td>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="password" id="password" /></td>
					</tr>
				 
					<tr>
						<td></td>
						<td><input type="submit" id="login" value="Login"></td>
					</tr>
	       </table>
		</form>
	   <p style="margin:8px 0 10px;">New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="empty" style="display: none;">Fields must not be empty !</span>
	   <span class="error" style="display: none;">User or Password not matched !</span>
	   <span class="disable" style="display: none;">User Disabled !</span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>