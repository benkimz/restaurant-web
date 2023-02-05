<?php
session_start();
require("server.php");
require("../lastpost.php");
$dbname=$posts_db;
$me=$_SESSION["userid"];

function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg')
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif')
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png')
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);
  return 1;

}
?>

<!doctype html>
<html lang="en-US">
<head>
<meta name="viewport"content="width=device-width,initial-scale=1"><meta name="theme-color"content="green">
<meta charset="UTF-8">
<link rel="shortcut icon"href="../../favicon.ico"type="image/x-icon">
<style>
.header{
	color:white;background:lightgrey;padding:20px;font-size:180%;
	background:linear-gradient(to Bottom right, white,green,white);
}
.label_hold{
	padding:3px;
}
.label{
	height:200px;width:200px;
}
.label_txt{
	color:white;margin-top:-150px;font-size:180%;
}
.select{
	width:150px;border:1px solid white;background:lightgrey;color:purple;
}
input[type=submit]{
	background:blue;color:white;width:75px;padding:3px;border:none;
}
.legend{
	color:blue;background:pink;padding:10px;font-size:130%;
}
.more{
	padding:20px;border-radius:20px;-webkit-border-radius:20px;-moz-border-radius:20px;
	border:1px solid green;
}
.error{
	color:white;background:purple;display:none;
}
</style>
</head>
<body>
<center>
<div class="header">header information comes here</div>
</center><hr>
<center>


<form class="form"autocomplete="off"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post">
<fieldset>
<center><legend class="legend"><b>Type a post:</b></legend></center>
<br>
<span id="saved"class="error"></span><br>
<textarea class="more"rows="5"cols="25"name="txt"placeholder="Type something..."maxlength="800"></textarea>
<br><br>
<input type="submit"name="submit"value="post">
<br><br>
</fieldset>
</form>
<hr>


<form class="form"autocomplete="off"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post"enctype="multipart/form-data">
<fieldset>
<center><legend class="legend"><b>Audio upload engine:</b></legend></center>
<input id="audio"type="file"name="audio"accept="audio/*" hidden>
<input type="number"name="rand"id="rand" hidden>
<input id="lb"type="file"name="label"accept="image/*" hidden>
<br><span id="asaved"class="error"></span><br>
<!--audio label-->
<div class="label_hold">
<label for="lb">
<img class="label"src="../label.png"id="al"alt="audio_label">
</label>
<p class="label_txt">
<strong>
Tap<br>to add<br>label
</strong>
</p>
</div>
<!--end-->
<br><br>
<!--select button label-->
<label for="audio">
<div class="select">
<strong>
File
<marquee class="run">Tap to select audio file...</marquee>
</strong>
</div>
</label>
<!--end-->
<br><br>
<input type="submit"name="asubmit"value="upload">
<br><br>
</fieldset>
</form>
<hr>

<form class="form"autocomplete="off"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="post"enctype="multipart/form-data">
<fieldset>
<center><legend class="legend"><b>Images upload engine:</b></legend></center>
<input type="file"name="image"id="img"accept="image/*" hidden>
<input type="number"name="rand"id="irand" hidden>
<br><span id="isaved"class="error"></span><br>
<!--label-->
<div class="label_hold">
<label for="img">
<img class="label"id="im"src="../img.png"alt="file">
</label>
<p class="label_txt">
<strong>
Tap<br>to select<br> image
</strong>
</p>
</div>
<!--end-->
<br><br>
<textarea class="more"rows="4"cols="25"name="more"placeholder="Something about the image..."maxlength="120"></textarea>
<br><br>
<input type="submit"name="isubmit"value="upload">
<br><br>
</fieldset>
</form>
<hr>
 
</center>

<!--//scripts//-->
<script>
window.onload=(function(){
	document.getElementById("rand").value=Math.floor(Math.random()*1000000);
	document.getElementById("irand").value=Math.floor(Math.random()*1000000);
});
</script>
<!--audio label previewing-->
<script>
var entry=document.getElementById("lb");
var wind=document.getElementById("al");
var entry_b=document.getElementById("img");
var wind_b=document.getElementById("im");
entry.onchange=(function (e){
	const file=e.target.files[0];
	const url=URL.createObjectURL(file);
	wind.src=url;
});
entry_b.onchange=(function (e){
	const file=e.target.files[0];
	const url=URL.createObjectURL(file);
	wind_b.src=url;
});
</script>

</body>
</html>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	//audio
	$audio_label=basename($_FILES["label"]["name"]);
	$audio=basename($_FILES["audio"]["name"]);
	$salt=$_POST["rand"];
	//textarea
	$text=test_input($_POST["txt"]);
	//image
	$image=basename($_FILES["image"]["name"]);
	$more=test_input($_POST["more"]);
	//end
}
date_default_timezone_set($time_d);
$time=strtotime("now");

//POST A TYPED NOTE
$conn=new mysqli($servername,$username,$password,$dbname);
if(isset($_POST["submit"])){
	if($text!="" || null){
		$sql="INSERT INTO ptxt (Content,Ptime) VALUES ('$text','$time')";
		if($conn->query($sql)===true){
			        $xy=LastId($conn,"ptxt");
					SaveLastId($conn,$xy,1,$me);
			echo '<script>document.getElementById("saved").style.display="block";document.getElementById("saved").innerHTML="Saved successfully";setTimeout(function (){document.getElementById("saved").style.display="none";window.history.back();},2000);</script>';
		}
	}
}
$conn->close();

//POST AN IMAGE
$conn=new mysqli($servername,$username,$password,$dbname);
if(isset($_POST["isubmit"])){ 
		$error="";
		$ok=1;
		$ext=pathinfo($image,PATHINFO_EXTENSION);
		$check=getimagesize($_FILES["image"]["tmp_name"]);
		if($ext!="PNG" && $ext!="JPG" && $ext!="JPEG" && $ext!="GIF" && $ext!="png" && $ext!="jpg" && $ext!="jpeg" && $ext!="gif"){
			$error.="JPG, PNG, JPEG, & GIF only";
			$ok=0;
		}
		if($check==false){
			$ok=0;
			$error.="Unknown file format";
		}
		$link=$salt.$time.".".$ext;
		$path="../posts/".$link;
		if($ok==1){
			//upload content
			if(compressImage($_FILES["image"]["tmp_name"],$path,45)){
				$sql="INSERT INTO images (Ipath,About,Ptime) VALUES ('$link','$more','$time')";
				if($conn->query($sql)===true){
					$xy=LastId($conn,"images");
				    SaveLastId($conn,$xy,2,$me);
					echo '<script>document.getElementById("isaved").style.display="block";document.getElementById("isaved").innerHTML="Saved successfully";setTimeout(function (){document.getElementById("isaved").style.display="none";window.history.back();},2000);</script>';
				}
			}
			//end
		}
		
}
$conn->close();

//POST AN AUDIO
$conn=new mysqli($servername,$username,$password,$dbname);
if(isset($_POST["asubmit"])){
	$audio_error="";
	$ok=1;
	if($audio_label!="" || null){
		$k=1;
		$ext=pathinfo($audio_label,PATHINFO_EXTENSION);
		$check=getimagesize($_FILES["label"]["tmp_name"]);
		if($ext!="PNG" && $ext!="JPG" && $ext!="JPEG" && $ext!="GIF"){
			$error.="JPG, PNG, JPEG, & GIF only";
			$k=0;
		}
		if($check==false){
			$k=0;
			$error.="Unknown file format";
		}
		$llink=$salt.$time.".".$ext;
		$lpath="../audio_labels/".$llink;
		if(compressImage($_FILES["label"]["tmp_name"],$lpath,45)){
			$k=1;
		}
	}else{
		$llink="sample_audio_label.png";
		$k=1;
	}
	//end of label handling
	$lext=pathinfo($audio_label,PATHINFO_EXTENSION);
	$aext=pathinfo($audio,PATHINFO_EXTENSION);
	if($aext!="mp3" && $aext!="wav" && $aext!="acc" && $aext!="ogg" && $aext!="midi" && $aext!="wmv"){
		$audio_error.="MP3, WAV, WMV, ACC, OGG, & MIDI only";
		$ok=0;
	}
	$alink=$salt.$time.".".$aext;
    $apath="../posts/".$alink;
	if($ok==1 && $k==1){
		//upload the audio
		if(move_uploaded_file($_FILES["audio"]["tmp_name"],$apath)){
			$sql="INSERT INTO audio (Fpath,Lpath,Ptime) VALUES ('$alink','$llink','$time')";
		    if($conn->query($sql)===true){
				    $xy=LastId($conn,"audio");
					SaveLastId($conn,$xy,3,$me);
			    echo '<script>document.getElementById("asaved").style.display="block";document.getElementById("asaved").innerHTML="Saved successfully";setTimeout(function (){document.getElementById("asaved").style.display="none";window.history.back();},2000);</script>';
		   }else{echo $conn->error;}
		}
		//end
	}
}
$conn->close();
?>