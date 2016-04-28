<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Logeo</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="../css/style.css" rel="stylesheet" />
   <link href="../css/style-responsive.css" rel="stylesheet" />
   <link href="../css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="../css/animate.css" rel="stylesheet" />
   <link rel="stylesheet" href="../dist/css/jquery.gritter.min.css" />

</head>
<body>

</body>
</html>

<table class="table">
	<thead>
		<tr>
			<th>Nom Tabla</th>
			<th>Val Ant.</th>
			<th>Val Nue</th>
			<th>Proceso</th>
			<th>Usuario</th>
		</tr>
	</thead>
	<tbody>

<?php
include '../data/conexion.php';
	$conexion = conectarse();
	if(!isset($_SESSION)){
		session_start();		
	}
	print'hola';

	// if (isset($_POST['g'])) {
	// 	$user = $_POST['txt_1'];
	// 	$pass = $_POST['txt_2'];		
	// 	$acu=0;				
		// $result = pg_query("INSERT INTO PROVINCIA VALUES('20150326104209551428d175961',upper('Azuay'),'2');");
		$result = pg_query("SELECT * FROM AUDITORIA A, USUARIO U WHERE A.ID_USUARIO=U.ID_USUARIO");		

		while ($row = pg_fetch_row($result)) {			
			print'<tr>
					<td>'.$row[1].'</td>
					<td>'.$row[3].'</td>
					<td>'.$row[4].'</td>
					<td>'.$row[5].'</td>
					<td>'.$row[13].'</td>
					</tr>
				';
		}
	

?>
</tbody>
</table>