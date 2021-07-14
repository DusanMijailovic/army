<?php 
$socials = getAllFromTable('socialnetwork', $conn); 
?>

<footer class="py-4 bg-white border-top  <?= ($page === 'login') ? 'fixed-bottom' : '' ?>">
	<div class="container">
		<div class="d-flex justify-content-end mb-3">
			<div class="d-flex mr-auto mb-3">
				<ul  class="nav">
					<?php foreach($links as $link) : ?>
						<li class="nav-item nav-size">
							<a class="nav-link text-dark" href="index.php?page=<?= strtolower($link->name)?>"><?= $link->name ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<?php foreach ($socials as $social) : ?>
				<div class="mx-2 p-2 bd-highlight">
					<a href="<?= $social->href ?>" class="hover-icon"><i class="<?= $social->icon ?> fa-sm"></i> </a>
				</div>
			<?php endforeach; ?>		  
		</div>
		<p class="m-0 text-center text-black font-weight-light">Copyright &copy; Army blog</p>
	</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<a id="return-to-top" href="#"><i class="fas fa-angle-up"></i></a>

<?php

switch ($page) {
	case 'kontakt':
	echo "<script src = 'assets/js/contact.js'></script>";
	break;
	case 'login':
	echo "<script src = 'assets/js/login.js'></script>";
	break;
	case 'register':
	echo "<script src = 'assets/js/register.js'></script>";
	break;
	case 'post':
	echo "<script src = 'assets/js/post.js'></script>";
	break;
	case 'o autoru':
	break;
	default:
	echo "<script src = 'assets/js/main.js'></script>";
	break;
}
?>

</body>
</html>