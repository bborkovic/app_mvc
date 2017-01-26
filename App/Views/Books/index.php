<?php require_once('layouts/header.php'); ?>


<div class="panel-body">

	<?php echo output_message(); ?>

	<div class="row">

	<!-- Side navigation -->
		<div class="col-sm-2">
			<p><a href=""></a></p>
			<p><a href="/books/index">Books</a></p>
		</div>

		<div class="col-sm-10">

			<div class="row">
				<?php foreach ($books as $book): ?>
					<div class="col-xs-4">
						<img class="img-responsive" src="/uploads/books/<?php echo $book->book_photo; ?>">
					</div>
				<?php endforeach; ?>

			</div>


			
		</div>
	</div>
</div>




<?php require_once('layouts/footer.php'); ?>