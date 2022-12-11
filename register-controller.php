<?php
	include 'includes/session.php';

	if(isset($_POST['register'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;

		
		
		

		if(!isset($_POST['g-recaptcha-response'])){
			$secretKey = "6LfOk1QjAAAAAJAcyN-UxUfOHg06R7EHxmB3dCgD";
			$ip = $_SERVER['REMOTE_ADDR'];
			// post request to server
			$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($_POST['g-recaptcha-response']);
			$response = file_get_contents($url);
			$responseKeys = json_decode($response,true);

			if (!$responseKeys['success']){
		  		$_SESSION['error'] = 'Please answer recaptcha correctly';
		  		header('location: register.php');	
		  		exit();	
		  	}	
		  	else{
		  		$_SESSION['captcha'] = time() + (10*60);
		  	}

		}

		if(!isset($email) || strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION['error'] = 'Invalid email entered.';
			header('location: register.php');
			return;
		} 
		
		if (!checkdnsrr(substr($email, strpos($email, '@') + 1), 'MX')) {
			$_SESSION['error'] = 'Email does not exist. (This domain does not have a mail server)';
			header('location: register.php');
			return;
		}

		if(!isset($password) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\~?!@#\$%\^&\*])(?=.{8,})/', $password)) {
			$_SESSION['error'] = 'Password must contain: <ul><li>At least 8 characters</li><li>At least one lower case letter</li><li>At least one upper case letter</li><li>At least one number</li><li>At least one special character (~?!@#$%^&*)</li></ul>';
			header('location: register.php');
			return;
		}

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: register.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: register.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);

				try{
					$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'code'=>$code, 'now'=>$now]);
					$userid = $conn->lastInsertId();

					$message = "
						<h2>Hello ".$firstname." ".$lastname.". Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: ".$email."</p>
						<p>Hashed Password: ".$password."</p>
						<p>Please click the link below to activate your account.</p>
						<a href='http://localhost/ecommerce/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					";

					//Load phpmailer
		    		include "mail.php";

						send_mail($email, "Account Creation Successful" ,$message);
						header('location: login.php');
						$_SESSION['message'] = "Account Created.";

				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					echo $e->getMessage();
					header('location: register.php');
				}

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: register.php');
	}

?>