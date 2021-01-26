<?php
$name=$_POST['nma'];
	$target_Path = "img/".$name.".jpg";
	move_uploaded_file( $_FILES['photo']['tmp_name'], $target_Path );
	
	echo "sukses";

?>