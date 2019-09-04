//include config.php
require_once('../includes/config.php');

//if not logged in, redirect to login page
if(!$user -> is_logged_in()) {
  header('Location: login.php');
}

<h1>Blog</h1>
<p>Logged in as <?=$_SESSION['username'];?></p>
<ul id = 'adminmenu'>
    <li><a href = 'index.php'>Blog</a></li>
    <li><a href = 'users.php'>Users</a></li>
    <li><a href = "../" target = "_blank">View Website</a></li>
</ul>
<div class = 'clear'></div>
<hr />
