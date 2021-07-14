<?php 
  $suggestions = getAllFromTable('suggestion', $conn);
?> 
<i class="fas fa-table"></i>
Suggestion Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Answer</th>
          <th>Action</th>
        </thead>
        <tbody class="suggestions">
          <?php foreach($suggestions as $suggestion) : ?>
            <tr>
              <td><?= $suggestion->suggestionID ?></td>
              <td><?= $suggestion->suggestion ?></td>
              <td>
                
                <button class="btn btn-primary edit-btn" data-id="<?= $suggestion->suggestionID?>">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="<?= $suggestion->suggestionID?>">Delete</button>
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
  <div class="form-row ml-5 form-group">
    <div class="col-md-4 mb-3">
      <label>Suggestion</label>
      <input type="hidden" id="hdnID">
      <input type="text" class="form-control" id="suggestion">
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-5 mb-5" id="insert-update-btn">Insert</button>
</form>