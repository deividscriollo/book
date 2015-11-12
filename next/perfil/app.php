<?php 
	include_once('../admin/class.php');
	$class=new constante();
	
	if (isset($_POST['archivo'])) {
		$img_64=$_POST['id'];
		$img_64 = str_replace('data:image/png;base64,', '', $img_64);        
	    $img_64 = str_replace(' ', '+', $img_64);
	    $data_img = base64_decode($img_64); 
		$finfo = new finfo(FILEINFO_MIME);
		echo $finfo->buffer($data_img) . "\n";
				// $carpeta = 'img/';
				// if (!file_exists($carpeta)) {
				//     mkdir($carpeta, 0777, true);
				// }
				// $file = 'img/deivid.jpg';
			 //    if($success = file_put_contents($file, $data_img)){
			 //        print "true";
			 //    }else{
			 //        print "false";
			 //    }
				// $carpetaDestino=$carpeta;
				// file_put_contents($file, $data_img);
		    	
		   //  	$extension=(string)$extension;
		   //  	$e=explode('.', $extension);
		   //  	$id_img=$class->idz();
		   //  	$fecha=$class->fecha_hora();

		   //      $origen=$_FILES["txt_fotos2"]["tmp_name"];
		   //      $destino=$carpetaDestino.$id_img.'.'.$e[1];				
		   //      # movemos el archivo
		   //      if(@move_uploaded_file($origen, $destino))
		   //      {
		   //      	print'listos para guardar';
		   // //      	//guardando
		   // //      	$resultado = $class->consulta("INSERT INTO FOTOGRAFIAS_atractivos VALUES('$id_img','$destino','$_POST[txt_id_alojamiento_img]','1','$fecha')");	
					// // if (!$resultado) {
					// // 	print('1');
					// // }else{
					// // 	print('0');
					// // }
		   //      }
	}
	
?>