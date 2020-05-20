<?php
require_once("MiddleWare/loginMiddleware.php");
$check=new loginMiddleware();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/pf.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" name="signup" method="post" id="signupform">
					<span class="login100-form-title">
						Member SignUp
					</span>
		<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="name" id="name" placeholder="Name" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>		
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" id="email" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
<span id="email_error"></span>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" id="password" placeholder="Password" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="signup" id="signup">SignUp</button>
							
						
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
		<script src="assets/tilt/tilt.jquery.min.js"></script>
		<script>
	$("#signup").prop("disabled", true);

			document.getElementById("signupform").addEventListener('submit',function(e){
				e.preventDefault();
				name=document.getElementById("name").value;
				email=document.getElementById("email").value;
				password=document.getElementById("password").value;


             $.ajax({
					url:"/Email System/Ajax Requests/signup.php",
					method:"POST",
					dataType:"json",
					data:{email:email,password:password,name:name},
					success:function(response)
					{
						console.log(response);
						if(response==true)
						{
   Swal.fire({
  icon: 'success',
  title: 'SignUp SuccessFully',
  text: 'Something went wrong!',
  
}).then((result)=>{
        window.location.href="login.php";
        
       });
						}
						else
						{
   Swal.fire({
  icon: 'error',
  title: 'Please Try Again',
  text: 'Something went wrong!',
  
}).then((result)=>{
        window.location.href="signup.php";
        
       });


						}
					}
				})
			})
			document.getElementById("email").addEventListener('blur',function(){
				email=document.getElementById('email').value;
				$.ajax({
					url:"/Email System/Ajax Requests/emailValidation.php",
					method:"POST",
					dataType:"json",
					data:{email:email},
					success:function(response)
					{
						console.log(response);
						if(response==true)
						{
document.getElementById("email_error").innerHTML="<p>This Email is Already Exits</p>";

						}
						else
						{
$("#signup").prop('disabled',false);
$("#email_error").empty();

						}
					}
				})
			})
		</script>
</body>
</html>