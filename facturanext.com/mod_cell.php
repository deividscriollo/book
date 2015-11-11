<?php 
	include_once('../admin/class.php');		

	if($_GET['fn'] == '1'){
		modificar_celda();
	}
	if($_GET['fn'] == '2'){
		descargar_archivo();
	}

	function modificar_celda(){
		$class=new constante();	
		$class->consulta("UPDATE facturanext.correo set tipo ='".$_POST['consumo']."' where id ='".$_POST['id']."'");	
	}
	
	function descargar_archivo(){		
		
    	
	   	$file="../archivos/".$_GET['user']."/".$_GET['id'].".".$_GET['ext']; //file location 
	   	
	   	if (!is_readable($file))
		    die('File is not readable or not exists!');
		 
		$filename = pathinfo($file, PATHINFO_BASENAME);
		 
		// get mime type of file by extension
		$mime_type = getMimeType($filename);
		 
		// set headers
		header('Pragma: public');
		header('Expires: -1');
		header('Cache-Control: public, must-revalidate, post-check=0, pre-check=0');
		header('Content-Transfer-Encoding: binary');
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Length: " . filesize($file));
		header("Content-Type: $mime_type");
		header("Content-Description: File Transfer");
		 
		// read file as chunk
		if ( $fp = fopen($file, 'rb') ) {
		    ob_end_clean();
		 
		    while( !feof($fp) and (connection_status()==0) ) {
		        print(fread($fp, 8192));
		        flush();
		    }
		 
		    @fclose($fp);
		    exit;
		}

		
	}
	//////////////////////////////////////////////////
	function getMimeType($filename){
	    $ext = pathinfo($filename, PATHINFO_EXTENSION);
	    $ext = strtolower($ext);
	 
	    $mime_types=array(
	        "pdf" => "application/pdf",
	        "txt" => "text/plain",
	        "html" => "text/html",
	        "htm" => "text/html",
	        "exe" => "application/octet-stream",
	        "zip" => "application/zip",
	        "doc" => "application/msword",
	        "xls" => "application/vnd.ms-excel",
	        "ppt" => "application/vnd.ms-powerpoint",
	        "gif" => "image/gif",
	        "png" => "image/png",
	        "jpeg"=> "image/jpg",
	        "jpg" =>  "image/jpg",
	        "php" => "text/plain",
	        "csv" => "text/csv",
	        "xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
	        "pptx" => "application/vnd.openxmlformats-officedocument.presentationml.presentation",
	        "docx" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
	    );
	 
	    if(isset($mime_types[$ext])){
	        return $mime_types[$ext];
	    } else {
	        return 'application/octet-stream';
	    }
	}
?>