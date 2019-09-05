

<?php include "layout/header.php";?>
<link rel="stylesheet" type="text/css" href="../asset/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../asset/login/vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="../asset/login/css/util.css">
<link rel="stylesheet" type="text/css" href="../asset/login/css/main.css">

<style>
    input[type="text"], input[type="password"], input[type="email"], textarea{
        padding: 0 30px 0 68px;
    }
</style>

<div class="limiter">
    <div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../asset/login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="button">
							Login
						</button>
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
						<a class="txt2" href="  register">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>

    </div>
</div>


<?php include "layout/footer.php";?>
<script src="../asset/login/vendor/tilt/tilt.jquery.min.js"></script>

<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
