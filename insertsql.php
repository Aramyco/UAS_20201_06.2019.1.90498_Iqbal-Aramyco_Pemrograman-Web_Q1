<?php

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

$mysqli = mysqli_connect("localhost","root", "","pewebdb");

/*if(!$connect)
			die("Connection failed:" .mysqli_connect_error());
			$sql = "INSERT INTO mobil(idmobil, idmerk, tipe, panjang, lebar, tinggi, jarak_sumbu_roda, radiusputar, hargamin, hargamax, kapasitas_mesin, kapasitas_tangki, ukuran_velg,ukuranroda) VALUES('".$tipe."','".$merek."','".$panjang."','".$lebar."','".$tinggi."','".$jaraksumbu."','".$radiusputar."','".$hargamin."','".$hargamax."','".$kapasitasmesin."','".$kapasitastangki."','".$ukuranvelg."','".$ukuranroda."')";

			if($result = mysqli_query($connect,$sql)){
				echo "sukses";
			}*/
		

$sql = "Insert Into mobil(tipe,idmerk,panjang,lebar,tinggi,jarak_sumbu_roda,radiusputar,hargamin,hargamax,kapasitas_mesin,kapasitas_tangki,ukuran_velg,ukuranroda)Values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('sdddddddddddd',$tipe,$merek,$panjang,$lebar,$tinggi,$jaraksumbu,$radiusputar,$hargamin,$hargamax,$kapasitasmesin,$kapasitastangki,$ukuranvelg,$ukuranroda);
$stmt->execute();
$res = $mysqli->query("SELECT idmobil FROM mobil order by idmobil DESC limit 1");
while($arow = mysqli_fetch_assoc($res)){
	echo $arow['idmobil'];
}

$mysqli->close();
?>