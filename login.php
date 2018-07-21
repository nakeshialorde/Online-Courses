<?php

    // Start the session
    // session_start();

    // Defines email and password. Retrieve however you like,
     //$email = "email";
     //$password = "password";

    // Error message
    // $error = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    // if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
     //    $error = "success";
     //    header('Location: success.php');
    // } 
        
    // Checks to see if the email and password have been entered.
    // If so and are equal to the email and password defined above, log them in.
     //if (isset($_POST['email']) && isset($_POST['password'])) {
       //  if ($_POST['email'] == $email && $_POST['password'] == $password) {
       //      $_SESSION['loggedIn'] = true;
        //     header('Location: success.php');
        // } else {
        //     $_SESSION['loggedIn'] = false;
            //$error = "Invalid username and password!";
        // }
   //  }


// include function files for this application
require_once('bookmark_fns.php');
session_start();

//create short variable names
$username = $_POST['username'];
$password = $_POST['password'];

if ($username && $password) {
// they have just tried logging in
  try  {
    login($username, $password);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    // unsuccessful login
    do_html_header('Problem:');
    echo 'You could not be logged in.
          You must be logged in to view this page.';
    do_html_url('login.php', 'Login');
    do_html_footer();
    exit;
  }
}

do_html_header('Home');
check_valid_user();
// get the bookmarks this user has saved
if ($url_array = get_user_urls($_SESSION['valid_user'])) {
  display_user_urls($url_array);
}

// give menu of options
display_user_menu();

do_html_footer();
?>

<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysql_real_escape_string($email);
    $password = mysql_real_escape_string($password);

    mysql_connect("localhost", "root", "");
    mysql_select_db("tutors246_login");

    $result = mysql_query("SELECT * FROM `login` WHERE `email` = '$email' and `password` = '$password'")
    or die("Failed to query database".mysql_error());

    $row = mysql_fetch_array($result);
    if ($row['email'] == $email && $row['password'] == $password)
    {
        echo "Login Success! Welcome ".$row['email'];
    }
    else
    {
        echo "Failed to login!";
    }
    ?>

    <?php include('functions.php') ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body,
        html {
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        * {
            box-sizing: border-box;
        }
        
        .bg-img {
            /* The image used */
            background-image: url("https://static1.squarespace.com/static/52d6cb6be4b0b5fc69b8d205/t/5307d431e4b06c565def6aa7/1393022004734/education-background-checks.jpg?format=1500w");
            text-rendering: all;
            min-height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        /* Add styles to the form container */
        
        .container {
            position: center relative;
            right: 0;
            margin: 20px;
            max-width: 600px;
            padding: 16px;
            background-color: white;
            margin-right: auto;
            margin-left: auto;
        }
        /* Full-width input fields */
        
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }
        
        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
        /* Set a style for the submit button */
        
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        
        .btn:hover {
            opacity: 1;
        }
        
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }
        
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }
    </style>

</head>

<body>

    <div class="bg-img"><br />

        <div align="center">
            <img src="img/logo.png.png" align="center" height="auto" width="auto" />
        </div>

        <br />
        <h4>
            <large>
                <center>Welcome To Our Online Learning Community!</center>
            </large>
        </h4>

        <form action="login.html" method="POST" id="login">
            <div class="container" id="loggedin">
                <h1>
                    <center>Login</center>
                </h1>

                <label for="email" align="left"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required autocomplete="on">

                <label for="psw" align="left"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required autocomplete="on">
					 <input type="checkbox" id="showpassword">
					 
					 <label for "showpassword"> Show password</label><br />
                <button type="submit" class="btn">Login</button>
            </div>
        </form>

        <p>
            <center>Need an account!<a href="index.php"> Register </a></center>
        </p>

    </div>
</body>

<script type="text/javascript">
(function () {
	var form = document.getElementById('login');
	
	addEvent(form, 'submit', function (e) {
	e.preventDefault();
	
	var elements = this.elements;
	var email = elements.email.value;
	var msg = 'Welcome' + 'email';
	document.getElementById('loggedin').textContent = msg;
	
	});
	
}());
</script>

<script>
(function () {
var pwd = document.getElementById('password');
var chk = document.getElementById('showpassword');

addEvent(chk, 'change', function (e) {
var target = e.target || e.srcElement;
try{
if (target.checked) {
pwd.type = 'text';
} else {
pwd.type = 'password';
}
} catch (error) {
alert('This browser cannot switch type');
	}
});
	
}());
</script>

</html>