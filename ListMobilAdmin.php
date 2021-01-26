<?php
session_start();
// Store Session Data
if(!isset($_SESSION['user'])){
	header("location:Login.php");
}
?>
<html>

<head>
	<title></title>
	<script src="jquery-2.1.4.min.js"></script>
</head>
	<body>
		<input type="button" name="logout" id = "logout" value="logout" onclick="window.location.href='Logout.php'">
		<label id="j">
		<?php
		$mysqli = new mysqli("localhost","root", "","pewebdb");
		if ($mysqli->connect_errno) 
		{
			echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		}
	$res = $mysqli->query("SELECT mo.*,me.nama FROM mobil mo left join merek me on mo.idmerk=me.idmerk");
	echo "<table border = '1'>
		<tr>
			<th>Gambar</th>
			<th>Merek</th>
			<th>Tipe</th>
			<th>Action</th>
		
		</tr>";
		while($row = $res->fetch_assoc()) {
			echo "<tr>
				<td><img src='img/".$row['idmobil'].".jpg' width = 100px></td>  
			 	<td>". $row['nama']."</td> 
			 	<td id='a'>".$row['tipe']."</td>
			 	<td><button class='update' value='".$row['idmobil']."'>Update</button><br><button class='delete' value='".$row['idmobil']."'>Delete</button></td>
			 	</tr>";
			 }

			echo "</table>" ;
			
			$mysqli->close();

		?></label>
				<label id = 'result'></label>
				<form method ='post' action='TambahMobil.php'>
					<input type='submit' name = 'insetdata' value ='Tambah Data'>
				
				</form>
			
			

		
</body>
<script>
	$(".delete").click(function(){
				/*var check = [];
        		$('#chk:checked').each(function(){check.push(this.value);});
        		$.post("HapusMobil.php",{check : check})
        		.done(function(data){
            		$("#j").html(data);
        		});*/
        		var id=$(this).val();
        		$.post("HapusMobil.php",{check : id})
        		.done(function(data){
            		$("#j").html(data);
        		});			
        	});
	$(".update").click(function(){
				/*var check = [];
        		$('#chk:checked').each(function(){check.push(this.value);});
        		$.post("HapusMobil.php",{check : check})
        		.done(function(data){
            		$("#j").html(data);
        		});*/
        		var id=$(this).val();
        		window.location.href="UbahMobil.php?id="+id;		
        	});

</script>
</html>
