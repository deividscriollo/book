<?php
	if(!isset($_SESSION)){
	    session_start();        
	}
	include_once('../admin/class.php');
	include_once('../admin/classcorreos.php');

	$class=new constante();
	if (isset($_POST['llenar_pais'])) {
		$resultado = $class->consulta("SELECT id, nom_pais FROM localizacion.pais");
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			$sum['value']=$row[0];
			$sum['text']=$row[1];
			$acu[]=$sum;
		}
		print_r(json_encode($acu));	
	}
	if (isset($_POST['llenar_sucursal'])) {
		$id_empresa=$_SESSION['m']['razon_social'];
		$resultado = $class->consulta("SELECT id, nombre_empresa_sucursal, direccion FROM sucursales_empresa WHERE ID_EMPRESA='$id_empresa' AND stado_sucursal='Abierto';");
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			print'<div>
					<label>
						<input name="subscription" value="'.$row['id'].'" type="checkbox" class="ace" />
						<span class="lbl tooltip-success" data-rel="tooltip" data-placement="top" data-original-title="'.$row[2].'"> '.$row[1].'</span>
					</label>
				</div>';
		}
		// print_r(json_encode($acu));	
	}	
	if(isset($_POST['llenar_provincia'])) {
		$resultado = $class->consulta("SELECT pro.id, pro.nom_provincia FROM localizacion.provincia pro, localizacion.pais p WHERE id_pais=p.id;");
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			$sum['value']=$row[0];
			$sum['text']=$row[1];
			$acu[]=$sum;
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['llenar_ciudad'])) {
		$resultado = $class->consulta("SELECT c.id, nom_ciudad FROM localizacion.provincia pro, localizacion.ciudad c WHERE c.id_provincia=pro.id and pro.id='$_POST[id]'");
		$acu;
		while ($row=$class->fetch_array($resultado)) {
			$sum['value']=$row[0];
			$sum['text']=$row[1];
			$acu[]=$sum;
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['btn_guardar_cargo'])) {
		$id = $class->idz();
		$fecha =$class->fecha_hora();
		$id_empresa=$_SESSION['m'][3];
		$acu[0]=0;
		$resultado = $class->consulta("INSERT INTO cargo_colaboradores  VALUES ('$id','$id_empresa', '$_POST[txt_0]', '1', '$fecha');");
		if ($resultado) {
			$acu[0]=1; // Info data save ok
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['btn_guardar_data'])) {
		$id = $class->idz();
		$fecha =$class->fecha_hora();
		$id_empresa=$_SESSION['m'][3];
		$mat_archivo=json_decode($_POST['thumb_values'],true);
		// extrayendo extension
		$vecnom = explode('.', $mat_archivo['name']);
		$limitgimg=count($vecnom);
		$extension = $vecnom[$limitgimg-1];
		// existencia carpeta
		$acu[0]=0;
		if (!file_exists('img')) {
	    	mkdir('img', 0777, true);
		}
		if (!file_exists('img/'.$_SESSION['idsucursal'])) {
		    mkdir('img/'.$_SESSION['idsucursal'], 0777, true);
		}
		$nom=$class->idz();
		$id=$class->idz();
		$id_2=$class->idz();
		$pass=$class->generaPass();
		$fecha =$class->fecha_hora();

		$archivo=$nom.'.'.$extension;
		$data=$mat_archivo['data'];
		$data = str_replace('data:image/png;base64,', '', $data);
		$data = str_replace('data:image/jpg;base64,', '', $data);
		$data = str_replace('data:image/jpeg;base64,', '', $data);
		$data = str_replace(' ', '+', $data);
		$data = base64_decode($data);
		$url='img/'.$_SESSION['idsucursal'].'/'.$archivo;
		file_put_contents($url, $data);
		$acu['filename']=$archivo;
		$acu['status']='success';
		$acu['url']='next/empresa/'.$url;
		$resultado = $class->consulta("INSERT INTO perfil_colaboradores VALUES ('$id', '$id_empresa', '$_POST[txt_1]', '$_POST[sel_cargo]', '$_POST[txt_2]','$fecha', '$_POST[txt_3]', '', '', '', '', '', '1', '$fecha');");
		$resultado = $class->consulta("INSERT INTO seg.acceso_colaboradores	VALUES ('$id_2', '$id', '$_POST[sel_cargo]', '$pass', '0', '$fecha');");
		$resultado = $class->consulta("SELECT CASE WHEN nom_comercial='' THEN upper(representante_legal)END  FROM seg.empresa WHERE ID='$id_empresa';");
		$nom_empresa='';
		while ($row=$class->fetch_array($resultado)) {
			$nom_empresa=$row[0];
		}
		activacion_cuenta_colaborador('$_POST[txt_2]','$id','$_POST[txt_1]', $nom_empresa);
		if ($resultado) {
			$acu[0]=1; // Info data save ok
		}
		// print_r(json_encode($acu));	
	}
	if(isset($_POST['llenar_data_cargo'])) {
		$id_empresa=$_SESSION['m']['id_empresa'];
		$acu;
		$resultado = $class->consulta("	SELECT id, upper(cargo) as cargo, stado, fecha 
										FROM cargo_colaboradores 
										WHERE ID_EMPRESA='$id_empresa' AND STADO='1' AND ID_EMPRESA='$id_empresa'");
		while ($row=$class->fetch_array($resultado)) {
			$acu[]= array($row['id'],$row['cargo'],$row['stado'],$row['fecha']);
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['llenar_data'])) {
		$id_empresa=$_SESSION['m'][3];
		$acu;
		$resultado = $class->consulta("	SELECT PC.ID, upper(PC.NOMBRE) as nombre, upper(CC.CARGO) as cargo, lower(PC.CORREO) as correo, PC.TELEFONO,PC.STADO
										FROM perfil_colaboradores PC, cargo_colaboradores CC
										WHERE CC.id=PC.CARGO AND PC.STADO!='delete' AND PC.ID_EMPRESA='$id_empresa'");
		while ($row=$class->fetch_array($resultado)) {
			$acu[] = array($row['id'],$row['nombre'],ucwords($row['cargo']),$row['correo'],$row['telefono'],$row['stado']); 
		}
		print_r(json_encode($acu));	
	}
	if(isset($_POST['verificacion_existencia_cargo'])) {
		$id = $class->idz();
		$fecha =$class->fecha_hora();
		$acu='true';
		$resultado = $class->consulta("SELECT * FROM cargo_colaboradores WHERE cargo='$_POST[txt_0]';");
		if ($row=$class->fetch_array($resultado)>0) {
			$acu='false'; // Info data save ok
		}
		print $acu;
	}
	if(isset($_POST['cargo_eliminar'])) {
		$acu[0]=0;
		$resultado = $class->consulta("UPDATE cargo_colaboradores SET stado='0' WHERE id='$_POST[id]';");
		if ($resultado) {
			$acu[0]=1; // Info data update ok
		}
		print_r(json_encode($acu));
	}
	if(isset($_POST['data_eliminar'])) {
		$acu[0]=0;
		$resultado = $class->consulta("UPDATE perfil_colaboradores SET stado='delete' WHERE id='$_POST[id]';");
		if ($resultado) {
			$acu[0]=1; // Info data update ok
		}
		print_r(json_encode($acu));
	}
	if(isset($_POST['llenar_select_cargo'])) {
		$acu[0]=0;
		$id_empresa=$_SESSION['m'][3];
		$resultado = $class->consulta("SELECT id, upper(cargo) as cargo FROM cargo_colaboradores WHERE ID_EMPRESA='$id_empresa' AND STADO='1'");
		while ($row=$class->fetch_array($resultado)) {
			print'<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}	
?>