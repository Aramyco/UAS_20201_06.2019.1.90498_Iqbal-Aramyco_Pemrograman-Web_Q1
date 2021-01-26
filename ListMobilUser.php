<html>

<head>
	<title></title>
	<script src="jquery-2.1.4.min.js"></script>
</head>
	<body>
		<label id="j">
		<?php
		$mysqli = new mysqli("localhost","root", "","pewebdb");
		if ($mysqli->connect_errno) 
		{
			echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		}
	echo"search : <input type='text' name='search' id='searchname'> <input type='button' name='search' id='search' value='search'>";
	$res = $mysqli->query("SELECT mo.*,me.nama FROM mobil mo left join merek me on mo.idmerk=me.idmerk");
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
				<td><input type='checkbox' name='chek' id='chk' value='".$row['idmobil']."'></td> 
				<td><img src='img/".$row['idmobil'].".jpg' width = 100px></td>  
			 	<td>". $row['nama']."</td> 
			 	<td id='a'>".$row['tipe']."</td>
			 	</tr>";
			 	$jumlah++;
			 }

			echo "</table>" ;
			echo "<input type='text' id='jumlah' value='$jumlah' hidden>";
			
			$mysqli->close();

		?></label>
				<input type = 'button' name = 'banding' id= 'banding' value = 'Bandingkan'>	
				<input type = 'button' onclick="window.location.href='ListMobilUser.php'" value = 'Kembali'>	
</body>
<script>
	$("#banding").click(function(){
        		var check = [];
        		$('#chk:checked').each(function(){check.push(this.value);});
        		$.post("ajaxBanding.php",{check : check})
        		.done(function(data){
            		$("#j").html(data);
        		});
			});
	$("#search").click(function(){
				
				var name = $('#searchname').val();
				//var check = document.getElementById('chk');
				
				$.post("Search.php",{search : name})
        		.done(function(data){
            		$("#j").html(data);
        		});
			});

</script>
</html>