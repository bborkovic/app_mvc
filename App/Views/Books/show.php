<?php require_once('layouts/header.php'); ?>

<!-- Content -->
<div class="col-md-8">

	<div class="row">
		<div class="col-md-4">
			<div id="books-show">
				<img class="img-responsive" src="/uploads/books/<?php echo $book->book_photo; ?>">
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div id="books-show">
				<ul>
					<h4>2017</h4>
					<h3><strong><?php echo $book->name; ?></strong></h3>
					<h4><?php echo $book->short_info; ?></h4>
				</ul>

			</div>
		</div>		
	</div>	

</div>

<!-- right sidebar -->
<div class="col-md-1"></div>

<div class="col-md-3">
	<?php require_once('layouts/sidebar.php'); ?>
</div>



<?php require_once('layouts/footer.php'); ?>