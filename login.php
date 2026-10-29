<?php include "config.php";
 if(isset($_POST["username"]))
 
 {
	 $_SESSION["user"]=$_POST["username"];
	 $_SESSION["role"]=$_POST["role"];
 
 
 header("Location: dashboard.php");
 exit;
 
 }
 ?>
 
 <html>
	<body>
	
		<h2>Login</h2>
	
			<form method="post">
	
				<input name="username" placeholder="User">
				<input type="password" name="password" placeholder="Password">
				<button>Login</button>
	
			</form>
	
	</body>
	
</html>