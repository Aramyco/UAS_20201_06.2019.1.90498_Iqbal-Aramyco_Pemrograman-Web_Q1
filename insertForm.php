<?php
session_start();
// Store Session Data
if(!isset($_SESSION['user'])){
	header("location:LoginForm.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="jquery-2.1.4.min.js"></script>
</head>
<body>
		<form id="frmData" method="post">
			Tipe : <input type="text" name="tipe" id = 'tipe'><br><br>
			Merek : <select id="merek">
			<?php
				$connect = mysqli_connect("localhost","root","","pewebdb");
				if(!$connect)
				die("Connection failed:" .mysqli_connect_error());
				$sql = "SELECT * from merek";
				$result = mysqli_query($connect,$sql);
				while($arow = mysqli_fetch_assoc($result)){
				
				echo "<option value=".$arow['idmerk'].">".$arow['nama']."</option>" ;
				
				}
			?>
			</select>
			<br>
			<br>
			panjang : <input type="text" name="panjang" id="panjang">
			<br>
			<br>
			lebar : <input type="text" name="lebar" id="lebar">
			<br>
			<br>
			tinggi : <input type="text" name="tinggi" id="tinggi">
			<br>
			<br>
			jarak sumbu : <input type="text" name="jaraksumbu" id="jaraksumbu">
			<br>
			<br>
			radius putar : <input type="text" name="radiusputar" id="radiusputar">
			<br>
			<br>
			Harga Minimal : <input type="text" name="hargamin" id="hargamin">
			<br>
			<br>
			Harga Maximal : <input type="text" name="hargamax" id="hargamax">
			<br>
			<br>
			Kapasitas mesin : <input type="text" name="kapasitasmesin" id="kapasitasmesin">
			<br>
			<br>
			Kapasitas Tangki : <input type="text" name="kapasitastangki" id="kapasitastangki">
			<br>
			<br>
			Ukuran Velg : <input type="text" name="ukuranvelg" id="ukuranvelg">
			<br>
			<br>
			Ukuran Roda : <input type="text" name="ukuranroda" id="ukuranroda">
			<br>
			<br>
			Gambar : <input type="file" name="photo" id="photo">
			<input type="text" name="nma" id="nma" hidden>
		</form>
			<input type="button" name="but" id="simpan" value="simpan">
			<button onclick="window.location.href='table.php'">kembali</button>
		


</body>
<script>
	
	$("#simpan").click(function(){
		var tipe = $('#tipe').val();
		var merek = $('#merek').val();
		var panjang = $('#panjang').val();
		var lebar = $('#lebar').val();
		var tinggi =$('#tinggi').val();
		var jaraksumbu =$('#jaraksumbu').val();
		var radiusputar = $('#radiusputar').val();
		var hargamin =$('#hargamin').val();
		var hargamax =$('#hargamax').val();
		var kapasitasmesin =$('#kapasitasmesin').val();
		var kapasitastangki =$('#kapasitastangki').val();
		var ukuranvelg =$('#ukuranvelg').val();
		var ukuranroda =$('#ukuranroda').val();
        $.post("insertsql.php",{tipe : tipe , merek : merek ,  panjang : panjang , lebar : lebar , tinggi : tinggi , jaraksumbu : jaraksumbu ,radiusputar:radiusputar, hargamin : hargamin , hargamax : hargamax , kapasitasmesin : kapasitasmesin , kapasitastangki : kapasitastangki , ukuranvelg : ukuranvelg, ukuranroda:ukuranroda})
        		.done(function(data){
        			$('#nma').val(data);
					var formData = new FormData($("#frmData")[0]);
					$.ajax({
					url: 'insertImage.php',
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					enctype: 'multipart/form-data',
					processData: false,
					success: function (response) {
					alert(response);
	}});
            		
        		});
    });
   
</script>
<!-- <?php
$a=$_POST['nma'];
	$target_Path = "images/".$a.".jpg";
	$target_Path = $target_Path.basename( $_FILES['photo']['name'] );
	move_uploaded_file( $_FILES['photo']['tmp_name'], $target_Path );
?> -->
</html>