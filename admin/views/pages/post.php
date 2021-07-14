  <?php 
  $posts = getAllFromTable('post', $conn);
  ?> 
  <i class="fas fa-table"></i>
Post Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Title</th>
          <th>Body</th>
          <th>Source</th>
          <th>Alt</th>
          <th>Time</th>
          <th>Action</th>
        </thead>
        <tbody class="post">
          <?php foreach($posts as $post) : ?>
            <tr>
              <td><?= $post->postID ?></td>
              <td><?= $post->title ?></td>
              <td><?= $post->body ?></td>
              <td><?= $post->imageSrc ?></td>
              <td><?= $post->imageAlt ?></td>
              <td><?= $post->time ?></td>
              <td>
                <button class="btn btn-primary edit-btn mb-2"  data-id="<?= $post->postID?>">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="<?= $post->postID?>">Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>    
</div>

<form class="needs-validation">
  <div class="form-row ml-5">
    <div class="col-md-4 mb-3">
      <label>Post</label>
      <input type="hidden" id="hdnID">
      <input type="text" class="form-control mb-4" id="title">
      <input type="text" class="form-control mb-4" id="body">
      <input type="text" class="form-control mb-4" id="src">
      <input type="text" class="form-control mb-4" id="alt">
      <input type="text" class="form-control mb-4" id="time">
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-5 mb-5" id="insert-update-btn">Insert</button>
</form>