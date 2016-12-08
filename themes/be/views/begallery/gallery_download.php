<?php 
		$zip = new ZipArchive;
    	$download = RESOURCES_FOLDER.'/download.zip';
    	$zip->open($download, ZipArchive::CREATE);
    	foreach (glob("images/*.png") as $file) { /* Add appropriate path to read content of zip */
        	$zip->addFile($file);
    	}
    	
		$zip->close();
    	
		header('Content-Type: application/zip');
    	header("Content-Disposition: attachment; filename = ".RESOURCE_URL."/download.zip");
    	header('Content-Length: ' . filesize( RESOURCE_URL."/download.zip" ));
    	header("Location: ".RESOURCE_URL."/download.zip");
?>