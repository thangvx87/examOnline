	function clientValidate(){
		if (document.frmRegister.UserName.value == ""){
			alert("Name is not null");
			document.frmRegister.UserName.focus();
			return false;
		}
		/* Regular Expression */ 
		var x = document.frmRegister.UserName.value.length;
		if (x < 3 || x > 30){
			alert(document.frmRegister.UserName.value + " is not a valid");
			document.frmRegister.UserName.focus();
			return false;
		}

		reUserName = /^[a-zA-Z\-]+$/;
		if(!reUserName.test(document.frmRegister.UserName.value)){
			alert("UserName của bạn không hợp lệ.");
			document.frmRegister.UserName.focus();
			return false;
		}
		
		if (document.frmRegister.FullName.value == ""){
			alert("FullName is not null");
			document.frmRegister.FullName.focus();
			return false;
		}
		
		if(document.frmRegister.Email.value == ""){
			alert("Email is not null");
			document.frmRegister.Email.focus();
			return false;
		}
		
		reEmail = /^(([a-zA-Z0-9])+\.?)*([a-zA-Z0-9])+@(([a-zA-Z0-9])+\.)+[a-zA-Z]{2,4}$/;
		if(!reEmail.test(document.frmRegister.Email.value)){
			alert("Email của bạn không hợp lệ.");
			document.frmRegister.Email.focus();
			return false;
		}

		if (document.frmRegister.PassWord.Value == "" ){
			alert("PassWord is not null");
			document.frmRegister.PassWord.focus();
			return false;
		}
		document.frmRegister.submit();
	}
