<?php 
$menus = getAllFromTable('menu', $conn);
?> 
<i class="fas fa-table"></i>
Menu Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Action</th>
        </thead>
        <tbody class="menu">
          <?php foreach($menus as $menu) : ?>
            <tr>
              <td><?= $menu->menuID ?></td>
              <td><?= $menu->name ?></td>
              <td> 
                <button class="btn btn-primary edit-btn" data-id="<?= $menu->menuID ?>">Edit</button>
                <button class="btn btn-danger delete-btn" data-id="<?= $menu->menuID ?>">Delete</button>
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
      <label>Menu</label>
      <input type="hidden" id="hdnID">
      <input type="text" class="form-control" id="name">
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-5 mb-5" id="insert-update-btn">Insert</button>
</form>