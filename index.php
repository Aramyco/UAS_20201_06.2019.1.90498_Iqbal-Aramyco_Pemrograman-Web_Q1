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
		<input type="button" name="logout" id = "logout" value="logout" onclick="window.location.href='logout.php'">
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
				<input type = 'button' name = 'delete' id= 'delete' value = 'delete'>
				<label id = 'result'></label>
				<form method ='post' action='insertForm.php'>
					<input type='submit' name = 'insetdata' value ='Tambah Data'>
				
				</form>
			
			

		
</body>
<script>
	$("#banding").click(function(){
				/*var id=[];
				//var check = document.getElementById('chk');
				var jum=0;
				var a="";
				for(var i =0;i<$('#jumlah').val() ;i++){
					var b = "chk"+(i+1);
					if(document.getElementById(b).checked){
						
						id[jum]=document.getElementById(b).value;
						jum++;
					}
						
				}
				
				$.post("bandingjax.php",{check : id})
        		.done(function(data){
            		$("#j").html(data);
        		});*/
        		var check = [];
        		$('#chk:checked').each(function(){check.push(this.value);});
        		$.post("bandingjax.php",{check : check})
        		.done(function(data){
            		$("#j").html(data);
        		});
			});
	$("#delete").click(function(){
				var check = [];
        		$('#chk:checked').each(function(){check.push(this.value);});
        		$.post("delete.php",{check : check})
        		.done(function(data){
            		$("#j").html(data);
        		});
			});
	$("#search").click(function(){
				
				var name = $('#searchname').val();
				//var check = document.getElementById('chk');
				
				$.post("search.php",{search : name})
        		.done(function(data){
            		$("#j").html(data);
        		});
			});

</script>
</html>
