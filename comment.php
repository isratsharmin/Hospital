<html>
<head>
<link rel="stylesheet" type="text/css" href="style/bodyp.css">
<title>Comment Box</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

	function commentSubmit(){
		if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		var name = form1.name.value;
		var email = form1.email.value;
		var comments = form1.comments.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&email='+email+'&comments='+comments, true); //open and send http request
		xmlhttp.send();
		alert('Thank you for you comment');
		
	}
	//window.location='index.php';
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
		});
		
</script>
<style>
.button{
	padding:5px 15px 5px 15px;
    background:#567373;
    color: #FFF;
	border-radius: 3px;
}

.button:hover{
	background:#4D9494;
}

a{
	text-decoration:none;
}

</style>
</head>
<body>
<?php include 'header.php';?>
<div class="middle1">
<div class="profile" style="margin-left:100px;">
    	<h1>Comment Here....</h1>
    </div>
    <div class="comment_input">
        <form name="form1" style="margin-left:100px;">
        	<input type="text" name="name" placeholder="Name..."/></br></br>
			<input type="email" name="email" placeholder="Email..."/></br></br>
            <textarea name="comments" placeholder="Leave Comments Here..." style="width:635px; height:100px;"></textarea></br></br>
            <a href="index.php" onClick="commentSubmit()" class="button">Post</a></br>
        </form>
    </div>
    
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>