<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang ="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/main.css">
  </head>
  <body>

 <div id = "wrapper">
  <h1>Blog</h1>
  <hr />

 <?php
  try {
    $stmt = $db -> query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
    while($row = $stmt->fetch()){

      echo '<div>';
          echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
          echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
          echo '<p>'.$row['postDesc'].'</p>';
          echo '<p><a href = "viewpost.php?id='.$row['postID'].'">Read More</a></p>';
          echo '</div>';

    }
  } catch (PD0Exception $e) {
    echo $e -> getMessage();
  }

  ?>

  <script src="" async defer></script>
  </body>
</html>
