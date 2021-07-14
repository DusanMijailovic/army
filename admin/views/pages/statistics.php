<?php 
  $statistics = getAllFromTable('statistics', $conn);
?> 
<i class="fas fa-table"></i>
Statistic Table </div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>suggestionID</th>
          <th>questionID</th>
          <th>userID</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php foreach($statistics as $statistic) : ?>
            <tr>
              <td><?= $statistic->statisticsID ?></td>
              <td><?= $statistic->suggestionID?></td>
              <td><?= $statistic->questionsID?></td>
              <td><?= $statistic->userID?></td>
              <td>
                <button type="button" class="btn btn-danger delete-btn" data-id="<?= $statistic->statisticsID?>">Delete</button>
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
