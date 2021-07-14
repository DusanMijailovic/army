<?php 
  $questions = getAllFromTable('question', $conn);
?> 
<i class="fas fa-table"></i>
Question Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Question</th>
          <th>Action</th>
        </thead>
        <tbody class="questions">
          <?php foreach($questions as $question) : ?>
            <tr>
              <td><?= $question->questionID ?></td>
              <td><?= $question->question ?></td>
              <td>
                <button class="btn btn-primary edit-btn" data-id="<?= $question->questionID ?>">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="<?= $question->questionID ?>">Delete</button>
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
      <label>Question</label>
      <input type="hidden" id="hdnID">
      <input type="text" class="form-control" id="question">
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-5 mb-5" id="update-btn">Update</button>
</form>