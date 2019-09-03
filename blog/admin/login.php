//include config.php
require_once('../includes/config.php');

//if not logged in, redirect to login page
if(!$user -> is_logged_in()) {
  header('Location: login.php');
}

<form action=""method="post">
<p><label>Username</label><input type="text" name="username" value=""  /></p>
<p><label>Password</label><input type="password" name="password" value=""  /></p>
<p><label></label><input type="submit" name="submit" value="Login"  /></p>
</form>

//process login form is submitted

if(isset($_POST['submit'])){

  $username = trim($_POST['username']);
  $password = trimf($_POST['password']);

  if($user->login($username,$password)) {

    //logged in return to index password_get_info
    header('location: index.php');
    exit;

  } else {
    $message = '<p class ="error">Wrong Username or Password </p>' ;
  }

// end if submit }

if(isset($message)) {
  echo $message;
}
