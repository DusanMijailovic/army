 <?php 
 require_once "views/pages/slider.php";
 require_once "modules/post.php";
 ?>

 <?php foreach ($posts as $post) : ?>
 	<div class="card shadow bg-white rounded my-5">
 		<img class="card-img-top" src="<?= $post->imageSrc ?>" alt="<?= $post->imageAlt ?>" />
 		<div class="card-body">
 			<h2 class="card-title"><?= $post->title ?></h2>
 			<p class="card-text"><?= substr($post->body, 0, 400)?>...</p>
 			<a href="index.php?page=post&id=<?= $post->postID ?>" class="btn btn-dark-green text-white button  font-weight-light">Pročitaj više</a>
 		</div>
 	</div>
 <?php endforeach; ?>
 <?php require_once "views/pages/pagination.php"; ?>
</div>
<?php require_once "views/pages/sidebar.php"; ?>
</div>