<?php 
	error_reporting(E_ALL ^ E_DEPRECATED);
	ini_set('display_errors', 1);
	require_once '../Core/Upload.php';
	use Core\Upload;

?>


<?php 
	$max = 1000000;
	$result = [];
	if( isset($_POST['upload']) ) {
		
		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		echo "<br/>" . __DIR__;
		echo "<br/>" . $_SERVER['PHP_SELF'];
		
		
		$destination = __DIR__ . "/uploads";
		try {
			$upload = new Upload($destination);
			$upload->set_max_size( $max );
			$upload->upload();
			$result = $upload->get_messages();
		} catch ( Exception $e ) {
			$result[] = $e->getMessage();
		}

	}
	
// 	echo "<br/>" . ini_get('upload_max_filesize');
// 	echo "<br/>". Upload::convert_to_bytes('1M');
// 	echo "<br/>". Upload::convert_from_bytes(900000);
?>


<!DOCTYPE html>
<html>
	<head>
	<title>Upload</title>
	</head>
</head>
	<body>
		<h1>Uploading files</h1>
	
		<ul class="result">
		<?php 
			if($result) {
				foreach ($result as $message) {
					echo "<li>$message</li>";
				}
			}
		?>
		</ul>
	
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
			<p>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max; ?>">
				<label for="filename">Select File:</label>
				<input type="file" name="filename" id="filename">
			</p>
			<p>
				<input type="submit" name="upload" value="Upload File">
			</p>
		</form>
	
	</body>
</html>