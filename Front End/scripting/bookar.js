
var accountMenu = document.getElementById("accountMenu");

var toggleAccountMenu = document.getElementById("profileMenu");

var ticketPanel = document.getElementById("ticketPanel");

var bookarPanel = document.getElementById("bookarPanel");

var profilePanel = document.getElementById("profilePanel");

var specificReservePanel = document.getElementById("specificReservePanel");

var specificTellerPanel = document.getElementById("specificTellerPanel");

var cartPanel = document.getElementById("cartPanel");

var accPanel = document.getElementById("accPanel");

var textField = document.getElementById("notesArea");

var menuBar = document.getElementById("menuBar");


//var mobileMenuBar = document.getElementById("menuBar");

function showmenu()
{
	if(menuBar.style.display == "none") {
		menuBar.style.display = "block"
	} else {
		menuBar.style.display = "none";
	}
}

function showLogin()
{
		if(accountMenu.style.display == "none") {
			accountMenu.style.display = "block";
		} else {
			accountMenu.style.display = "none";
		}
}

/*document.getElementById("accountMenu").onmouseout = function() 
{
		accountMenu.style.display = "none";
}*/

function show_ticket_panel()
{
	ticketPanel.style.display = "block";
	bookarPanel.style.display = "none";
}

function show_bookar_panel()
{
	ticketPanel.style.display = "none";
	bookarPanel.style.display = "block";
}

function show_specific_bookar_panel()
{
	specificReservePanel.style.display = "block";
	specificTellerPanel.style.display = "none";
}

function show_specific_teller_panel()
{
	specificReservePanel.style.display = "none";
	specificTellerPanel.style.display = "block";
}

function show_cart_panel()
{
	cartPanel.style.display = "block";
	accPanel.style.display = "none";
}

function show_acc_panel()
{
	cartPanel.style.display = "none";
	accPanel.style.display = "block";
}

function confirm_email(displayMonitor,email) 
{
	var emailConfirmRequest;

	var display = document.getElementById(displayMonitor);
	var emailCon = document.getElementById(email).value;

	var emailConQueryString = "Email=" + emailCon;
	var emailConExtensionUrl = "emailConfirmation.php";
	
	//alert(emailCon);

    if(emailCon !== null) {
			try{

				emailConfirmRequest = new XMLHttpRequest();

			} catch(e) {

				try {
					emailConfirmRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {

					try {
						emailConfirmRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {

						alert("Browser broke");
						return false;

					}

				}

			}

	emailConfirmRequest.onreadystatechange = function () {

			display.innerHTML = "Sending email...";

			if(emailConfirmRequest.readyState == 4 && emailConfirmRequest.status == 200) {

				display.innerHTML = emailConfirmRequest.responseText;

			}

	}
	
    } else {
        display.innerHTML = "Email field should not be empty";
    }

	emailConfirmRequest.open("POST","includes/ajax/"+emailConExtensionUrl,true);
	emailConfirmRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	emailConfirmRequest.send(emailConQueryString);

}

function reg_user(displayMonitor,username,userid,phoneno,password,confirmPass) 
{
	var regConfirmRequest;

	var display = document.getElementById(displayMonitor);
	var regUsername = document.getElementById(username).value;
	var regUserId = document.getElementById(userid).value;
	var regPhoneNo = document.getElementById(phoneno).value;
	var regPassword = document.getElementById(password).value;
	var regConFirmPass = document.getElementById(confirmPass).value;

	var regConQueryString = "Username=" + regUsername + "&UserId="+ regUserId + "&PhoneNo="+ regPhoneNo +"&Password=" + regPassword;
	var regConExtensionUrl = "userRegistration.php";


	if(regPassword == regConFirmPass) {

			try{

				regConfirmRequest = new XMLHttpRequest();

			} catch(e) {

				try {
					regConfirmRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {

					try {
						regConfirmRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {

						alert("Browser broke");
						return false;

					}

				}

			}

			regConfirmRequest.onreadystatechange = function () {
			    
			    display.innerHTML = "Wait as we validate your account...";

					if(regConfirmRequest.readyState = 4) {

						display.innerHTML = regConfirmRequest.responseText;

					}

			}

	} else {

		display.innerHTML = "Passwords do not match";

	}


	regConfirmRequest.open("POST","includes/ajax/"+regConExtensionUrl,true);
	regConfirmRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	regConfirmRequest.send(regConQueryString);

}

function login_user(displayMonitor,email,password) 
{
	var loginConfirmRequest;

	var display = document.getElementById(displayMonitor);
	var loginEmail = document.getElementById(email).value;
	var loginPassword = document.getElementById(password).value;

	var loginConQueryString = "Email=" + loginEmail + "&Password="+ loginPassword ;
	var loginConExtensionUrl = "userLogin.php";


	if(loginEmail != null && loginPassword != null) {

			try{

				loginConfirmRequest = new XMLHttpRequest();

			} catch(e) {

				try {
					loginConfirmRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {

					try {
						loginConfirmRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {

						alert("Browser broke");
						return false;

					}

				}

			}

			loginConfirmRequest.onreadystatechange = function () {
			    
			    display.innerHTML = "Wait ...";

					if(loginConfirmRequest.status === 200) {

						var response = loginConfirmRequest.responseText;
						display.innerHTML = response;

						if(response.trim() == "Login successful Member") {
							window.location.href = "account.php";
						} else if(response.trim() == "Login successful Admin") {
							window.location.href = "manager.php";
						}

					}

			}

	} else {

		display.innerHTML = "No field should be empty";

	}


	loginConfirmRequest.open("POST","includes/ajax/"+loginConExtensionUrl,true);
	loginConfirmRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	loginConfirmRequest.send(loginConQueryString);

}


function delete_photo(displayMonitor,gallery,photoid,key) 
{
	var deletePhotoRequest;

	var display = document.getElementById(displayMonitor);
	var photoGallery = document.getElementsByClassName(gallery)[key].value;

	var deletePhotoQueryString = "PhotoId=" + photoid;
	var deletePhotoExtensionUrl = "deletePhoto.php";

			try{

				deletePhotoRequest = new XMLHttpRequest();

			} catch(e) {

				try {
					deletePhotoRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {

					try {
						deletePhotoRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {

						alert("Browser broke");
						return false;

					}

				}

			}

	deletePhotoRequest.onreadystatechange = function () {
	    
	    display.innerHTML = "Deleting photo...";

			if(deletePhotoRequest.readyState = 4) {

				display.innerHTML = deletePhotoRequest.responseText;

			}

	}

	deletePhotoRequest.open("POST","includes/ajax/"+deletePhotoExtensionUrl,true);
	deletePhotoRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	deletePhotoRequest.send(deletePhotoQueryString);

}

function delete_user(displayMonitor,userid) 
{
	var deleteUserRequest;

	var display = document.getElementById(displayMonitor);

	var deleteUserQueryString = "UserId=" + userid;
	var deleteUserExtensionUrl = "deleteUser.php";

			try{

				deleteUserRequest = new XMLHttpRequest();

			} catch(e) {

				try {
					deleteUserRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {

					try {
						deleteUserRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {

						alert("Browser broke");
						return false;

					}

				}

			}

	deleteUserRequest.onreadystatechange = function () {
	    
	    display.innerHTML = "Deleting User...";

			if(deleteUserRequest.readyState = 4) {

				display.innerHTML = deleteUserRequest.responseText;

			}

	}

	deleteUserRequest.open("POST","includes/ajax/"+deleteUserExtensionUrl,true);
	deleteUserRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	deleteUserRequest.send(deleteUserQueryString);

}