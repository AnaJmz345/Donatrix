<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    //header('Location: index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password, type FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['email'] = $results['email'];
      if ($results['type'] == "donor") {
        header("Location: registrationSample.php");
      } else if ($results['type'] == "recipient") {
        header("Location: receiverOptions.php");
      }
      //
    } else {
      $message = 'Sorry, the password is incorrect';
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Login</title>
	<style type="text/css">
		html, body {
			background: url('login.jpg') no-repeat; height: 100vh; background-size: cover; background-position: center;"
			margin: 20px;
		}
		input {
			outline: none;
			padding: 20px;
			display: block;
			width: 300px;
			height: 10px;
			border-radius: 3px;
			border: 1px solid #eee;
			margin: 20px auto;
		}
		button {
			width: 300px;
		}
		.btn {
      		background-color: #062A54 !important;
      		color: white !important;
    	}
	</style>
</head>
<body>
	<?php if (!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
	<center>
	<h2>Log in</h2>

	<form action="login.php" method="post">
	
		<input type="text" name="email" placeholder="Email">
		<br>
		<input type="password" name="password" placeholder="Password">
		<br>
		<button type="submit" class="btn btn-success">Ok</button>
	</form>
	<br>
	<h6>Don't have an account? <a href="signup.php">Sign up</a></h6>
</center>

</body>
</html>
