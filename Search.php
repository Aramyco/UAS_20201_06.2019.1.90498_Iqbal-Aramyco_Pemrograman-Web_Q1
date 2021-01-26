<?php 

	$mysqli = new mysqli("localhost","root", "","pewebdb");
	if ($mysqli->connect_errno) 
	{
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}

	$search = $_POST['search'];
	//echo $chk[0];
	//echo $id;
	
	$res = $mysqli->query("SELECT mo.*,me.nama FROM mobil mo inner join merek me on mo.idmerk=me.idmerk and me.nama = '".$search."'");
	echo "<table border = '1'>
		<tr>
			<th>Bandingkan</th>
			<th>Gambar</th>
			<th>Merek</th>
			<th>Tipe</th>
		
		</tr>";
		$jumlah=0;
		while($row = $res->fetch_assoc()) {
			echo "<tr>
				<td><input type='checkbox' name='chek".$row['idmobil']."' id='chk".$row['idmobil']."' value='".$row['idmobil']."'></td> 
				<td><img src='img/".$row['idmobil'].".jpg' width = 100px></td>  
			 	<td>". $row['nama']."</td> 
			 	<td id='a'>".$row['tipe']."</td>
			 	</tr>";
			 	$jumlah++;
			 }

			echo "</table>" ;
			echo "<input type='text' id='jumlah' value='$jumlah' hidden>";
			$mysqli->close();
 ?>