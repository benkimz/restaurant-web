<?php
session_start();
require("server.php");
date_default_timezone_set($time_d);
$me=$_SESSION["userid"];
$q=$_REQUEST["q"];
$post_container=array();
class PostLay{
	function PostLay($time,$content,$type){
		$this->post_time=$time;
		$this->post_content=$content;
		$this->post_type=$type;
	}
}

class Combine{
	function Combine($uid,$obj){
		$this->$uid=$obj;
	}
}

class Draft{
	function Draft($name,$array){
		$this->name=$name;
		$this->train=$array;
	}
}

class AudioCase{
	function AudioCase($label,$audio){
		$this->audio_label=$label;
		$this->audio_file=$audio;
	}
}

?>
<?php
$conn=new mysqli($servername,$username,$password,$dbname);
$sql="SELECT * FROM users WHERE Uid='$q'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$smart_user=$row["Firstname"]." ".$row["Lastname"];
$auto_id=$row["Userid"];
$conn->close();
?>
<?php
$con=new mysqli($servername,$username,$password,$posts_db);
$sql="SELECT * FROM ptime WHERE Author=".$auto_id." ORDER BY Id ASC";
$result=$con->query($sql);
if($result->num_rows > 0){
	while($row=$result->fetch_assoc()){
		$qry=$row["Pid"];
		$typ=$row["MedType"];
		if($typ==1){
			$sq="SELECT * FROM ptxt WHERE Id=".$qry;
			$res=$con->query($sq);
			$r=$res->fetch_assoc();
			$cont=new PostLay(date("d/m h:i a", $r["Ptime"]),$r["Content"],1);
			array_push($post_container,$cont);
		}else if($typ==2){
			$sq="SELECT * FROM images WHERE Id=".$qry;
			$res=$con->query($sq);
			$r=$res->fetch_assoc();
			$cont=new PostLay(date("d/m h:i a", $r["Ptime"]),[$r["Ipath"],$r["About"]],2);
			array_push($post_container,$cont);
		}else if($typ==3){
			$sq="SELECT * FROM audio WHERE Id=".$qry;
			$res=$con->query($sq);
			$r=$res->fetch_assoc();
			$audlab=new AudioCase($r["Lpath"],$r["Fpath"]);
			$cont=new PostLay(date("d/m h:i a", $r["Ptime"]),$audlab,3);
			array_push($post_container,$cont);
		}
	}
}
$info=new Draft($smart_user,$post_container);
$dat=new Combine($q,$info);
echo json_encode($dat);
$con->close();
?>