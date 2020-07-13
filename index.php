<html>
<head>

<style>

body
  {
	  margin:0px;
	  padding:0px;
	  font-family:Verdana, Geneva, sans-serif;
  }
  
  section:before
  {
	  content:'';
	  position:absolute;
	  top:0;
	  left:0;
	  width:100%;
	  height:100%;
	  background:linear-gradient(45deg, #ff0081 , #6827b0);
	  border-radius:0 0 50% 50%/0 0 100% 100%;
	  transform:scaleX(1.2);
	  
  }
  
  section
  {
	  position:relative;
	  width:100%;
	  height:30vh;
	  display:flex;
	  justify-content:center;
	  align-items:center;
	  overflow:hidden;
  }
  
  section .content
  {
	  position:relative;
	  z-index:1;
	  margin:0 auto;
	  max-width:900px;
	  text-align:center;
  }
  
  section .content h2
  {
	  font-size:100px;
	  color:#fff;
  }
  
  input[type="text"]
{
		background-color: #fff;
		box-shadow: 0 0 30px 0px black;
		height: 40px;
		width: 60%;
		border: none;
		border-radius: 4px;
		padding: 15px;
		margin: 1%;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		color: red;
		font-family: Montserrat;
		font-size: 14px;
	}

	input[type="text"]:hover{
		box-shadow: 0 0 30px 0px green;
	}

textarea{
		background-color: #fff;
		box-shadow: 0 0 30px 0px black;
		height: 100px;
    	width: 600%;
    	max-width: 60%;
		border: none;
		border-radius: 4px;
		padding: 15px;
		margin: 1%;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		color: red;
		font-family: Montserrat;
		font-size: 14px;
	}
	
	textarea:hover{
		box-shadow: 0 0 30px 0px green;
	}
	
body {
	display: flex;
	justify-content: center;
	align-items: center;
}

body {
	width: 100%;
	height: 90vh;
}

.button {
	display: block;
  width: 320px;
  max-width: 100%;
  margin: 0 auto;
  margin-bottom: 0;
  overflow: hidden;
  position: relative;
  transform: translatez(0);
  text-decoration: none;
  box-sizing: border-box;
  font-size: 24px;
	font-weight: normal;
	box-shadow: 0 9px 18px rgba(0,0,0,0.2);
}

.new {
	text-align: center;
	border-radius: 50px;
  padding: 26px;
  color: white;
  background: #BD3381;
  transition: all 0.2s ease-out 0s;
}

.gradient {
	display: block;
  position: absolute;
  top: 0;
  right: 0;
  width: 100%;
  height: 100%;
  bottom: auto;
  margin: auto;
  z-index: -1;
  background: radial-gradient(90px circle at top center, rgba(238,88,63,.8) 30%, rgba(255,255,255,0));
  transition: all 0s ease-out 0s;
	transform: translatex(-140px);
	animation: 18s linear 0s infinite move;
}

@keyframes move {
	0% {
		transform: translatex(-140px);
	}
	25% {
		transform: translatex(140px);
		opacity: 0.3;
	}
	50% {
		transform: translatex(140px);
		opacity: 1;
		background: radial-gradient(90px circle at bottom center, rgba(238,88,63,.5) 30%, rgba(255,255,255,0));
	}
	75% {
		transform: translatex(-140px);
		opacity: 0.3;
	}
	100% {
		opacity: 1;
		transform: translatex(-140px);
		background: radial-gradient(90px circle at top center, rgba(238,88,63,.5) 30%, rgba(255,255,255,0));
	}
}
	
.footer {
  position: relative;
  display: flex;
  left: 0;
  bottom: 0;
  width: 100%;
  background-image: linear-gradient(to right, #ff0081, #6827b0);
  color: white;
  text-align: center;
}
	

</style>

<title>
Fake Mailer
</title>
</head>
<body>

<section>
    <div class="content">
      <h1><font color="white">Fake Email Prank</font></h1>
    </div>
  </section>
  
  <center>
<form name="fakemail" action="<?php $PHP_SELF; ?>" method="POST">
<p><label for="fname"><b><font size="10" color=black>From name :</b></font></label><br>
<input name="fname" id="fname" type="text" class="formbox" /><br></p>
<p><label for="femail"><b><font size="10" color=black>From email id :</b></font></label><br>
<input name="femail" id="femail" type="text" class="formbox" /><br></p>
<p><label for="to"><b><font size="10" color=black>To :</b></font></label><br>
<input name="to" id="to" type="text" class="formbox"/><br></p>
<p><label for="subject"><b><font size="10" color=black>Subject :</b></font></label><br>
<input name="subject" id="subject" type="text" class="formbox"/><br></p>
<p><label for="message"><b><font size="10" color=black>Message :</b></font></label><br>
<textarea name="message" id="message" cols="60" rows="8"></textarea></p>
<p><input name="submit" id="submit" type="submit" value="Send!!" /></p></form>

</center>


<?php
//Fake mailer code

function send_email($to=null,$subject=null,$from_name=null,$from_mail=null,$mail_content=null,$replyto=null)
{
    $headers = "From: \"".$from_name."\" <".$from_mail.">\r\nReply-To: ".$replyto."\r\n";//here's the main part
    if(@mail($to,$subject,$mail_content,$headers))
    {
        $mail_send_result="<p><font size=9 color=green>Email successfully sent to $to.!!</font></p>";//If mail gets sent successfully
    }
    else
    {
        $mail_send_result="<p><font size=9 color=red>Email NOT sent to $to.</font></p>";//If mail does not get sent
    }
    return $mail_send_result;
}
if(isset($_POST['to']) && isset($_POST['fname']) && isset($_POST['femail'])
&& isset($_POST['message']) && isset($_POST['subject']) && isset($_POST['submit']))
{
    $from_name=$_POST['fname'];
    $from_mail=$_POST['femail'];
    $mail_content=$_POST['message'];
    $to=$_POST['to'];
    $subject=$_POST['subject'];
    $replyto=$_POST['femail'];
    echo send_email($to,$subject,$from_name,$from_mail,$mail_content,$replyto);
}
?>
</body>
</html>

  <div class="footer">
  <p align="center"> © 2020<b>
Md Sayed Alve</b><br> All rights reserved</p>
</div>
</body



</html>

