
<?php
$conn=new mysqli($servername,$username,$password,$dbname);
function LastId($conn,$tbl){
	$sql="SELECT * FROM ".$tbl." ORDER BY Id DESC";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	return $row["Id"];
	$conn->close();
}

function SaveLastId($conn,$q,$t,$m){
	$sql="INSERT INTO ptime (Pid,MedType,Author) VALUES ('$q','$t','$m')";
	if($conn->query($sql)===true){
		return 1;
	}else{
		return 0;
	}
	$conn->close();
}

$conn->close();
?>
