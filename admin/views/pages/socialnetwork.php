<?php 
  $socials = getAllFromTable('socialnetwork', $conn);
?> 
<i class="fas fa-table"></i> Social Network Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Href</th>
          <th>Icon</th>
          <th>Action</th>
        </thead>
        <tbody class="socials">
          <?php foreach($socials as $social) : ?>
            <tr>
              <td><?= $social->socialNetworkID ?></td>
              <td><?= $social->href ?></td>
              <td><?= $social->icon ?></td>
              <td>
                <button class="btn btn-primary edit-btn" data-id="<?= $social->socialNetworkID ?>">Edit</button>
                <button class="btn btn-danger delete-btn"  data-id="<?= $social->socialNetworkID ?>">Delete</button>
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
    <div class="col-md-4 my-4">
      <label>Social Network</label>
      <input type="hidden" id="hdnID">
      <input type="text" class="form-control mb-4" id="href">
      <input type="text" class="form-control" id="icon">
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-5 mb-5" id="insert-update-btn">Insert</button>
</form>