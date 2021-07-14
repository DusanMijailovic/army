<ul class="pagination pagination-lg justify-content-end mb-4 mt-2">
  <?php for($i = 0; $i < $num; $i++): ?>
    <li <?php if(!isset($_SESSION['link']) && $i == 0) 
    echo 'class="page-item active border"';  
    else if(isset($_SESSION['link']) && $_SESSION['link'] == $i)
     echo 'class="page-item active border"'; 
   else echo 'class="page-item"'; ?>>
   <a class="page-link link" data-id="<?= $i ?>" href="#"><?= $i+1 ?></a>
 </li>
<?php endfor; ?>
<?php unset($_SESSION['link']); ?>
</ul>

