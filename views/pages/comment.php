<?php
if (isset($_GET['id'])) {
  $postID = $_GET['id'];
  $sql = 'SELECT c.comment, u.fullName FROM (comment c INNER JOIN post p ON c.postID = p.postID) INNER JOIN user u ON c.userID = u.userID WHERE p.postID = ?';
  try {
    $comments = executeAll($sql, $postID);
  }catch(PDOException $e) {
    echo $e->getMessage();
  }
}
?>
<hr>
<?php if(userLoggedIn()) : ?>
  <div class="card my-5">
    <h5 class="card-header text-white lead">Postavite komentar:</h5>
    <div class="card-body">
      <form>
        <div class="form-group">
          <textarea id="comment" class="form-control" rows="3"></textarea>
          <span class="comment-hint text-danger"></span>
          <input id="fullName" type="hidden" value="<?= $_SESSION['user']->fullName ?>" />
          <input id="userID" type="hidden" value="<?= $_SESSION['user']->userID ?>" />
        </div>
        <button id="addComment" class="btn btn-dark-green text-white  font-weight-light">Potvrdi</button>
      </form>
    </div>
  </div>
  <?php else: ?>
    <h1 class=" font-weight-light mb-5 mt-4">Da bi ste mogli da komentarišete, morate biti prijavljeni!</h1>
  <?php endif; ?>
  <div id="comment-collection" class="box">
    <?php if (count($comments)) :  ?>
      <?php foreach($comments as $comment) : ?>  
        <div class="media mb-4">
          <div class="media-body">
            <h5 class="mt-0"><?= $comment->fullName ?></h5>
            <p><?= $comment->comment ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <h3 class="font-weight-normal no-comment mb-4">Još uvek nema komentara!</h3>
    <?php endif;?>
  </div>
