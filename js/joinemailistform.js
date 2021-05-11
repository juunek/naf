
var page;

 function init(){



  document.getElementById('joinlistForm').addEventListener('submit', function(e){process(e, 'Joinlist')}, false);



}

var emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
var namePattern = /^([a-zA-Z ]){2,15}$/;
var phoneNumberPattern = /^\(?([0-9]{3})\)?[-.●]?([0-9]{3})[-.●]?([0-9]{4})$/;
var textPattern = /^([a-zA-Z ]){2,100}$/;



function addErrorMessage(fieldId, msg){
    //console.log(msg);


    // check if an error message span is available
    if (document.getElementById(fieldId + "ErrMsg"))
    {
      // an error message span is already available, use it
      document.getElementById(fieldId + "ErrMsg").innerHTML = msg;
      document.getElementById(fieldId + "ErrMsg").style.display = "block";
    } else {

      // otherwise, create the error message span
      var messageSpan = document.createElement("span");
      messageSpan.className = "errMsg"; // set the CSS class to use
      messageSpan.id = fieldId + "ErrMsg"; // set the id
      messageSpan.innerHTML = msg;

      var inputLabel = document.getElementById(fieldId+'Label');
      console.log("inputLabel " + inputLabel);
      inputLabel.parentNode.appendChild(messageSpan);

    }

  }

 function removeErrorMessage (fieldId){
    if (document.getElementById(fieldId + "ErrMsg"))
    {
      document.getElementById(fieldId+"Label").style.color = "black";
      document.getElementById(fieldId + "ErrMsg").style.display = "none";

    }

  }



  function process(evt, page) {

    var err = 0;


  // email validation


  var email = document.getElementById('inputEmail'+ page).value;


  if (emailPattern.test(email)) {
    removeErrorMessage('inputEmail'+ page);
  } else {
    addErrorMessage('inputEmail'+ page, 'Please enter a valid email address');
    err ++;
  }




  var firstname = document.getElementById('inputFirstname' + page).value;

  if (namePattern.test(firstname)) {
    removeErrorMessage('inputFirstname' + page);
  } else {
    addErrorMessage('inputFirstname' + page, 'Please complete with letters only, up to 15 characters');
    err ++;
  }



  var lastname = document.getElementById('inputLastname' + page).value;


  if (namePattern.test(lastname)) {
    removeErrorMessage('inputLastname' + page);
  } else {
    addErrorMessage('inputLastname' + page, 'Please complete with letters only, up to 15 characters');
    err ++;
  }


  var message = "";

  if (err == 0) {
    var jsELFirstName = document.getElementById('inputFirstname' + page).value;
    var jsELLastName = document.getElementById('inputLastname' + page).value;
    var jsELEmail = document.getElementById('inputEmail'+ page).value;

    var inputArr = [jsELFirstName, jsELLastName, jsELEmail];
    console.log ("inputArr:" + inputArr);

// Creating a cookie after the document is ready

document.cookie = "cookieArrJoinlist=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

$(document).ready(function(){

  createCookie("cookieArrJoinlist", inputArr, "10");

});


function createCookie(name, value, days){

    var expires;

    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toGMTString();
    } else {
      expires = "";
    }

    document.cookie = escape(name) + "=" +
    escape(value) + expires + "; path=/";

  }

    window.location.href = "http://ctec4350.krk1266.uta.cloud/naf/admin_edit_join_email.php";



  } else {



  }

if (evt.preventDefault)
    {
      evt.preventDefault();
    } else {
      evt.returnValue = false;
    }



}





window.addEventListener('load', init, false);
