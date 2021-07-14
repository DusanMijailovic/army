  <?php 
  $roles = getAllFromTable('role', $conn);
  ?>

  <i class="fas fa-table"></i>
Role Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Role</th>
          <th>Action</th>
        </thead>
        <tbody class="roles">
          <?php foreach($roles as $role) : ?>
            <tr>
              <td><?= $role->roleID ?></td>
              <td><?= $role->role ?></td>
              <td>
                 <button class="btn btn-primary edit-btn" data-id="<?= $role->roleID ?>">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="<?= $role->roleID ?>">Delete</button>
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
      <label>Role</label>
      <input type="hidden" id="hdnID">
      <input type="text" class="form-control" id="role">
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-5 mb-5" id="insert-update-btn">Insert</button>
</form>