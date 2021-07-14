<?php 
  $comments = getAllFromTable('comment', $conn);
?> 
<i class="fas fa-table"></i> Visits Statistic Table</div>
<div class="container">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <th>Naslovna</th>
          <th>O autoru</th>
          <th>Kontakt</th>
          <th>Login</th>
          <th>Register</th>
        </thead>
        <tbody class="visits">
        <tr>
          <?php foreach(pageTraffic() as $visit) : ?>
           
             <td><?= $visit ?>%</td>
              
              
            
          <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>    
</div>