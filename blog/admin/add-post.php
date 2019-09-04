//include config.php
require_once('../includes/config.php');

//if not logged in, redirect to login page
if(!$user -> is_logged_in()) {
  header('Location: login.php');
}

<form action = '' method = 'post'>

  <p><label>Title</label><br />
  <input type ='text' name = 'postTitle' value = '<?php if(isset($error)){echo $_POST['postTitle'];}?>'></p>

  <p><label>Description</label><br />
  <textarea name='postDesc' cols ='60' rows ='10'><?php if(isset($error)){echo $_POST['postDesc'];}?></textarea></p>

  <p><label>Content</label><br />
  <textarea name = 'postCont' cols='60' rows ='10'><?php if(isset($error)){echo $_POST['postCont'];}?></textarea></p>

  <p><input type='submit' name = submit' value ='Submit'></p>

  </form>

  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
</script>

// if form has been submitted then process it
if(isset($_POST['submit'])) {

  $_POST = array_map('stripslashes', $_POST);

  //collect form data

  extract($_POST);

  //basic validation for post description ,content and title.

  if($postTitle == '') {
    $error[] = 'Please enter the post Title.';
  }

  if($postDesc == '') {
    $error[] = 'Please enter the post description.';
  }

  if($postCont == '') {
    $error[] = 'Please enter post content.';
  }
}

 // this will only run if no error occurs

  if(!isset($error)) {
     try {

       //insert into database

       $stmt = $db -> prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate) VALUES (:postTitle,:postDesc,:postCont,:postDate)');
       $stmt -> execute(array(
         ':postTitle' => $postTitle,
         ':postDesc'  => $postDesc,
         ':postCont'  => $postCont,
         ':postDate'  => date('Y-m-d H:i;s')
       ));

      //redirect to index page from here
      header('Location: index.php?action=added');
      exit;

     }  catch(PDOException $e) {
        echo $e ->getMessage();
     }

  }

//if any errors occured then loop through and display

if(isset($error)) {
  foreach($error as $error) {
    echo '<p class = "error">'.$error.'</p>';
  }
}
