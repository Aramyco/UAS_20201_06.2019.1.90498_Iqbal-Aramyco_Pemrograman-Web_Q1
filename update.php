<?php
	$mysqli = new mysqli("localhost","root", "","pewebdb");
	if ($mysqli->connect_errno) 
	{
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
	
	$chk = $_POST['id'];

	$tipe = $_POST['tipe'];
	$merek = $_POST['merek'];
	$panjang = $_POST['panjang'];
	$lebar = $_POST['lebar'];
	$tinggi = $_POST['tinggi'];
	$jaraksumbu = $_POST['jaraksumbu'];
	$radiusputar = $_POST['radiusputar'];
	$hargamin = $_POST['hargamin'];
	$hargamax = $_POST['hargamax'];
	$kapasitasmesin = $_POST['kapasitasmesin'];
	$kapasitastangki = $_POST['kapasitastangki'];
	$ukuranvelg = $_POST['ukuranvelg'];
	$ukuranroda = $_POST['ukuranroda'];

		unlink('img/'.$chk.'.jpg');

	$mysqli->query("UPDATE `mobil` SET `idmerk`= $merek,`tipe`= '".$tipe."',`panjang`= $panjang,`lebar`= $lebar,`tinggi`=$tinggi,`jarak_sumbu_roda`= $jaraksumbu,`radiusputar`=$radiusputar,`hargamin`=$hargamin,`hargamax`=$hargamax,`kapasitas_mesin`=$kapasitasmesin,`kapasitas_tangki`= $kapasitastangki,`ukuran_velg`= $ukuranvelg,`ukuranroda`=$ukuranroda WHERE `idmobil`= $chk");
/*	$res = $mysqli->query("SELECT mo.*,me.nama FROM mobil mo left join merek me on mo.idmerk=me.idmerk");
	$hasil = "";
	$hasil.= "<table border = '1'>"
	echo "<table border = '1'>
		<tr>
			<th>Bandingkan</th>
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
				<td><input type = 'checkbox' name = 'chk' id = 'chk' value='".$row['idmobil']."'></td> 
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
			</tr><input type='text' id='idmob' value='".$chk."'>";}*/
			echo $chk;
			$mysqli->close();
?>