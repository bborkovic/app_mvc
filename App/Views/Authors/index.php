<?php require_once('layouts/header.php'); ?>


<div class="panel-body">

	<?php echo output_message(); ?>

	<div class="row">

	<!-- Side navigation -->
		<div class="col-sm-2">
			<p><a href=""></a></p>
			<p><a href="/books/index">Books</a></p>
		</div>

		<div class="col-sm-5">
			<h4>List of all authors</h4>

			<?php foreach ($authors as $author): ?>
				<li><?php echo $author->last_name . " " . $author->first_name; ?></li>
			<?php endforeach ?>
			</li>
		</div>
	</div>
</div>




<?php require_once('layouts/footer.php'); ?>