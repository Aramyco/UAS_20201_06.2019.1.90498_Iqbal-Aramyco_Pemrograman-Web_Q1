<?php
session_start();
// Store Session Data
if(!isset($_SESSION['user'])){
	header("location:Login.php");
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
			<?php
				$connect = mysqli_connect("localhost","root","","pewebdb");
				if(!$connect)
				die("Connection failed:" .mysqli_connect_error());
				
				echo "Merek : <select id='merek'>";
				$sql = "SELECT * from merek";
				$result = mysqli_query($connect,$sql);
				while($arow = mysqli_fetch_assoc($result)){
				
				echo "<option value=".$arow['idmerk'].">".$arow['nama']."</option>" ;
				
				}
				echo "</select><br><br>";
				$sql = "SELECT * from mobil where idmobil='".$_GET['id']."'";
				$result = mysqli_query($connect,$sql);
				while($arow = mysqli_fetch_assoc($result)){
				echo "Tipe : <input type='text' name='tipe' id = 'tipe' value='".$arow['tipe']."'><br><br>";
				echo "panjang : <input type='text' name='panjang' id='panjang' value='".$arow['panjang']."'><br><br>";
				echo "lebar : <input type='text' name='lebar' id='lebar' value='".$arow['lebar']."'><br><br>";
				echo "tinggi : <input type='text' name='tinggi' id='tinggi' value='".$arow['tinggi']."'><br><br>";
				echo "jarak sumbu : <input type='text' name='jaraksumbu' id='jaraksumbu' value='".$arow['jarak_sumbu_roda']."'><br><br>";
				echo "radius putar : <input type='text' name='radiusputar' id='radiusputar' value='".$arow['radiusputar']."'><br><br>";
				echo "Harga Minimal : <input type='text' name='hargamin' id='hargamin' value='".$arow['hargamin']."'><br><br>";
				echo "Harga Maximal : <input type='text' name='hargamax' id='hargamax' value='".$arow['hargamax']."'><br><br>";
				echo "Kapasitas mesin : <input type='text' name='kapasitasmesin' id='kapasitasmesin' value='".$arow['kapasitas_mesin']."'><br><br>";
				echo "Kapasitas Tangki : <input type='text' name='kapasitastangki' id='kapasitastangki' value='".$arow['kapasitas_tangki']."'><br><br>";
				echo "Ukuran Velg : <input type='text' name='ukuranvelg' id='ukuranvelg' value='".$arow['ukuran_velg']."'><br><br>";
				echo "Ukuran Roda : <input type='text' name='ukuranroda' id='ukuranroda' value='".$arow['ukuranroda']."'><br><br>";
				echo "Gambar : <input type='file' name='photo' id='photo'>";
				echo "<input type='text' name='nma' id='nma' value='".$arow['idmobil']."' hidden>";
				}
			?>		
			
			
			
			
			
			
			
			
			
			
			
		</form>
			<input type="button" name="but" id="simpan" value="simpan">
			<button onclick="window.location.href='ListMobilAdmin.php'">kembali</button>
		

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
		var id =$('#nma').val();
        $.post('update.php' ,{id:id,tipe : tipe , merek : merek ,  panjang : panjang , lebar : lebar , tinggi : tinggi , jaraksumbu : jaraksumbu ,radiusputar:radiusputar, hargamin : hargamin , hargamax : hargamax , kapasitasmesin : kapasitasmesin , kapasitastangki : kapasitastangki , ukuranvelg : ukuranvelg, ukuranroda:ukuranroda})
        		.done(function(data){
        			$('#nma').val(data);
					var formData = new FormData($("#frmData")[0]);
					$.ajax({
					url: 'insertImage.php' ,
					type: 'POST',
					data: formData,
					async: false,
					cache: false,
					contentType: false,
					enctype: 'multipart/form-data',
					processData: false,
					success: function (response) {
					alert(response);
					window.location.href="ListMobilAdmin.php";
	}});
            		
        		});
    });
   
</script>
</html>