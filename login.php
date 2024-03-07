<html>

<head>
    <title>MyMovieBooking</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
</head>

<body>
        <?php
			include 'header.php';
		?>
    <div class="body-content">
        <form id="login-form" action="#" method="POST">
            <h4 class="form-head">Existing user?</a></h4>
            <input type="text" class="login-input" id="email-login" name="email" placeholder="E-mail" required />
            <input type="password" class="login-input" id="password-login" name="pass" placeholder="password"
                required />
            <button type="submit" name="login" class="login-input" id="submit-btn">Login</button>
            <h4>New user? <a href="register.php"> click here</a> to register</h4>
        </form>
        <?php
				if(isset($_POST['login'])){
					include 'includes/config.php';
					
					$email = $_POST['email'];
					$pass = $_POST['pass'];
					
					$query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
					$rs = $conn->query($query);
					$num = $rs->num_rows;
					$rows = $rs->fetch_assoc();
					if($num > 0){
                        session_start();
                        $_SESSION['userID'] = $rows['user_id'];
						$_SESSION['email'] = $rows['email'];
						$_SESSION['pass'] = $rows['pass'];
                        echo "<script type = \"text/javascript\">
									window.location = (\"index.php\")
									</script>";
					} else{
						echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"login.php\")
									</script>";
					}
                }
                if(isset($_REQUEST['logstate'])){
                    session_destroy();
                    header("Location: login.php");
                }
			?>
    </div>
</body>

</html>