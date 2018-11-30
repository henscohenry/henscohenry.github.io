var modal=document.getElementById('tModal'); //get the MD modal

var associate=document.getElementById("mainAssociates");

var closebtn=document.getElementsByClassName("close")[0]; // when user clicks on the close button



var assoc1Modal=document.getElementById('associateModal'); //get the first associate modal

var associate1=document.getElementsByClassName("associates")[1];

var closeAssoc1btn=document.getElementsByClassName("close")[1]; // when user clicks on the close button


var assoc2Modal=document.getElementById('associate2Modal'); //get the first associate modal

var associate2=document.getElementsByClassName("associates")[2];

var closeAssoc2btn=document.getElementsByClassName("close")[2]; // when user clicks on the close button


var assoc3Modal=document.getElementById('associate3Modal'); //get the first associate modal

var associate3=document.getElementsByClassName("associates")[3];

var closeAssoc3btn=document.getElementsByClassName("close")[3]; // when user clicks on the close button


var assoc4Modal=document.getElementById('associate4Modal'); //get the first associate modal

var associate4=document.getElementsByClassName("associates")[4];

var closeAssoc4btn=document.getElementsByClassName("close")[4]; // when user clicks on the close button


var assoc5Modal=document.getElementById('associate5Modal'); //get the first associate modal

var associate5=document.getElementsByClassName("associates")[5];

var closeAssoc5btn=document.getElementsByClassName("close")[5]; // when user clicks on the close button


var assoc6Modal=document.getElementById('associate6Modal'); //get the first associate modal

var associate6=document.getElementsByClassName("associates")[6];

var closeAssoc6btn=document.getElementsByClassName("close")[6]; // when user clicks on the close button


var shutdown=document.getElementsByClassName("closemenu")[0]; // when user clicks on the close button

var smenuSand =document.getElementById("tModalmenu");

var smenu=document.getElementsByTagName("ol");



					associate.onclick = function() {
						modal.style.display ="block";
					}


					closebtn.onclick = function(){
						modal.style.display="none";
					}


		associate1.onclick = function() {
			assoc1Modal.style.display ="block";
		}

		closeAssoc1btn.onclick = function(){
			assoc1Modal.style.display="none";
		}


					associate2.onclick = function() {
						assoc2Modal.style.display ="block";
					}


					closeAssoc2btn.onclick = function(){
						assoc2Modal.style.display="none";
					}

		associate3.onclick = function() {
			assoc3Modal.style.display ="block";
		}

		closeAssoc3btn.onclick = function(){
			assoc3Modal.style.display="none";
		}


					associate4.onclick = function() {
						assoc4Modal.style.display ="block";
					}

					closeAssoc4btn.onclick = function(){
						assoc4Modal.style.display="none";
					}

associate5.onclick = function() {
	assoc5Modal.style.display ="block";
}

closeAssoc5btn.onclick = function(){
	assoc5Modal.style.display="none";
}

		associate6.onclick = function() {
			assoc6Modal.style.display ="block";
		}

		closeAssoc6btn.onclick = function(){
			assoc6Modal.style.display="none";
		}


function show(){
	modal.style.display ="block";
}

function shutd(){
	modal.style.display="none";
}

function showmenu(){
 	smenuSand.style.display ="block";
}

function hidemenu(){
 	smenuSand.style.display ="none";
}

//when user clicks anywhere apart from the modal,outside modal

window.onclick = function(event){
	if(event.target == modal) {
		modal.style.display = "none";
	}

}

function delete_photo(displayMonitor,photoid) 
{
	var deletePhotoRequest;

	var display = document.getElementById(displayMonitor);

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

function change_photo(displayMonitor,photoid) 
{
	var changePhotoRequest;

	var display = document.getElementById(displayMonitor);

	var changePhotoQueryString = "PhotoId=" + photoid;
	var changePhotoExtensionUrl = "changePhoto.php";

			try{

				changePhotoRequest = new XMLHttpRequest();

			} catch(e) {

				try {
					changePhotoRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {

					try {
						changePhotoRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {

						alert("Browser broke");
						return false;

					}

				}

			}

	changePhotoRequest.onreadystatechange = function () {
	    
	    //display.innerHTML = "Loading photo...";

			if(changePhotoRequest.readyState = 4) {

				display.src = changePhotoRequest.responseText;

			}

	}

	changePhotoRequest.open("POST","includes/ajax/"+changePhotoExtensionUrl,true);
	changePhotoRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	changePhotoRequest.send(changePhotoQueryString);

}

