<?php 
  $comments = getAllFromTable('comment', $conn);
?> 
<i class="fas fa-table"></i> Comment Table</div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Comment</th>
          <th>Created at</th>
          <th>Action</th>
        </thead>
        <tbody class="comments">

          <?php foreach($comments as $comment) : ?>
            <tr>
              <td><?= $comment->commentID ?></td>
              <td><?= $comment->comment ?></td>
              <td><?= $comment->created_at ?></td>
              <td>
                <button class="btn btn-danger delete-btn" data-id="<?= $comment->commentID ?>">Delete</button>
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