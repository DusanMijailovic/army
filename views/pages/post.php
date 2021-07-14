 <?php

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM post WHERE postID = ?;"; 
  try {
    $result = executeOneRow($sql, [$id]); 
    $date = $result->time;
    $date = explode(' ', $date);
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
}
?>

<div class="container from-top">
  <h1 class="mt-4"><?= $result->title ?></h1>
  <p class="lead mt-4"> by <span class="color-text">Army Blog</span></p>
  <hr>
  <p>Posted on <?= $date[0] ?></p>
  <hr>
  <div class="card shadow bg-white rounded mb-5">
   <img class="card-img-top mb-4" src="<?= $result->imageSrc ?>" alt="<?= $result->imageAlt ?>" />
   <div class="card-body">
    <p class="card-text mb-4"><?= $result->body ?></p>
    <p class="card-text mb-4" ><?= $result->part_one ?></p>
    <p class="card-text mb-4"><?= $result->part_two ?></p>
    <p class="card-text mb-4"><?= $result->part_three ?></p>

    <?php include 'views/pages/comment.php'; ?>
  </div>
</div>
</div>
</div>
</div>





