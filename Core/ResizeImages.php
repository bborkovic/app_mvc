<?php

namespace Core;


class ResizeImages {
	protected $images = [];
	protected $source;
	protected $mimeTypes = [ 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
	protected $webpSupported = true;
	protected $useImagesScale = true;
	
	public function __construct( array $images , $sourceDirectory = null ) {
		if( !is_null($sourceDirectory) && !is_dir($sourceDirectory)) {
			throw new \Exception("$sourceDirectory is not a valid directory.");
		}
	
		$this->images = $images;
		$this->source = $sourceDirectory;

		if ( PHP_VERSION_ID < 50500) {
			array_pop($this->mimeTypes); // take the last element of array
			$this->webpSupported = false;
		}
		if ( PHP_VERSION_ID < 50519 
				or (PHP_VERSION_ID >= 50600 and PHP_VERSION_ID < 50603) 
			) {
			$this->useImagesScale = false;
		}
		$this->checkImages();
	}
	
	protected function checkImages() {
		
	}
	
}


?>