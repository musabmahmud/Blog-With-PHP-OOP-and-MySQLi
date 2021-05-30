<?php require_once "../lib/Session.php";
session::init();
?>
<?php
include "../config/config.php";
include "../lib/database.php";
include "../helpers/format.php";

$db = new Database();
$format = new Format();
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<form action="login.php" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required="" name="username" />
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="password" />
				</div>
				<div>
					<input type="submit" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button" id="login_msg">
				<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$username = $format->validate($_POST['username']);
					$password = $format->validate(md5($_POST['password']));

					$username = mysqli_real_escape_string($db->link, $username);
					$password = mysqli_real_escape_string($db->link, $password);

					$query = "SELECT * FROM blog_user WHERE username = '$username' OR email = '$username' AND password = '$password'";
					$result = $db->select($query);
					if ($result != false) {
						$value = mysqli_fetch_array($result);
						$rows = mysqli_num_rows($result);
						if ($rows > 0) {
							Session::set("login", true);
							Session::set("username", $value['username']);
							Session::set("userid", $value['id']);
							header("Location: index.php");
						} else {
							$_SESSION['login'] =  "Havenot Any Account? Try to Registration";
						}
					} else {
						$_SESSION['login'] = "Email or Password Doesnot Match!";
					}
				}
				?>
					<span>
					<?php if(isset($_SESSION['login'])){
						  echo $_SESSION['login'];
						  unset($_SESSION['login']);
						}
					?>
					</span>
					</div>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>