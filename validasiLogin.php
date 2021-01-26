<?php 
	session_start();
	//$bb = md5('1234dede');
	 //echo $bb;
	$mysqli = new mysqli("localhost","root", "","pewebdb");
	if ($mysqli->connect_errno) {
		echo "Gagal Koneksi".$mysql->connect_errno;
	}
	$id 	= $_POST['name'];
	$pwd 	= $_POST['pass'];
	$salt 	="";
	
	$sql 	= "SELECT * FROM admin WHERE nama='$id'";
	$res = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc($res);
	if ($row==TRUE) {
		$salt = $row['salt'];
	}//--
	
	//proses pengecekan login
	$fnlpass= md5($salt.$pwd);
	$sql2 	= "SELECT * FROM admin WHERE nama='$id' AND password='$fnlpass'";
	$res2 	= mysqli_query($mysqli, $sql2);
	//$row2 = mysqli_fetch_assoc($res2);
	if ($row2 = mysqli_fetch_assoc($res2)) {
		$_SESSION['user'] = $row2['nama'];

		header('location:ListMobilAdmin.php');

	}
	else{
		echo "<script type='text/javascript'>alert('Login Gagal')</script>";
		echo "<script type='text/javascript'>window.location.href='Login.php'</script>";

	}//--
	$mysqli->close();




 ?>