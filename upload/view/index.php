<?php
session_start();
require("server.php");
$me=$_SESSION["userid"];
$q=$_REQUEST["q"];
?>
<!doctype html>
<html lang="en-US">
<head>
<meta name="theme-color"content="blue"><meta charset="UTF-8"><meta name="viewport"content="width=device-width,initial-scale=1">
<title>VIEW | POSTS</title>
<link rel="shortcut icon"href="../../favicon.ico"type="image/x-icon">
<style>
.header{
	color:white;background:#1b1bb8;position:fixed;width:100%;padding-bottom:10px;padding-top:5px;padding-left:25px;font-size:120%;top:-0.1px;margin-left:-7px;z-index:1000;
}
.container{
	height:90vh;width:90vw;padding-top:2px;border:0.4px solid blue;word-wrap:break-word;
}
.progress{
	width:89vw;background:grey;padding:3px;position:absolute;z-index:5;
}
#dephere{
	width:89vw;height:85vh;overflow-y:auto;word-wrap:break-word;
}
.caption{
	color:white;margin-top:-80px;max-width:200px;text-align:center;
}
</style>
</head>
<body>
<div class="header"id="username">User name</div><br><br>
<div class="container"id="deposit">
<div class="progress"id="progress"></div><br>
<div id="dephere"></div>
</div>

<!--javascripts-->
<script>
var time_slice=5000;
var selector='<?php echo $q;?>';
var container=document.getElementById("dephere");
if(window.XMLHttpRequest){
	var xhttp=new XMLHttpRequest();
}else{
	var xhttp=new ActiveXObject();
}
xhttp.onreadystatechange=function(){
	if(this.readyState==4 && this.status==200){
		var serv=JSON.parse(this.responseText);//alert(JSON.stringify(serv));
		FillName(serv[selector].name);
		FillDepo(serv[selector].train);
	}
};
xhttp.open("POST","posts.php",true);
xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhttp.send("q="+selector);

function FillName(e){
	document.getElementById("username").innerHTML=e;
}
var v=0;
var i=0;
function FillDepo(e){
	var x=e.length;
	var tm=(x*time_slice)/1000;
	var T=tm/x;
	var timing=setInterval(function (){
		v+=1;
		if((v)==T){
			v=0;
			i+=1;
		}
		if(i==x){
			clearInterval(timing);
		}
		var med_type=e[i].post_type;
		if(med_type==1){
		Writter(e[i].post_content,1,i);
		}else if(med_type==2){
			Writter(e[i].post_content,2,i);
		}else if(med_type==3){
			//Writter(e[i].post_content,3,i);
		}
	},1000);
}

function Writter(e,t,i){
	if(t==1){
		container.innerHTML="";
		container.innerHTML="<br><br>"+e;
		container.style.fontSize="120%";
		container.style.textAlign="center";
	}else if(t==2){
		var img=new Image();
		img.src="../posts/"+e[0];
		img.style.height="100%";
		container.innerHTML="";
		container.appendChild(img);
		container.innerHTML+="<br><div class='caption'>"+e[1]+"</div>";
	}/*else if(t==3){
		var img=new Image();
	    img.src="../audio_labels/"+e.audio_label;
		img.style.height="100%";
		container.innerHTML="";
		var aud="<audio autoplay><source src='../posts/"+e.audio_file+"'></audio>";
		container.appendChild(img);
		container.innerHTML+=aud;
	}*/
}
</script>
</body>
</html>
