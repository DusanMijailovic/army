<?php 
	$links = getAllFromTable('menu', $conn);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-white border-bottom fixed-top py-4">
  <div class="container">
   <a class="navbar-brand" href="index.php?page=naslovna"><img src="assets/img/army_logo.png" alt="Paradise logo" class="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ml-auto">
       <?php foreach($links as $link) : ?>
       		<li class="nav-item">
          		<a class="nav-link text-dark " href="index.php?page=<?= strtolower($link->name)?>"><?= $link->name ?></a>
        	</li>
       <?php endforeach; ?>
    <?php if (!userLoggedIn()) : ?>
          <a href="index.php?page=login" class="btn btn-dark-green mr-2 text-white font-weight-light">Prijava</a>
          <a href="index.php?page=register" class="btn btn-dark-green text-white font-weight-light">Registracija</a>
        <?php else : ?>
          <a href="modules/logout.php" class="btn btn-dark-green text-white font-weight-light">Odjava</a>
    <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
