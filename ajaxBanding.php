<?php 
	
	$mysqli = new mysqli("localhost","root", "","pewebdb");
	if ($mysqli->connect_errno) 
	{
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}

	$chk = $_POST['check'];
	//echo $chk[0];
	$id = '('.$chk[0];
	for ($i=1; $i<count($chk); $i++) { 
		$id .= ",".$chk[$i];
	}
	$id.=")";
	//echo $id;
	$res = $mysqli->query("SELECT mo.*,me.nama FROM mobil mo left join merek me on mo.idmerk=me.idmerk where idmobil in $id");
	$hasil = "";
	$hasil.= "<table border = '1'>
		<tr>
			<th>Gambar</th>
			<th>Merek</th>
			<th>Tipe</th>
			<th>Panjang</th>
			<th>Lebar</th>
			<th>Tinggi</th>
			<th>Jarak Sumbu Roda</th>
			<th>Radiusputar</th>
			<th>Harga Minimal</th>
			<th>Hargam Maximal</th>
			<th>Kapasitas Mesin</th>
			<th>Kapasitas Tangki</th>
			<th>Ukuran Velg</th>
			<th>Ukuran Roda</th>
		
		</tr>";
		while($row = $res->fetch_assoc()) {
			$hasil.= "
			
			<tr>  
				<td><img src='img/".$row['idmobil'].".jpg' width = 100px>  
			 	<td>". $row['nama']."</td> 
			 	<td>". $row['tipe']."</td>
			 	<td>". $row['panjang']."</td>
			 	<td>".$row['lebar']."</td>
			 	<td>".$row['tinggi']."</td>
			 	<td>".$row['jarak_sumbu_roda']."</td>
			 	<td>".$row['radiusputar']."</td>
			 	<td>".$row['hargamin']."</td>
			 	<td>".$row['hargamax']."</td>
			 	<td>".$row['kapasitas_mesin']."</td>
			 	<td>".$row['kapasitas_tangki']."</td>
			 	<td>".$row['ukuran_velg']."</td>
			 	<td>".$row['ukuranroda']."</td>
			</tr>";}
			$hasil.= "</table>" ;
			echo $hasil;
			$mysqli->close();	

 ?>