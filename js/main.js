$(function(){

	// user registration 
	$("#regisub").click(function(){
		var name 	 = $("#name").val();
		var username = $("#username").val();
		var email 	 = $("#email").val();
		var password = $("#password").val();

		var dataString = 'name='+name+'&username='+username+'&email='+email+'&password='+password;
		$.ajax({
			type:"POST",
			url:"action/getregister.php",
			data:dataString,
			success: function(data){
				$("#mesg").html(data);
			}

		});
		return false;

	});

	// user login
	$("#login").click(function(){
		var email 	 = $("#email").val();
		var password = $("#password").val();
		var loginData = 'email='+email+'&password='+password;
		$.ajax({
			type:"POST",
			url: "action/getlogin.php",
			data: loginData,
			success: function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
					$(".error").hide();
					$(".disable").hide();

					setTimeout(function(){
						$(".empty").fadeOut();
					}, 2000);

				}else if ($.trim(data) == "disable") {
					$(".disable").show();
					$(".empty").hide();
					$(".error").hide();

					setTimeout(function(){
						$(".disable").fadeOut();
					}, 2000);

				}else if ($.trim(data) == "error") {
					$(".error").show();
					$(".disable").hide();
					$(".empty").hide();
					setTimeout(function(){
						$(".error").fadeOut();
					}, 2000);
					
				}else{
					window.location = "exam.php";
				}
			}

		});
		return false;
	});
});