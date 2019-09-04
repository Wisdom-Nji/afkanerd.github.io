<table>
<tr>
  <th>Title</th>
  <th>Date</th>
  <th>Action</th>
</tr>

<?php
  try {
    $stmt = $db -> query('SELECT post ID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
    while($row = $stmt -> fetch()) {

      echo '<tr>';
      echo '<td>'.$row['postTitle'].'</td>';
      echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
      ?>

      <td>
        <a href ="edit-post.php?id=<?php echo $row['postID'];?>">Edit</a> |
        <a href ="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
      </td>

      <?php
      echo '</tr>';

    }

  } catch (PDOException $e) {
      echo $e -> getMessage();
  }

?>
</table>

<script language ="javascript" type="text/javascript">
function delpost(id, title) {
  if (confirm("Are you sure you want to delete '" + title + "'")) {
    window.location.href = 'index.php?delpost=' + id;
  }
}
</script>

if(isset($_GET['delpost'])) {
  $stmt = $db -> prepare('DELETE FROM blog_posts WHERE postID = :postID');
  $stmt -> execute(array('postID => $_GET['delpost']));

  header('Location: index.php?action=deleted');
  exit;
}

if(isset($_GET['action'])) {
    echo '<h3>Post '.$_GET['action'].'.</h3>';
}

<?php include('menu.php');?>
