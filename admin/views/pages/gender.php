<?php 
  $genders = getAllFromTable('gender', $conn);
?> 
<i class="fas fa-table"></i>
Gender Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Gender</th>
          <th>Action</th>
        </thead>
        <tbody class="genders">
          <?php foreach($genders as $gender) : ?>
            <tr>
              <td><?= $gender->genderID ?></td>
              <td><?= $gender->gender ?></td>
              <td>
                <button class="btn btn-primary edit-btn" data-id="<?= $gender->genderID ?>">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="<?= $gender->genderID ?>">Delete</button>
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
      <label>Gender</label>
      <input type="hidden" id="hdnID">
      <input type="text" class="form-control" id="gender">
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-5 mb-5" id="update-btn">Update</button>
</form>