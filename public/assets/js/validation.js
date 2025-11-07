
//contact form validation



//////////////////////////////////////////For Contact form/////////////


function contact_valid(){
	//alert("ok");
		var name = document.getElementById("name");
		var email = document.getElementById("email");
		var subject = document.getElementById("subject");
		var message = document.getElementById("message");
		var security_code = document.getElementById("security_code");
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		var alphaExp = /^[a-zA-Z ]+$/; 
		/********************************/
		if(name.value == ""){
			document.getElementById("name_er").innerHTML="<img src='images/cros.png'>  Please Fill Name";
			name.focus();
			//alert("Please Fill Name");
			return false;
			}
			
			else if(!name.value.match(alphaExp))
			{
				
			document.getElementById("name_er").innerHTML="<img src='images/cros.png'>  Invalid Name";
			 name.focus(); 
			return false;
			}
			
			if(email.value == ""){
			document.getElementById("name_er").innerHTML="";
			document.getElementById("email_er").innerHTML="<img src='images/cros.png'>  Please Fill email";
			
			email.focus();
			//alert("Please Fill email");
			return false;
			}
			
			else if(!email.value.match(emailExp))
			{
				 document.getElementById("name_er").innerHTML="";
			document.getElementById("email_er").innerHTML="<img src='images/cros.png'>  Invalid email";
			//alert("Please Fill email");
			 email.focus();
			return false;
			} else if(subject.value == ""){
					document.getElementById("email_er").innerHTML="";
			document.getElementById("sub_er").innerHTML="<img src='images/cros.png'>  Please Fill Subject";
			subject.focus();
			//alert("Please Fill Name");
			return false;
			}
			
			
			 if(message.value == ""){
			document.getElementById("sub_er").innerHTML="";
			document.getElementById("message_er").innerHTML="<img src='images/cros.png'>  Please Type your Message";
			message.focus();
			
			//alert("Please Fill Name");
			return false;
			}
			
			if(security_code.value == ""){
			document.getElementById("message_er").innerHTML="";
			document.getElementById("security_code_er").innerHTML="<img src='images/cros.png'>  Please Type Security Code";
			security_code.focus();
			
			//alert("Please Fill Name");
			return false;
			}
			
			
}
